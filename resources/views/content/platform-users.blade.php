@extends('layouts/contentLayoutMaster')

@section('title', 'Platform Users')

@section('content')
    <div class="row">
        <div class="col-lg-3 col-sm-6">
            <div class="card">
                <div class="card-body d-flex align-items-center justify-content-between">
                    <div>
                        <h3 class="fw-bolder mb-75">{{ \App\Models\User::count() }}</h3>
                        <span>Total Users</span>
                    </div>
                    <div class="avatar bg-light-primary p-50">
            <span class="avatar-content">
              <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none"
                   stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                   class="feather feather-user font-medium-4"><path
                      d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
            </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card">
                <div class="card-body d-flex align-items-center justify-content-between">
                    <div>
                        <h3 class="fw-bolder mb-75">{{ \App\Models\User::where('created_at', '>', \Carbon\Carbon::now()->subDay(3))->count() }}</h3>
                        <span>New Users</span>
                    </div>
                    <div class="avatar bg-light-danger p-50">
            <span class="avatar-content">
              <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none"
                   stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                   class="feather feather-user-plus font-medium-4"><path
                      d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><line
                      x1="20" y1="8" x2="20" y2="14"></line><line x1="23" y1="11" x2="17" y2="11"></line></svg>
            </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card">
                <div class="card-body d-flex align-items-center justify-content-between">
                    <div>
                        <h3 class="fw-bolder mb-75">{{ \App\Models\User::where('status', '1')->count() }}</h3>
                        <span>Active Users</span>
                    </div>
                    <div class="avatar bg-light-success p-50">
            <span class="avatar-content">
              <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none"
                   stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                   class="feather feather-user-check font-medium-4"><path
                      d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><polyline
                      points="17 11 19 13 23 9"></polyline></svg>
            </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card">
                <div class="card-body d-flex align-items-center justify-content-between">
                    <div>
                        <h3 class="fw-bolder mb-75">{{ \App\Models\User::where('status', '2')->count() }}</h3>
                        <span>Pending Users</span>
                    </div>
                    <div class="avatar bg-light-warning p-50">
            <span class="avatar-content">
              <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none"
                   stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                   class="feather feather-user-x font-medium-4"><path
                      d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><line
                      x1="18" y1="8" x2="23" y2="13"></line><line x1="23" y1="8" x2="18" y2="13"></line></svg>
            </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- list and filter start -->
    <div class="card">
        <div class="card-body border-bottom">
            <h4 class="card-title">Search &amp; Filter</h4>
            <div class="row">
                <div class="col-md-4 user_role"><label class="form-label" for="UserRole">Role</label><select
                        id="UserRole" class="form-select text-capitalize mb-md-0 mb-2">
                        <option value=""> Select Role</option>
                        <option value="Admin" class="text-capitalize">Admin</option>
                        <option value="Author" class="text-capitalize">Author</option>
                        <option value="Editor" class="text-capitalize">Editor</option>
                        <option value="Maintainer" class="text-capitalize">Maintainer</option>
                        <option value="Subscriber" class="text-capitalize">Subscriber</option>
                    </select></div>
                <div class="col-md-4 user_plan"><label class="form-label" for="UserPlan">Plan</label><select
                        id="UserPlan" class="form-select text-capitalize mb-md-0 mb-2">
                        <option value=""> Select Plan</option>
                        <option value="Basic" class="text-capitalize">Basic</option>
                        <option value="Company" class="text-capitalize">Company</option>
                        <option value="Enterprise" class="text-capitalize">Enterprise</option>
                        <option value="Team" class="text-capitalize">Team</option>
                    </select></div>
                <div class="col-md-4 user_status"><label class="form-label"
                                                         for="FilterTransaction">Status</label><select
                        id="FilterTransaction" class="form-select text-capitalize mb-md-0 mb-2xx">
                        <option value=""> Select Status</option>
                        <option value="Pending" class="text-capitalize">Pending</option>
                        <option value="Active" class="text-capitalize">Active</option>
                        <option value="Inactive" class="text-capitalize">Inactive</option>
                    </select></div>
            </div>
        </div>
        <div class="card-datatable table-responsive pt-0">
            <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                <div class="d-flex justify-content-between align-items-center header-actions mx-2 row mt-75">
                    <div class="col-sm-12 col-lg-4 d-flex justify-content-center justify-content-lg-start">
                        <button class="dt-button add-new btn btn-primary" tabindex="0"
                                aria-controls="DataTables_Table_0" type="button" data-bs-toggle="modal"
                                data-bs-target="#modals-slide-in"><span>{{__('locale.add_new_user')}}</span></button>
                    </div>
                    <div class="col-sm-12 col-lg-8 ps-xl-75 ps-0">
                        <div
                            class="dt-action-buttons d-flex align-items-center justify-content-center justify-content-lg-end flex-lg-nowrap flex-wrap">
                            <div class="me-2">
                                <div id="DataTables_Table_0_filter" class="dataTables_filter">
                                    <label><input type="search" class="form-control" placeholder="Search"
                                            aria-controls="DataTables_Table_0"></label>
                                </div>
                            </div>
                            <div class="dt-buttons d-inline-flex mt-50">
                                <button
                                    class="dt-button buttons-collection btn btn-outline-secondary dropdown-toggle me-2"
                                    tabindex="0" aria-controls="DataTables_Table_0" type="button" aria-haspopup="true">
                                    <span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                               viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                               stroke-linecap="round" stroke-linejoin="round"
                                               class="feather feather-external-link font-small-4 me-50"><path
                                                d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path><polyline
                                                points="15 3 21 3 21 9"></polyline><line x1="10" y1="14" x2="21"
                                                                                         y2="3"></line></svg>Export</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>


                <table class="user-list-table table dataTable no-footer dtr-column" id="DataTables_Table_0" role="grid"
                       aria-describedby="DataTables_Table_0_info" style="width: 955px;">
                    <thead class="table-light">
                        <tr role="row">
                            <th class="control sorting_disabled" rowspan="1" colspan="1" style="width: 0px; display: none;"
                                aria-label=""></th>
                            <th class="sorting sorting_desc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                colspan="1" style="width: 238px;"
                                aria-sort="descending">Full Name
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                style="width: 96px;">Role
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                style="width: 66px;">Plan
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                style="width: 141px;">API Access
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                style="width: 56px;">Status
                            </th>
                            <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 61px;" aria-label="Actions">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach(\App\Models\User::orderByDesc('id')->get() as $user)
                        <tr class="odd">
                            <td class=" control" tabindex="0" style="display: none;"></td>
                            <td class="sorting_1">
                                <div class="d-flex justify-content-left align-items-center">
                                    @if($user->picture)
                                        <div class="avatar-wrapper">
                                            <div class="avatar me-1">
                                                <img
                                                    src="{{ $user->picture }}"
                                                    alt="Avatar" height="32" width="32">
                                            </div>
                                        </div>
                                    @endif
                                    <div class="d-flex flex-column"><a
                                            href="#url-check"
                                            class="user_name text-truncate text-body"><span class="fw-bolder">{{ $user->name }}</span></a><small
                                            class="emp_post text-muted">{{ $user->email }}</small></div>
                                </div>
                            </td>
                            <td>
                                <span class="text-truncate align-middle">
                                    @if($user->user_type === 'maintainer')
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                             height="24" viewBox="0 0 24 24" fill="none"
                                             stroke="currentColor" stroke-width="2"
                                             stroke-linecap="round" stroke-linejoin="round"
                                             class="feather feather-database font-medium-3 text-success me-50"><ellipse
                                                cx="12" cy="5" rx="9" ry="3"></ellipse><path
                                                d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"></path><path
                                                d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"></path></svg>
                                    @elseif($user->user_type === 'admin')
                                        <svg class="feather feather-database font-medium-3 text-danger me-50" data-v-4c458eae="" xmlns="http://www.w3.org/2000/svg" width="18px" height="18px" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect data-v-4c458eae="" x="2" y="2" width="20" height="8" rx="2" ry="2"></rect><rect data-v-4c458eae="" x="2" y="14" width="20" height="8" rx="2" ry="2"></rect><line data-v-4c458eae="" x1="6" y1="6" x2="6.01" y2="6"></line><line data-v-4c458eae="" x1="6" y1="18" x2="6.01" y2="18"></line></svg>
                                    @elseif($user->user_type === 'user')
                                        <svg class="feather feather-database font-medium-3 text-primary me-50" data-v-4c458eae="" xmlns="http://www.w3.org/2000/svg" width="18px" height="18px" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path data-v-4c458eae="" d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle data-v-4c458eae="" cx="12" cy="7" r="4"></circle></svg>
                                    @endif
                                    {{ ucfirst($user->user_type) }}
                                </span>
                            </td>
                            <td>{{ ucfirst($user->plan) }}</td>
                            <td>@if($user->api > 0)
                                    <span class="badge badge-light-danger">Yes</span>
                                @endif</td>
                            <td>
                                @if($user->status === 1)
                                    <span class="badge rounded-pill badge-light-success" text-capitalized="">Active</span>
                                @elseif($user->status === 2)
                                    <span class="badge text-capitalize badge-light-warning badge-pill" text-capitalized="">Pending</span>
                                @elseif($user->status === 3)
                                    <span class="badge text-capitalize badge-light-danger badge-pill" text-capitalized="">Blocked</span>
                                @elseif($user->status === 0)
                                    <span class="badge text-capitalize badge-light-secondary badge-pill" text-capitalized="">Inactive</span>
                                @endif
                            </td>
                            <td>
                                <div class="btn-group"><a class="btn btn-sm dropdown-toggle hide-arrow"
                                                          data-bs-toggle="dropdown">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                             fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                             stroke-linejoin="round" class="feather feather-more-vertical font-small-4">
                                            <circle cx="12" cy="12" r="1"></circle>
                                            <circle cx="12" cy="5" r="1"></circle>
                                            <circle cx="12" cy="19" r="1"></circle>
                                        </svg>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end"><a
                                            href="https://pixinvent.com/demo/vuexy-bootstrap-laravel-admin-template/demo-4/app/user/view/account"
                                            class="dropdown-item">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                 viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                 stroke-linecap="round" stroke-linejoin="round"
                                                 class="feather feather-file-text font-small-4 me-50">
                                                <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                                <polyline points="14 2 14 8 20 8"></polyline>
                                                <line x1="16" y1="13" x2="8" y2="13"></line>
                                                <line x1="16" y1="17" x2="8" y2="17"></line>
                                                <polyline points="10 9 9 9 8 9"></polyline>
                                            </svg>
                                            Details</a><a href="javascript:;" class="dropdown-item delete-record">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                 viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                 stroke-linecap="round" stroke-linejoin="round"
                                                 class="feather feather-trash-2 font-small-4 me-50">
                                                <polyline points="3 6 5 6 21 6"></polyline>
                                                <path
                                                    d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                                <line x1="10" y1="11" x2="10" y2="17"></line>
                                                <line x1="14" y1="11" x2="14" y2="17"></line>
                                            </svg>
                                            Delete</a></div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Modal to add new user starts-->
        <div class="modal modal-slide-in new-user-modal fade" id="modals-slide-in">
            <div class="modal-dialog">
                <form class="add-new-user modal-content pt-0" novalidate="novalidate">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                    <div class="modal-header mb-1">
                        <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
                    </div>
                    <div class="modal-body flex-grow-1">
                        <div class="mb-1">
                            <label class="form-label" for="basic-icon-default-fullname">Full Name</label>
                            <input type="text" class="form-control dt-full-name" id="basic-icon-default-fullname"
                                   placeholder="John Doe" name="user-fullname">
                        </div>
                        <div class="mb-1">
                            <label class="form-label" for="basic-icon-default-uname">Username</label>
                            <input type="text" id="basic-icon-default-uname" class="form-control dt-uname"
                                   placeholder="Web Developer" name="user-name">
                        </div>
                        <div class="mb-1">
                            <label class="form-label" for="basic-icon-default-email">Email</label>
                            <input type="text" id="basic-icon-default-email" class="form-control dt-email"
                                   placeholder="john.doe@example.com" name="user-email">
                        </div>
                        <div class="mb-1">
                            <label class="form-label" for="basic-icon-default-contact">Contact</label>
                            <input type="text" id="basic-icon-default-contact" class="form-control dt-contact"
                                   placeholder="+1 (609) 933-44-22" name="user-contact">
                        </div>
                        <div class="mb-1">
                            <label class="form-label" for="basic-icon-default-company">Company</label>
                            <input type="text" id="basic-icon-default-company" class="form-control dt-contact"
                                   placeholder="PIXINVENT" name="user-company">
                        </div>
                        <div class="mb-1">
                            <label class="form-label" for="country">Country</label>
                            <div class="position-relative"><select id="country"
                                                                   class="select2 form-select select2-hidden-accessible"
                                                                   data-select2-id="country" tabindex="-1"
                                                                   aria-hidden="true">
                                    <option value="Australia" data-select2-id="2">USA</option>
                                    <option value="Bangladesh">Bangladesh</option>
                                    <option value="Belarus">Belarus</option>
                                    <option value="Brazil">Brazil</option>
                                    <option value="Canada">Canada</option>
                                    <option value="China">China</option>
                                    <option value="France">France</option>
                                    <option value="Germany">Germany</option>
                                    <option value="India">India</option>
                                    <option value="Indonesia">Indonesia</option>
                                    <option value="Israel">Israel</option>
                                    <option value="Italy">Italy</option>
                                    <option value="Japan">Japan</option>
                                    <option value="Korea">Korea, Republic of</option>
                                    <option value="Mexico">Mexico</option>
                                    <option value="Philippines">Philippines</option>
                                    <option value="Russia">Russian Federation</option>
                                    <option value="South Africa">South Africa</option>
                                    <option value="Thailand">Thailand</option>
                                    <option value="Turkey">Turkey</option>
                                    <option value="Ukraine">Ukraine</option>
                                    <option value="United Arab Emirates">United Arab Emirates</option>
                                    <option value="United Kingdom">United Kingdom</option>
                                    <option value="United States">United States</option>
                                </select></div>
                        </div>
                        <div class="mb-1">
                            <label class="form-label" for="user-role">User Role</label>
                            <div class="position-relative"><select id="user-role"
                                                                   class="select2 form-select select2-hidden-accessible"
                                                                   data-select2-id="user-role" tabindex="-1"
                                                                   aria-hidden="true">
                                    <option value="subscriber" data-select2-id="4">Subscriber</option>
                                    <option value="editor">Editor</option>
                                    <option value="maintainer">Maintainer</option>
                                    <option value="author">Author</option>
                                    <option value="admin">Admin</option>
                                </select></div>
                        </div>
                        <div class="mb-2">
                            <label class="form-label" for="user-plan">Select Plan</label>
                            <div class="position-relative"><select id="user-plan"
                                                                   class="select2 form-select select2-hidden-accessible"
                                                                   data-select2-id="user-plan" tabindex="-1"
                                                                   aria-hidden="true">
                                    <option value="basic" data-select2-id="6">Basic</option>
                                    <option value="enterprise">Enterprise</option>
                                    <option value="company">Company</option>
                                    <option value="team">Team</option>
                                </select></div>
                        </div>
                        <button type="submit"
                                class="btn btn-primary me-1 data-submit waves-effect waves-float waves-light">Submit
                        </button>
                        <button type="reset" class="btn btn-outline-secondary waves-effect" data-bs-dismiss="modal">
                            Cancel
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
