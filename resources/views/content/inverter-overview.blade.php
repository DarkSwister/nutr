@extends('layouts/contentLayoutMaster')

@section('title', __('locale.inverter_overview'))

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
    <div class="container">
        <div class="row match-height">
            <div class="col-12 col-md-9 col-lg-6">
                <div class="card">
                    <div class="card-header d-flex flex-sm-row flex-column justify-content-md-between align-items-start justify-content-start" >
                        <div>
                            <h4 class="card-title">Invertoru vēsture</h4>
                            <span class="card-subtitle text-muted">Vesturisko datu atspoguļošana</span>
                        </div>
                        <div class="d-flex align-items-center">
                            <i class="font-medium-2" data-feather="calendar"></i>
                            <input
                                type="text"
                                class="form-control flat-picker bg-transparent border-0 shadow-none"
                                placeholder="YYYY-MM-DD"
                            />
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="line-area-chart"></div>
                    </div>
                </div>
            </div>


            <div class="col-lg-3 col-md-6 col-12">
                <div class="card card-browser-states">
                    <div class="card-header">
                        <div>
                            <h4 class="card-title">Inventoru ražotāji</h4>
                        </div>

                    </div>
                    <div class="card-body">
                        @php
                            $total_count = \App\Models\Invertor::count();
                        @endphp
                        @foreach(\App\Models\Invertor::query()->select('manufacturer', DB::raw('COUNT(1) as count'))->groupBy('manufacturer')->orderByDesc('count')->get() as $manufacturer)
                            @php
                                $end_value = round(($manufacturer->count / $total_count) * 100, 1);
                            @endphp
                            <div class="browser-states @if($loop->index > 4) d-none @endif">
                                <div class="d-flex">
                                    <h6 class="align-self-center mb-0">{{$manufacturer->manufacturer}}</h6>
                                </div>
                                <div class="d-flex align-items-center">
                                    <div class="fw-bold text-body-heading me-1">{{ $end_value }}%</div>
                                    <div class="pie-chart-small" data-chart-value="{{ $end_value }}" data-chart-color="@if($end_value > 10) #28c76f @elseif($end_value > 5) #ff9f43 @elseif($end_value > 1) #ea5455 @else #636363 @endif"></div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <!--/ Browser States Card -->

            <!-- Goal Overview Card -->
            <div class="col-lg-3 col-md-6 col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="card-title">Kopējā efektivitāte</h4>
                        <i data-feather="help-circle" class="font-medium-3 text-muted cursor-pointer"></i>
                    </div>
                    <div class="card-body p-0">
                        <div id="goal-overview-radial-bar-chart" data-apex-value="81" class="my-2"></div>

                        <div class="row border-top text-center mx-0">
                            <div class="col-6 border-end py-1">
                                <p class="card-text text-muted mb-0">Kopējais inventoru skaits</p>
                                <h3 class="fw-bolder mb-0">{{ $total_count }}</h3>
                            </div>
                            <div class="col-6 py-1">
                                <p class="card-text text-muted mb-0">Inventori, kuri nedarbojas</p>
                                <h3 class="fw-bolder mb-0">{{ \App\Models\Invertor::query()->where('status', '!=', 200)->count() }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Goal Overview Card -->

        </div>
    </div>

    <!--  inventoru tabula -->
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card card-statistics">

                    <div class="card-header">
                        <h4 class="card-title">{{__('locale.inverters')}}</h4>
                        <div class="d-flex align-items-center">
                            <form action="{{route('inverter-create')}}">
                                <button type="submit" class="btn btn-primary waves-effect waves-float waves-light">{{__("locale.add_inverter")}}</button>
                            </form>
                        </div>
                    </div>

                    <div class="card-body">
                        <table role="table" aria-busy="false" aria-colcount="6" class="table b-table table-sm table-hover">
                            <thead role="rowgroup" class="">
                            <tr role="row" class="">
                                <th role="columnheader" scope="col" tabindex="0" aria-colindex="1" aria-sort="none"
                                    style="word-wrap: break-word;max-width: 200px;">
                                    <div>#NR./ īpašnieks</div>
                                </th>
                                <th role="columnheader" scope="col" tabindex="0" aria-colindex="2" aria-sort="none"
                                    class="">
                                    <div>Informācija</div>
                                </th>
                                <th role="columnheader" scope="col" tabindex="0" aria-colindex="3" aria-sort="none"
                                    class="">
                                    <div>Jauda</div>
                                </th>

                                <th role="columnheader" scope="col" tabindex="0" aria-colindex="5" aria-sort="none"
                                    class="">
                                    <div>Darbības režīms</div>
                                </th>
                                <th role="columnheader" scope="col" aria-colindex="6" class="">
                                    <div>Saražots</div>
                                </th>
                                <th role="columnheader" scope="col" aria-colindex="6" class="">
                                    <div>darbība</div>
                                </th>
                            </tr>
                            </thead>
                            <tbody role="rowgroup">
                            @foreach(\App\Models\Invertor::query()->orderByDesc('id')->get() as $inverter)
                                <tr role="row" class="">

                                    <td aria-colindex="1" role="cell">
                                        <div class="media d-flex align-items-center">
                                            <div class="media-body">
                                                @foreach($inverter->clients()->get() as $client)
                                                    <a href="#url-check" class="font-weight-bold d-block">
                                                        {{ $client->name }}
                                                    </a>
                                                @endforeach
                                                <small class="text-muted">#{{ $inverter->serial_number }}</small>
                                            </div>
                                        </div>
                                    </td>

                                    <td aria-colindex="2" role="cell" class="">
                                        <div class="d-block">
                                            <div>
                                             <span class="badge text-capitalize badge-light-info badge-pill">
                                                {{ $inverter->manufacturer }}
                                            </span>
                                            </div>
                                            <div>
                                                <span>{{ $inverter->clients()->first()?->address }}</span>
                                            </div>
                                            @if($inverter->location)
                                                <div>
                                                    <a href="https://www.google.com/maps/{{ '@'.$inverter->location }},17.04z" target="_blank"> Skatīt kartē </a>
                                                </div>
                                            @endif
                                        </div>

                                    </td>
                                    @if($inverter->status === 200 && $inverter->histories()->exists())
                                        @php
                                            $history = $inverter->histories()->orderByDesc('id')->first();
                                        @endphp
                                        <td aria-colindex="3" role="cell" class="">
                                            <div class="d-block text-nowrap">
                                                <div>
                                                    <span class="align-text-top text-capitalize">Ražo tīklam</span>
                                                    <span class="text-info">@if($history->power_type == 1){{ round($history->current_consumption / 1000, 3) ?? '-' }}@else{{ 0 }}@endif kwh</span>
                                                </div>
                                                <div>
                                                    <span class="align-text-top text-capitalize">Ražo patēriņam</span>
                                                    <span class="text-info">@if($history->power_type == 2){{ round($history->current_consumption / 1000, 3) ?? '-' }}@else{{ 0 }}@endif kwh</span>
                                                </div>
                                                <div>
                                                    <span class="align-text-top text-capitalize">Efektivitāte</span>
                                                    <span class="text-success">{{ round($history->performance * 100, 1) ?? '-' }}%</span>
                                                </div>
                                            </div>

                                        </td>
                                        <td aria-colindex="5" role="cell" class="">

                                            <div class="d-block text-nowrap">
                                                <div>
                                            <span class="badge text-capitalize badge-light-success badge-pill">
                                                Ražo
                                            </span>
                                                </div>
                                                <div>
                                                    ierobežojums:
                                                    <span class="text-info">{{ round(($history->current_max_capacity ?? $inverter->max_capacity ?? '-')/1000,3) }} W</span>
                                                </div>

                                                <div>
                                                    <a href="#url-check">mainīt</a>
                                                </div>
                                            </div>
                                        </td>

                                        <td aria-colindex="6" role="cell" class="">
                                            <div class="d-block text-nowrap">
                                                <div>
                                                    <span class="align-text-top text-capitalize">Pēdējā stundā</span>
                                                    <span class="text-info">10 kw</span>
                                                </div>
                                                <div>
                                                    <span class="align-text-top text-capitalize">Šodien</span>
                                                    <span class="text-info">20 kw</span>
                                                </div>
                                                <div>
                                                    <span class="align-text-top text-capitalize">Šonedēļ</span>
                                                    <span class="text-info">200 kw</span>
                                                </div>
                                            </div>
                                        </td>
                                    @else
                                        <td colspan="3">
                                            <div>
                                                @if($inverter->status > 200)
                                                    <span class="text-danger">Iekārtai kļūdas paziņojums [ERR: <b>{{ $inverter->status }}</b>]</span>
                                                @elseif($inverter->status < 200)
                                                    <span class="text-muted">Iekārta neaktīva</span>
                                                @endif
                                            </div>
                                        </td>
                                    @endif

                                    <td aria-colindex="6" role="cell" class="">
                                        <div class="d-block text-center">
                                            <div>
                                                <a href="{{ route('device-details', $inverter->id) }}">Vairāk</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            <!---->
                            </tbody>
                            <!---->
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('vendor-script')
    {{-- vendor files --}}
    <script src="{{ asset(mix('vendors/js/charts/apexcharts.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/pickers/flatpickr/flatpickr.min.js')) }}"></script>
@endsection
@section('page-script')
    {{-- Page js files --}}
    <script src="{{ asset(mix('js/scripts/pages/dashboard-ecommerce.js')) }}"></script>
    <script src="{{ asset(mix('js/scripts/charts/chart-apex.js')) }}"></script>
    <script>

    </script>
@endsection
