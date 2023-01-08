<?php

namespace App\Http\Livewire\User;

use Jantinnerezo\LivewireAlert\LivewireAlert;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Invitation;
use Illuminate\Database\Eloquent\Builder;

class UserInvitationTable extends DataTableComponent
{
    use LivewireAlert;

    protected $model = Invitation::class;

    public function builder(): Builder
    {
        return Invitation::query()
            ->where('invitations.email', auth()->user()->email)->whereNull('registered_at')->with('sender', 'group');
    }

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setTableAttributes([
            'id' => 'invitations-table',
        ]);
        $this->setTrAttributes(function ($row, $index) {
            return [
                'class' => 'table-default',
            ];
        });

    }

    public function attachToGroup($row)
    {
        $invitation = Invitation::findOrFail($row);
        auth()->user()->groups()->attach($invitation->group_id);
        $invitation->delete();
        $this->alert('success', __('Group attached successfully'), [
            'toast' => false
        ]);
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make(__('Sender'), "sender.email")
                ->sortable(),
            Column::make("Group", "group.name")
                ->sortable(),
            Column::make("Created at", "created_at")
                ->sortable(),
            Column::make(__('Action'))->label(function ($row, Column $column) {
                return "<button type='button' class='btn btn-primary' title='View details' wire:click.prevent='attachToGroup($row->id)'>Accept</button>";
            })->html(),
        ];
    }
}
