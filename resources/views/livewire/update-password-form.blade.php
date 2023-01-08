<div class="card">
    <div class="card-header border-bottom">
        <h4 class="card-title">Change Password</h4>
    </div>
    <div class="card-body pt-1">
        <!-- form -->
        <form class="form" wire:submit.prevent="updatePassword">
            <div class="row">
                <div class="col-12 col-sm-6 mb-1">
                    <label class="form-label" for="account-old-password">Current password</label>
                    <div class="input-group form-password-toggle input-group-merge">
                        <input
                            wire:model.defer="state.current_password"
                            type="password"
                            class="form-control"
                            id="account-old-password"
                            name="password"
                            placeholder="Enter current password"
                        />
                        <div class="input-group-text cursor-pointer">
                            <x-feathericon-eye/>
                        </div>
                    </div>
                    <x-input-error for="current_password"/>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-sm-6 mb-1">
                    <label class="form-label" for="account-new-password">New Password</label>
                    <div class="input-group form-password-toggle input-group-merge">
                        <input
                            wire:model.defer="state.password"
                            type="password"
                            id="account-new-password"
                            name="new-password"
                            class="form-control"
                            placeholder="Enter new password"
                        />
                        <div class="input-group-text cursor-pointer">
                            <x-feathericon-eye/>
                        </div>
                        <x-input-error for="password"/>
                    </div>
                </div>
                <div class="col-12 col-sm-6 mb-1">
                    <label class="form-label" for="account-retype-new-password">Retype New Password</label>
                    <div class="input-group form-password-toggle input-group-merge">
                        <input
                            wire:model.defer="state.password_confirmation"
                            type="password"
                            class="form-control"
                            id="account-retype-new-password"
                            name="confirm-new-password"
                            placeholder="Confirm your new password"
                        />
                        <div class="input-group-text cursor-pointer">
                            <x-feathericon-eye/>
                        </div>
                        <x-input-error for="password_confirmation"/>
                    </div>
                </div>
                <div class="col-12">
                    <p class="fw-bolder">Password requirements:</p>
                    <ul class="ps-1 ms-25">
                        <li class="mb-50">Minimum 8 characters long - the more, the better</li>
                        {{--                        <li class="mb-50">At least one lowercase character</li>--}}
                        {{--                        <li>At least one number, symbol, or whitespace character</li>--}}
                    </ul>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary me-1 mt-1">Save changes</button>
                    <button type="reset" class="btn btn-outline-secondary mt-1">Discard</button>
                </div>
            </div>


        </form>
        <!--/ form -->
    </div>

</div>
