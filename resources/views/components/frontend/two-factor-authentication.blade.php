<div>
    <form class="row gy-1" wire:submit.prevent="validateCode">
        <div class="col-12">
            @error('code')
            <x-input-error for="code">     {{ $message }}</x-input-error>
            @enderror
            <input class="form-control" id="authenticationCode" wire:model.lazy="code" minlength="6" type="text"
                   placeholder="Enter authentication code"  required
                   autofocus/>
        </div>
        <div class="col-12 d-flex justify-content-end">
            <button type="reset" class="btn btn-outline-secondary mt-2 me-1" data-bs-dismiss="modal" aria-label="Close">
                @lang('Cancel')
            </button>
            <button type="submit" class="btn btn-primary mt-2">
                <span class="me-50">@lang('Continue')</span>
                <i><x-feathericon-chevron-right /></i>
            </button>
        </div>
    </form>
</div>
