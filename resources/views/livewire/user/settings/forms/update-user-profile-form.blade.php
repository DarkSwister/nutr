<div>
    <form class="validate-form mt-2 " wire:submit.prevent="updateProfileInformation">

        <!-- header section -->
        <div class="d-flex">
            <a href="#" class="me-25">
                @if ($photo)
                    <img
                        src="{{ $photo->temporaryUrl() }}"
                        alt="{{ $this->user->full_name }}"
                        id="account-upload-img"
                        class="uploadedAvatar rounded me-50"
                        alt="profile image"
                        height="100"
                        width="100"
                    />
                @else
                    <img
                        src="{{ $this->user->profile_photo_url }}"
                        alt="{{ $this->user->full_name }}"
                        id="account-upload-img"
                        class="uploadedAvatar rounded me-50"
                        alt="profile image"
                        height="100"
                        width="100"
                    />
                @endif
            </a>
            <!-- upload and reset button -->
            <div class="d-flex align-items-end mt-75 ms-1">
                <div>
                    <label for="account-upload" x-on:click.prevent="$refs.photo.click()"
                           class="btn btn-sm btn-primary mb-75 me-75">Upload</label>
                    <input type="file" wire:model="photo" id="account-upload" hidden accept="image/*"/>
                    @if ($this->user->profile_photo_path)
                        <button type="button" id="account-reset" class="btn btn-sm btn-outline-secondary mb-75"
                                wire:click="deleteProfilePhoto">
                            Reset
                        </button>
                    @endif
                    <x-input-error for="photo" class="mt-2"/>
                    <p class="mb-0">Allowed file types: png, jpg, jpeg.</p>
                </div>
            </div>
            <!--/ upload and reset button -->
        </div>
        <!--/ header section -->
        <!-- form -->
        <div class="row mt-2">
            <div class="col-12 col-sm-6 mb-1">
                <label class="form-label" for="accountFirstName">First Name</label>
                <input
                    wire:model.defer="state.first_name"
                    type="text"
                    class="form-control"
                    id="accountFirstName"
                    name="firstName"
                    placeholder="John"
                    value="John"
                    data-msg="Please enter first name"
                />
            </div>
            <div class="col-12 col-sm-6 mb-1">
                <label class="form-label" for="accountLastName">Last Name</label>
                <input
                    wire:model.defer="state.last_name"
                    type="text"
                    class="form-control"
                    id="accountLastName"
                    name="lastName"
                    placeholder="Doe"
                    value="Doe"
                    data-msg="Please enter last name"
                />
            </div>
            <div class="col-12 col-sm-6 mb-1">
                <label class="form-label" for="accountEmail">Email</label>
                <input
                    wire:model.defer="state.email"
                    type="email"
                    class="form-control"
                    id="accountEmail"
                    name="email"
                    placeholder="Email"
                    value="johndoe@gmail.com"
                />
            </div>

            <div class="col-12 col-sm-6 mb-1">
                <label  class="form-label" for="accountPhoneNumber">Phone Number</label>
                <input
                    wire:model.defer="state.phone"
                    type="tel"
                    class="form-control account-number-mask"
                    id="accountPhoneNumber"
                    name="phoneNumber"
                    placeholder="Phone Number"
                    value="457 657 1237"
                />
                <x-input-error for="phone" class=""/>
            </div>

            <div class="col-12">
                <button type="submit" class="btn btn-primary mt-1 me-1">Save changes</button>
                <button type="reset" class="btn btn-outline-secondary mt-1">Discard</button>
            </div>
        </div>
    </form>
    <!--/ form -->
</div>
