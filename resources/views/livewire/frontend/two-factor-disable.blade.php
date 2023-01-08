<div>
    <form class="form" wire:submit.prevent="destroy">
        <div class="row">
            <div class="col-12 col-sm-12 mb-1">
                <label class="form-label" for="authenticationCode">@lang('Authentication Code')</label>
                <input
                    wire:model.lazy="code"
                    type="text"
                    class="form-control"
                    id="account-old-authenticationCode"
                    name="password"
                    placeholder="Enter authentication code"
                />
                <x-input-error for="code"/>
            </div>
            <div class="col-12">
                <button type="reset" class="btn btn-outline-secondary mt-1" data-bs-dismiss="modal" aria-label="Close">
                    Discard
                </button>
                <button type="submit"
                        class="btn btn-outline-danger me-1 mt-1">@lang('Remove Two Factor Authentication')</button>
            </div>
        </div>
    </form>


</div>
