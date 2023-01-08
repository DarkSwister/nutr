<?php

namespace App\Domains\Auth\Services;

use App\Domains\Auth\Models\User;
use App\Domains\Auth\Models\UserItem;
use App\Domains\Game\Jobs\TransactionJob;
use App\Domains\Game\Models\BankAccount;
use App\Domains\Game\Models\ItemInstance;
use App\Domains\Game\Models\ItemTemplate;
use App\Exceptions\GeneralException;
use App\Services\BaseService;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

/**
 * Class UserService.
 */
class UserItemService extends BaseService
{
    /**
     * UserService constructor.
     *
     * @param UserItem $item
     */
    public function __construct(UserItem $item)
    {
        $this->model = $item;
    }

    public function ensureUserHasEnoughMoney(User $user, ItemTemplate $item, $count = 1)
    {
        $price = $item->price * $count;

        if ($price > $user->bank->balance) {
            throw ValidationException::withMessages([
                'price' => [__('Not enough money to buy.')],
            ]);
        }
    }

    public function store(User $user, ItemTemplate $item, int $count = 1, bool $ignore_payment = false)
    {
        $instance = $item->instances()->make([
            'price' => $item->price,
            'image' => $item->image,
            'model' => $item->model,
            'properties' => $item->properties,
        ]);
        if ($count > 1) return $this->storeMany($user, $item, $instance, $count, $ignore_payment);

        DB::beginTransaction();
        try {
            $instance->save();
            $user->items()->attach($instance);
            $buyMessage = "User (id=$user->id) bought $count of '" . $instance->template->name . "'";
            if(!$ignore_payment) {
                TransactionJob::dispatchSync($user, BankAccount::find(BankAccount::SHOP), $instance->price, actions('purchase_item'), $buyMessage);
            }
        } catch (Exception $e) {
            DB::rollBack();
            throw new GeneralException(__('There was a problem attaching item to this user. Please try again.'), 400);
        }
        DB::commit();
        return $buyMessage;
    }

    private function storeMany(User $user, ItemTemplate $template, ItemInstance $model, $count = 1, bool $ignore_payment = false)
    {
        $items = [];
        for ($i = 0; $i < $count; $i++) {
            $items[] = $model->replicate();
        }
        DB::beginTransaction();
        try {
            $instances = $template->instances()->saveMany($items);
            $ids = array_column((array)$instances, 'id');
            $user->items()->attach($ids);
            $buyMessage = "User (id=$user->id) Bought $count of '$template->name'";
            if (!$ignore_payment) {
                TransactionJob::dispatchSync($user, BankAccount::find(BankAccount::SHOP), $model->price * $count, actions('purchase_item'), $buyMessage);
            }
        } catch (Exception $e) {
            DB::rollBack();
            throw new GeneralException(__('There was a problem attaching items to this user. Please try again.'), 400);
        }
        DB::commit();
        return $buyMessage;
    }

}
