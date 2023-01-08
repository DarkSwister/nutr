<div>

    @section('title', 'Recipe')
    <div class="card">
        <img src="{{$recipe->getImageUrlAttribute()}}" style="height: 200px" class="img-fluid card-img-top mt-2"
             alt="Blog Detail Pic">
        <!-- Product Details starts -->
        <div class="card-body">
            <div class="row my-2">

                {{-- Ingredient Start--}}
                <div class="col-sm-12 col-md-4 col-lg-4 col-12">
                    <div class="d-flex justify-start"><h2 class="mb-2 mt-1">@lang('Ingredients')</h2>

                    </div>
                    <div>
                        <ul class="list-group">
                            @foreach($recipe->ingredients as $ingredient)
                                <li class="list-group-item list-group-item-action d-flex align-items-center">
                                    <div class="form-check">
                                        <label role="button">
                                            <input type="checkbox" role="button" class="form-check-input"/>
                                            <span>{{ucfirst($ingredient)}}</span>
                                        </label>
                                    </div>
                                </li>
                            @endforeach


                        </ul>
                    </div>
                    <div class="d-flex justify-start"><h2 class="mb-2 mt-1">@lang('Nutrition')
                        </h2>
                    </div>
                    <div>
                        <ul class="list-group">
                            <li class="list-group-item d-flex align-items-center">
                                <span></span>
                                <span
                                    class="ms-auto">@lang(' % DAILY VALUE')</span>
                            </li>
                            @foreach($recipe->nutrition->getAttributes() as $key => $nutrient)
                                @if(config()->has('nutrition.labels.'.$key))
                                    <li class="list-group-item d-flex align-items-center">
                                        @if($key === 'calories')
                                            <span><strong>{{ config('nutrition.labels.'.$key) }}</strong> <span
                                                    class="badge bg-primary ">
                                                    {{$nutrient}}
                                           </span></span>

                                        @else
                                            <span>{{ config('nutrition.labels.'.$key) }}</span>
                                            @if($nutrient>0)
                                                <span
                                                    class="badge bg-secondary rounded-pill ms-auto">
                                                    {{$nutrient}}
                                                    %
                                           </span>
                                            @else
                                                <span
                                                    class=" ms-auto">
                                                    <i data-feather="slash" class="font-medium-2"></i>
                                                </span>

                                            @endif
                                        @endif

                                    </li>

                                @endif

                            @endforeach


                        </ul>
                    </div>
                </div>
                {{-- Ingredient End--}}

                {{-- Instructions Start--}}
                <div class="col-sm-12 col-md-8 col-lg-8 col-12">
                    <div class="d-flex justify-start"><h2 class="mb-2 mt-1">@lang('Instructions')</h2>
                    </div>
                    <div class="">
                        <ul class="list-group list-group-numbered">
                            @foreach($recipe->instructions as $instruction)

                                <li class="list-group-item ">
                                    {{ ucfirst($instruction) }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    {{-- Instructions End--}}
                </div>
            </div>
        </div>


    </div>
</div>


@section('vendor-style')
    {{-- Vendor Css files --}}
    <link rel="stylesheet"
          href="{{ asset(mix('vendors/css/forms/spinner/jquery.bootstrap-touchspin.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/swiper.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/toastr.min.css')) }}">
@endsection

@section('page-style')
    {{-- Page Css files --}}
    <link rel="stylesheet" href="{{ asset(mix('css/base/pages/app-ecommerce-details.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-number-input.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/extensions/ext-component-toastr.css')) }}">

@endsection

@section('vendor-script')
    {{-- Vendor js files --}}
    <script src="{{ asset(mix('vendors/js/forms/spinner/jquery.bootstrap-touchspin.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/extensions/swiper.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/extensions/toastr.min.js')) }}"></script>
@endsection

@section('page-script')
    {{-- Page js files --}}
    <script src="{{ asset(mix('js/scripts/pages/app-ecommerce-details.js')) }}"></script>
    <script src="{{ asset(mix('js/scripts/forms/form-number-input.js')) }}"></script>
@endsection
