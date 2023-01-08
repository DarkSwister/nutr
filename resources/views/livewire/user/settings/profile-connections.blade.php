@section('title', 'Security')
<div class="row">
    <div class="col-12">
        @livewire('user.settings.profile-tabs')

        <!-- connection -->

        <div class="row">
            <div class="col-md-6 col-12">
                <div class="card">
                    <div class="card-header border-bottom">
                        <h4 class="card-title">Connected accounts</h4>
                    </div>
                    <div class="card-body pt-2">
                        <p>Display content from your connected accounts on your site</p>

                        <!-- Connections -->
                        <div class="d-flex mt-2">
                            <div class="flex-shrink-0">
                                <img
                                    src="{{asset('images/icons/social/google.png')}}"
                                    alt="google"
                                    class="me-1"
                                    height="38"
                                    width="38"
                                />
                            </div>
                            <div class="d-flex align-item-center justify-content-between flex-grow-1">
                                <div class="me-1">
                                    <p class="fw-bolder mb-0">Google</p>
                                    <span>Calendar and contacts</span>
                                </div>
                                <div class="mt-50 mt-sm-0">
                                    <div class="form-check form-switch form-check-primary">
                                        <input type="checkbox" class="form-check-input" id="checkboxGoogle" checked/>
                                        <label class="form-check-label" for="checkboxGoogle">
                                            <span class="switch-icon-left"><i data-feather="check"></i></span>
                                            <span class="switch-icon-right"><i data-feather="x"></i></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex mt-2">
                            <div class="flex-shrink-0">
                                <img
                                    src="{{asset('images/icons/social/slack.png')}}"
                                    alt="slack"
                                    class="me-1"
                                    height="38"
                                    width="38"
                                />
                            </div>
                            <div class="d-flex align-item-center justify-content-between flex-grow-1">
                                <div class="me-1">
                                    <p class="fw-bolder mb-0">Slack</p>
                                    <span>Communication</span>
                                </div>
                                <div class="mt-50 mt-sm-0">
                                    <div class="form-check form-switch form-check-primary">
                                        <input type="checkbox" class="form-check-input" id="checkboxSlack"/>
                                        <label class="form-check-label" for="checkboxSlack">
                                            <span class="switch-icon-left"><i data-feather="check"></i></span>
                                            <span class="switch-icon-right"><i data-feather="x"></i></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex mt-2">
                            <div class="flex-shrink-0">
                                <img
                                    src="{{asset('images/icons/social/github.png')}}"
                                    alt="github"
                                    class="me-1"
                                    height="38"
                                    width="38"
                                />
                            </div>
                            <div class="d-flex align-item-center justify-content-between flex-grow-1">
                                <div class="me-1">
                                    <p class="fw-bolder mb-0">Github</p>
                                    <span>Manage your Git repositories</span>
                                </div>
                                <div class="mt-50 mt-sm-0">
                                    <div class="form-check form-switch form-check-primary">
                                        <input type="checkbox" class="form-check-input" id="checkboxGithub" checked/>
                                        <label class="form-check-label" for="checkboxGithub">
                                            <span class="switch-icon-left"><i data-feather="check"></i></span>
                                            <span class="switch-icon-right"><i data-feather="x"></i></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex mt-2">
                            <div class="flex-shrink-0">
                                <img
                                    src="{{asset('images/icons/social/mailchimp.png')}}"
                                    alt="mailchimp"
                                    class="me-1"
                                    height="38"
                                    width="38"
                                />
                            </div>
                            <div class="d-flex align-item-center justify-content-between flex-grow-1">
                                <div class="me-1">
                                    <p class="fw-bolder mb-0">Mailchimp</p>
                                    <span>Email marketing service</span>
                                </div>
                                <div class="mt-50 mt-sm-0">
                                    <div class="form-check form-switch form-check-primary">
                                        <input type="checkbox" class="form-check-input" id="checkboxMailchimp"/>
                                        <label class="form-check-label" for="checkboxMailchimp">
                                            <span class="switch-icon-left"><i data-feather="check"></i></span>
                                            <span class="switch-icon-right"><i data-feather="x"></i></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex mt-2">
                            <div class="flex-shrink-0">
                                <img
                                    src="{{asset('images/icons/social/asana.png')}}"
                                    alt="asana"
                                    class="me-1"
                                    height="38"
                                    width="38"
                                />
                            </div>
                            <div class="d-flex align-item-center justify-content-between flex-grow-1">
                                <div class="me-1">
                                    <p class="fw-bolder mb-0">Asana</p>
                                    <span>Communication</span>
                                </div>
                                <div class="mt-50 mt-sm-0">
                                    <div class="form-check form-switch form-check-primary">
                                        <input type="checkbox" class="form-check-input" id="checkboxAsana"/>
                                        <label class="form-check-label" for="checkboxAsana">
                                            <span class="switch-icon-left"><i data-feather="check"></i></span>
                                            <span class="switch-icon-right"><i data-feather="x"></i></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Connections -->
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-12">
                <form wire:submit.prevent="saveSocials">
                    <div class="card">
                        <div class="card-header border-bottom">
                            <h4 class="card-title">Social accounts</h4>
                        </div>
                        <div class="card-body pt-2">
                            <p>Display content from social accounts on your site</p>
                            <!-- Social Accounts -->
                            <div class="d-flex mt-2">
                                <div class="flex-shrink-0">
                                    <img
                                        src="{{asset('images/icons/social/facebook.png')}}"
                                        alt="facebook"
                                        class="me-1"
                                        height="38"
                                        width="38"
                                    />
                                </div>
                                <div class="d-flex justify-content-between flex-grow-1">
                                    <input type="text" class="form-control" wire:model.defer="user.facebook"
                                           placeholder="Facebook page" aria-label="Facebook page"
                                           aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <div class="d-flex align-items-start mt-2">
                                <div class="flex-shrink-0">
                                    <a href=""></a>
                                    <img
                                        src="{{asset('images/icons/social/instagram.png')}}"
                                        alt="instagram"
                                        class="me-1"
                                        height="38"
                                        width="38"
                                    />
                                </div>
                                <div class="d-flex justify-content-between flex-grow-1">
                                    <input wire:model.defer="user.instagram" type="text" class="form-control"
                                           placeholder="Instagram Name" aria-label="Instagram Name"
                                           aria-describedby="basic-addon2">
                                </div>
                            </div>
                            <div class="d-flex align-items-start mt-2">
                                <div class="flex-shrink-0">
                                    <a href=""></a>
                                    <img
                                        src="{{asset('images/icons/social/telegram.png')}}"
                                        alt="instagram"
                                        class="me-1"
                                        height="38"
                                        width="38"
                                    />
                                </div>
                                <div class="d-flex justify-content-between flex-grow-1">
                                    <input type="text" wire:model.defer="user.telegram" class="form-control"
                                           placeholder="Telegram Channel" aria-label="Telegram Channel"
                                           aria-describedby="basic-addon2">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mt-2">Save changes</button>
                            <!-- /Social Accounts -->
                        </div>
                    </div>
                </form>
            </div>

        </div>

        <!--/ connection -->
    </div>
</div>
