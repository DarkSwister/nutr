<x-backend.modal-dialog id="showModal" wire:model="viewingModal">
    <x-slot name="title">
        @lang('Create '.$model)
    </x-slot>

        <x-slot name="content">
            <div class="mb-1">
                <form action="">
                    <input wire:model.defer='{{$attribute}}' type="text" placeholder="{{ucfirst($model)}} {{$attribute}}" class="form-control" />
                    @error($attribute)
                    <div class="alert alert-danger mt-1" role="alert">
                        <div class="alert-body">{{$message}}</div>
                    </div>
                    @enderror
                </form>

            </div>
        </x-slot>

        <x-slot name="footer">
            <button wire:click="create" type="button" class="btn btn-primary">@lang('Create')</button>
        </x-slot>
</x-backend.modal-dialog>
