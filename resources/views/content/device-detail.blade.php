@extends('layouts/contentLayoutMaster')

@section('title', 'Inverter Details')

@section('vendor-style')
    <!-- vendor css files -->
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/charts/apexcharts.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/flatpickr/flatpickr.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/maps/leaflet.min.css')) }}">
@endsection

@section('page-style')
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/pickers/form-flat-pickr.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/charts/chart-apex.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/maps/map-leaflet.css')) }}">
@endsection

@section('content')
    <div class="container-fluid mb-3">
        <!-- current consumption -->
        <div class="row match-height">
            <!-- Goal Overview Card -->
            <div class="col-lg-4 col-md-8 col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="card-title">Invertora jauda</h4>
                        <i data-feather="help-circle" class="font-medium-3 text-muted cursor-pointer"></i>
                    </div>
                    @if($inverter->status === 200 && $inverter->histories()->exists())
                        @php
                            $history = $inverter->histories()->orderByDesc('id')->first();
                        @endphp
                        <div class="card-body p-0">
                            <div id="goal-overview-radial-bar-chart" data-apex-value="{{$history->performance * 100}}"
                                 class="my-2"></div>

                            <div class="row border-top text-center mx-0">
                                <div class="col-6 border-end py-1">
                                    <p class="card-text text-muted mb-0">Jauda</p>
                                    <h3 class="fw-bolder mb-0">{{($history->current_power !== 0 ? round($history->current_power  / 1000, 3).' kwh' : '-') }}
                                    </h3>
                                </div>
                                <div class="col-6 py-1">
                                    <p class="card-text text-muted mb-0">Statuss</p>
                                    <h3 class="fw-bolder mb-0">Aktīvs</h3>
                                    @else
                                        <div class="card-body p-0">
                                            <div id="goal-overview-radial-bar-chart" data-apex-value="0"
                                                 class="my-2"></div>

                                            <div class="row border-top text-center mx-0">
                                                <div class="col-6 border-end py-1">
                                                    <p class="card-text text-muted mb-0">Jauda</p>
                                                    <h3 class="fw-bolder mb-0">-</h3>
                                                </div>
                                                <div class="col-6 py-1">
                                                    <p class="card-text text-muted mb-0">Statuss</p>
                                                    @if($inverter->status > 200)
                                                        <h3 class="text-danger">Iekārtai kļūdas paziņojums [ERR:
                                                            <b>{{ $inverter->status }}</b>]</h3>
                                                    @elseif($inverter->status < 200)
                                                        <h3 class="text-muted">Iekārta neaktīva</h3>
                                                    @endif
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-2 col-12">
                                <div class="card">
                                    <div class="card-header d-flex justify-content-between align-items-center">
                                        <h4 class="card-title">Laikapstākļi</h4>
                                    </div>
                                    <div class="mt-3 d-flex justify-content-evenly">
                                        <div>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                 viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                 stroke-width="2"
                                                 stroke-linecap="round" stroke-linejoin="round"
                                                 class="feather feather-sun ficon">
                                                <circle cx="12" cy="12" r="5"></circle>
                                                <line x1="12" y1="1" x2="12" y2="3"></line>
                                                <line x1="12" y1="21" x2="12" y2="23"></line>
                                                <line x1="4.22" y1="4.22" x2="5.64" y2="5.64"></line>
                                                <line x1="18.36" y1="18.36" x2="19.78" y2="19.78"></line>
                                                <line x1="1" y1="12" x2="3" y2="12"></line>
                                                <line x1="21" y1="12" x2="23" y2="12"></line>
                                                <line x1="4.22" y1="19.78" x2="5.64" y2="18.36"></line>
                                                <line x1="18.36" y1="5.64" x2="19.78" y2="4.22"></line>
                                            </svg>
                                            <h3> 13°</h3>
                                        </div>
                                        <div>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                 viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                 stroke-width="2"
                                                 stroke-linecap="round" stroke-linejoin="round"
                                                 class="feather feather-sun ficon">
                                                <circle cx="12" cy="12" r="5"></circle>
                                                <line x1="12" y1="1" x2="12" y2="3"></line>
                                                <line x1="12" y1="21" x2="12" y2="23"></line>
                                                <line x1="4.22" y1="4.22" x2="5.64" y2="5.64"></line>
                                                <line x1="18.36" y1="18.36" x2="19.78" y2="19.78"></line>
                                                <line x1="1" y1="12" x2="3" y2="12"></line>
                                                <line x1="21" y1="12" x2="23" y2="12"></line>
                                                <line x1="4.22" y1="19.78" x2="5.64" y2="18.36"></line>
                                                <line x1="18.36" y1="5.64" x2="19.78" y2="4.22"></line>
                                            </svg>
                                            <h3> Saulains</h3>
                                        </div>
                                        <div>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                 viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                 stroke-width="2"
                                                 stroke-linecap="round" stroke-linejoin="round"
                                                 class="feather feather-sun ficon">
                                                <circle cx="12" cy="12" r="5"></circle>
                                                <line x1="12" y1="1" x2="12" y2="3"></line>
                                                <line x1="12" y1="21" x2="12" y2="23"></line>
                                                <line x1="4.22" y1="4.22" x2="5.64" y2="5.64"></line>
                                                <line x1="18.36" y1="18.36" x2="19.78" y2="19.78"></line>
                                                <line x1="1" y1="12" x2="3" y2="12"></line>
                                                <line x1="21" y1="12" x2="23" y2="12"></line>
                                                <line x1="4.22" y1="19.78" x2="5.64" y2="18.36"></line>
                                                <line x1="18.36" y1="5.64" x2="19.78" y2="4.22"></line>
                                            </svg>
                                            <h3> 2 UV indekss</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-2 col-12">
                                <div class="card">
                                    <div class="card-header d-flex justify-content-center">
                                        <h4 class="card-title">Ieslēgt/Izslēgt inventoru</h4>
                                    </div>
                                    <div class="mt-3 d-flex justify-content-evenly">
                                        <a target="_blank" class="btn btn-success waves-effect waves-float waves-light">Ieslēgt</a>
                                        <a target="_blank" class="btn btn-danger waves-effect waves-float waves-light">Izslēgt</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-7 col-md-6 col-12">
                            <div class="card">
                                <div class="card-header d-flex justify-content-center">
                                    <h4 class="card-title">Invertora kontroles</h4>
                                </div>
                                <div class="card-body">
                                    <form novalidate="novalidate">
                                        <div class="d-flex justify-content-between mb-1">
                                            <h5>Jaudas limits</h5>
                                            <div class="form-check form-switch">
                                                <input type="checkbox" class="form-check-input"
                                                       id="customSwitch1">
                                            </div>
                                        </div>
                                        <div class="flex-grow-1">
                                            <div class="mb-1">
                                                <div class="position-relative">
                                                    <select id="power"
                                                            class="w-full select2 form-select select2-hidden-accessible"
                                                            data-select2-id="power"
                                                            tabindex="-1"
                                                            aria-hidden="true">
                                                        <option>0</option>
                                                        <option>50</option>
                                                        <option selected>100</option>
                                                        <option>150</option>
                                                        <option>200</option>
                                                        <option>250</option>
                                                        <option>300</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="mb-1">
                                                <div class="d-flex justify-content-between">
                                                    <h5>Limitēt noteiktā periodā</h5>
                                                    <div class="form-check form-switch">
                                                        <input type="checkbox" class="form-check-input"
                                                               id="customSwitch2">
                                                    </div>
                                                </div>
                                                <label class="form-label" for="fp-date-time-from">No</label>
                                                <div class="position-relative"><input type="text" id="fp-date-time-from"
                                                                                      class="form-control flatpickr-date-time flatpickr-input active"
                                                                                      placeholder="YYYY-MM-DD HH:MM"
                                                                                      readonly="readonly">
                                                </div>
                                            </div>
                                            <div class="mb-2">
                                                <label class="form-label" for="fp-date-time-to">Līdz</label>
                                                <div class="position-relative"><input type="text" id="fp-date-time-to"
                                                                                      class="form-control flatpickr-date-time flatpickr-input active"
                                                                                      placeholder="YYYY-MM-DD HH:MM"
                                                                                      readonly="readonly"></div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Map -->
                        <div class="col-lg-5 col-md-6 col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Inventora lokācija</h4>
                                </div>
                                <div class="card-body">
                                    <div
                                        class="leaflet-map leaflet-container leaflet-fade-anim leaflet-grab leaflet-touch-drag"
                                        id="layer-control" tabindex="0"
                                        style="position: relative; outline: none;">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Map -->
                </div>
            </div>
        </div>
    </div>
    <!--/ Page layout -->
@endsection
@section('vendor-script')
    {{-- vendor files --}}
    <script src="{{ asset(mix('vendors/js/charts/apexcharts.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/pickers/flatpickr/flatpickr.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/maps/leaflet.min.js'))}}"></script>
@endsection
@section('page-script')
    {{-- Page js files --}}
    <script src="{{ asset(mix('js/scripts/pages/dashboard-ecommerce.js')) }}"></script>
    <script src="{{ asset(mix('js/scripts/charts/chart-apex.js')) }}"></script>
    <script src="{{ asset(mix('js/scripts/maps/map-leaflet.js'))}}"></script>
@endsection
