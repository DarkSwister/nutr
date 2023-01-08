@extends('layouts/contentLayoutMaster')

@section('title', 'Company Details')

@section('vendor-style')
    <!-- vendor css files -->
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/charts/apexcharts.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/flatpickr/flatpickr.min.css')) }}">
@endsection

@section('page-style')
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/pickers/form-flat-pickr.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/charts/chart-apex.css')) }}">
@endsection

@section('content')
    <!-- Kick start -->
    <div class="container mb-5">
        <h2>Uzņēmums</h2>
        <div class="col-12">
            <div class="card card-statistics">
                <div class="card-header">
                    <h4 class="card-title">Statistika</h4>
                    <div class="d-flex align-items-center">
                        <p class="card-text font-small-2 me-25 mb-0">Statistika par septembra mēnesi</p>
                    </div>
                </div>
                <div class="card-body statistics-body">
                    <div class="row">
                        <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
                            <div class="d-flex flex-row">
                                <div class="avatar bg-light-primary me-2">
                                    <div class="avatar-content">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trending-up avatar-icon"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline><polyline points="17 6 23 6 23 12"></polyline></svg>
                                    </div>
                                </div>
                                <div class="my-auto">
                                    <h4 class="fw-bolder mb-0">700kW</h4>
                                    <p class="card-text font-small-3 mb-0">Saražots</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
                            <div class="d-flex flex-row">
                                <div class="avatar bg-light-info me-2">
                                    <div class="avatar-content">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user avatar-icon"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                    </div>
                                </div>
                                <div class="my-auto">
                                    <h4 class="fw-bolder mb-0">200</h4>
                                    <p class="card-text font-small-3 mb-0">Klienti</p>
                                </div>

                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-sm-0">
                            <div class="d-flex flex-row">
                                <div class="avatar bg-light-danger me-2">
                                    <div class="avatar-content">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-box avatar-icon"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg>
                                    </div>
                                </div>
                                <div class="my-auto">
                                    <h4 class="fw-bolder mb-0">12</h4>
                                    <p class="card-text font-small-3 mb-0">Inverori</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6 col-12">
                            <div class="d-flex flex-row">
                                <div class="avatar bg-light-success me-2">
                                    <div class="avatar-content">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-dollar-sign avatar-icon"><line x1="12" y1="1" x2="12" y2="23"></line><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
                                    </div>
                                </div>
                                <div class="my-auto">
                                    <h4 class="fw-bolder mb-0">550kW</h4>
                                    <p class="card-text font-small-3 mb-0">Tīkla patēriņš</p>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container mb-5">
        <div class="card">
            <div class="
            card-header
            d-flex
            flex-sm-row flex-column
            justify-content-md-between
            align-items-start
            justify-content-start
          ">
                <div>
                    <p class="card-subtitle text-muted mb-25">Nedēļas saražojums</p>
                    <h4 class="card-title fw-bolder">3050kW</h4>
                </div>
                <div class="d-flex align-items-center mt-md-0 mt-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar font-medium-2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                    <input type="text" class="form-control flat-picker bg-transparent border-0 shadow-none flatpickr-input" placeholder="YYYY-MM-DD" readonly="readonly">
                </div>
            </div>
            <div class="card-body" style="position: relative;">
                <div id="bar-chart-company" style="min-height: 400px;">
                </div>
                <div class="resize-triggers">
                    <div class="expand-trigger">
                        <div style="width: 927px; height: 422px;"></div>
                    </div>
                    <div class="contract-trigger"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <h4 class="card-title">Kompānijas atrašanās vieta</h4>
                    </div>
                    <div class="card-body">
                        <div class="leaflet-map leaflet-container leaflet-retina leaflet-fade-anim leaflet-grab leaflet-touch-drag" id="shape-map-company" tabindex="0" style="position: relative;">
                        </div>
                    </div>
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
    <script>
        $(function () {
            'use strict';
            // THIS GOES INTO MAP-LEAFLET.js
            if ($('#shape-map').length) {
                var markerMap = L.map('shape-map-company').setView([56.85, 24.27], 12);
                var marker = L.marker([56.85, 24.27]).addTo(markerMap);
                L.tileLayer('https://{s}.tile.osm.org/{z}/{x}/{y}.png', {
                    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a>',
                    maxZoom: 18
                }).addTo(markerMap);
            }
            // THIS GOES INTO CHART-APEX.JS
            var companyBarChartEl = document.querySelector('#bar-chart-comapny'),
                barChartConfig = {
                    chart: {
                        height: 400,
                        type: 'bar',
                        parentHeightOffset: 0,
                        toolbar: {
                            show: false
                        }
                    },
                    plotOptions: {
                        bar: {
                            horizontal: true,
                            barHeight: '30%',
                            endingShape: 'rounded'
                        }
                    },
                    grid: {
                        xaxis: {
                            lines: {
                                show: false
                            }
                        },
                        padding: {
                            top: -15,
                            bottom: -10
                        }
                    },
                    colors: window.colors.solid.info,
                    dataLabels: {
                        enabled: false
                    },
                    series: [
                        {
                            data: [700, 350, 480, 600, 210, 550, 150]
                        }
                    ],
                    xaxis: {
                        categories: ['P, 11', 'O, 14', 'T, 15', 'C, 18', 'Pk, 20', 'SE, 21', 'SV, 23']
                    },
                    yaxis: {
                        opposite: isRtl
                    }
                };
            if (typeof companyBarChartEl !== undefined && companyBarChartEl !== null) {
                var barChart = new ApexCharts(companyBarChartEl, barChartConfig);
                barChart.render();
            }
        })
    </script>
@endsection
