<?php

namespace App\Domains\Auth\Models;

use App\Models\MyBaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;


class AccountPaymentGateway extends MyBaseModel
{

    use softDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'payment_gateway_id',
        'account_id',
        'config'
    ];

    /**
     * Account associated with gateway
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function account(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Account::class);
    }

    /**
     * Parent payment gateway
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function payment_gateway()
    {
        return $this->belongsTo(\App\Models\PaymentGateway::class, 'payment_gateway_id', 'id');
    }

    /**
     * @param $value
     *
     * @return mixed
     */
    public function getConfigAttribute($value): mixed
    {
        return json_decode($value, true);
    }

    public function setConfigAttribute($value) {
        $this->attributes['config'] = json_encode($value);
    }
}
