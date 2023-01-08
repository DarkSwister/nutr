@extends('layouts/contentLayoutMaster')

@section('title', __('locale.create_inverter'))

@section('content')
    <div class="container">
        <div class="row match-height">
            <div class="col-12 col-md-9">
                <form class="form form-vertical" action="{{route('inverter-create-submit')}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <input type="file" id="image" name="image" class="btn btn-outline-primary mb-1 waves-effect dz-clickable">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file"><path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path><polyline points="13 2 13 9 20 9"></polyline></svg> Click me to select files
                            </input>
                        </div>
                        <div class="col-12">
                            <div class="mb-1">
                                <label class="form-label" for="name">{{__('locale.form.name')}}<span class="text-danger">*</span></label>
                                <input type="text" id="name" class="form-control" name="name" placeholder="{{__('locale.form.name')}}" required>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-1">
                                <label class="form-label" for="address">{{__('locale.form.address')}}</label>
                                <input type="text" id="address" class="form-control" name="address" placeholder="{{__('locale.form.address')}}">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-1">
                                <label class="form-label" for="serial_number">{{__('locale.form.serial_number')}}</label>
                                <input type="text" id="serial_number" class="form-control" name="serial_number" placeholder="{{__('locale.form.serial_number')}}">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-1">
                                <label class="form-label" for="model">{{__('locale.form.model')}}</label>
                                <input type="text" id="model" class="form-control" name="model" placeholder="{{__('locale.form.model')}}">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-1">
                                <label class="form-label" for="manufacturer">{{__('locale.form.manufacturer')}}</label>
                                <select class="form-select" id="manufacturer" name="{{__('locale.form.manufacturer')}}">
                                    <option disabled selected>{{__("locale.form.select")}}</option>
                                    <option>Huawei</option>
                                    <option>Sungrow</option>
                                    <option>Growatt</option>
                                    <option>Ginlong Solis</option>
                                    <option>GoodWe</option>
                                    <option>SMA</option>
                                    <option>Power Electronics</option>
                                    <option>Sineng</option>
                                    <option>SolarEdge</option>
                                    <option>TMEIC</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-1">
                                <label class="form-label" for="location">{{__('locale.form.location_lat_long')}}</label>
                                <input type="text" id="location" class="form-control" name="location" placeholder="0.00,0.00" value="56.884703,24.259986">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-1">
                                <label class="form-label" for="api_url">{{__('locale.form.api_url')}}</label>
                                <input type="text" id="api_url" class="form-control" name="api_url" placeholder="https://www.example.com">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-1">
                                <label class="form-label" for="api_username">{{__('locale.form.api_username')}}</label>
                                <input type="text" id="api_username" class="form-control" name="api_username" placeholder="{{__('locale.form.api_username')}}">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-1">
                                <label class="form-label" for="password">{{__('locale.form.api_password')}}</label>
                                <input type="password" id="password" class="form-control" name="api_password" placeholder="Example">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-1">
                                <label class="form-label" for="api_token">{{__('locale.form.api_token')}}</label>
                                <input type="text" id="api_token" class="form-control" name="api_token" placeholder="{{__('locale.form.api_token')}}">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-1">
                                <label class="form-label" for="max_capacity">{{__('locale.form.max_capacity')}}</label>
                                <input type="text" id="max_capacity" class="form-control" name="max_capacity" placeholder="{{__('locale.form.max_capacity')}}">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-1">
                                <label class="form-label" for="max_battery_capacity">{{__('locale.form.max_battery_capacity')}}</label>
                                <input type="text" id="max_battery_capacity" class="form-control" name="max_battery_capacity" placeholder="{{__('locale.form.max_battery_capacity')}}">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-1">
                                <label class="form-label" for="has_battery">{{__('locale.form.has_battery')}}</label>
                                <select class="form-select" id="has_battery" name="has_battery">
                                    <option selected value="1">{{__('locale.form.yes')}}</option>
                                    <option value="0">{{__('locale.form.no')}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-1">
                                <label class="form-label" for="has_limits">{{__('locale.form.has_limits')}}</label>
                                <select class="form-select" id="has_limits" name="has_limits">
                                    <option selected value="1">{{__('locale.form.yes')}}</option>
                                    <option value="0">{{__('locale.form.no')}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary me-1 waves-effect waves-float waves-light">{{__("locale.form.submit")}}</button>
                            <button type="reset" class="btn btn-outline-secondary waves-effect">{{__("locale.form.reset")}}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
