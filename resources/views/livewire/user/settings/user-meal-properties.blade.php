@section('vendor-style')
    <!-- vendor css files -->
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/spinner/jquery.bootstrap-touchspin.css'))}}">
@endsection
<div>
    <div wire:ignore class="row ">
        <div class="col-4 ">
            <div class="demo-inline-spacing">
                <label for="age">@lang('Age')</label>
                <div class="input-group input-group-lg">
                    <input wire:model.defer='state.age' id="age" required
                           type="number" class="touchspin"/>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="demo-inline-spacing">
                <label for="weight">@lang('Weight')</label>
                <div class="input-group input-group-lg">
                    <input wire:model.defer='state.weight' id="weight" required
                           type="number"
                           class="touchspin"/>
                </div>
            </div>
        </div>
        <div class="col-4 ">
            <div class="demo-inline-spacing">
                <label for="height">@lang('Height')</label>
                <div class="input-group input-group-lg">
                    <input wire:model.defer='state.height' id="height" required
                           type="number" class="touchspin"/>
                </div>
            </div>
        </div>
    </div>


    <div class="row custom-options-checkable g-1 mt-2">
        <div class="col-md-6">
            <input
                wire:model.defer="state.gender"
                class="custom-option-item-check"
                type="radio"
                name="gender"
                id="male"
                value="male"
                checked=""

            />
            <label class="custom-option-item p-1" for="male">
              <span class="d-flex justify-content-between flex-wrap mb-50">
                <span class="fw-bolder">@lang('Male')</span>
              </span>
            </label>
        </div>

        <div class="col-md-6">
            <input
                wire:model.defer="state.gender"
                class="custom-option-item-check"
                type="radio"
                name="gender"
                id="female"
                value="female"
            />
            <label class="custom-option-item p-1" for="female">
              <span class="d-flex justify-content-between flex-wrap mb-50">
                <span class="fw-bolder">@lang('Female')</span>
              </span>
            </label>
        </div>
    </div>
    <div class="row custom-options-checkable g-1 mt-2">
        @foreach(\App\Domains\Auth\Models\User::$eatTypes as $key => $eat)
            <div class="col-md-4">
                <input
                    wire:model.defer="state.eat_type"
                    class="custom-option-item-check"
                    type="radio"
                    name="eat_type"
                    id="eatType-{{$key}}"
                    value="{{$eat}}"

                />
                <label class="custom-option-item p-1" for="eatType-{{$key}}">
              <span class="d-flex justify-content-between flex-wrap mb-50">
                <span class="fw-bolder">@lang(ucfirst($eat))</span>
              </span>
                </label>
            </div>
        @endforeach
    </div>

    <div class="row custom-options-checkable g-1 mt-2">
        @foreach(\App\Domains\Auth\Models\User::$program as $key => $prog)
            <div class="col-md-4">
                <input
                    wire:model.defer="state.program"
                    class="custom-option-item-check"
                    type="radio"
                    name="program"
                    id="program-{{$key}}"
                    value="{{$prog}}"

                />
                <label class="custom-option-item p-1" for="program-{{$key}}">
              <span class="d-flex justify-content-between flex-wrap mb-50">
                <span class="fw-bolder">@lang(ucfirst($prog))</span>
              </span>
                </label>
            </div>
        @endforeach
    </div>

    <div class="row custom-options-checkable justify-content-between g-1 mt-2">
        @foreach(\App\Domains\Auth\Models\User::$activityLevel as $key => $activity)
            <div class="col-md-2">
                <input
                    wire:model.defer="state.activity_level"
                    class="custom-option-item-check"
                    type="radio"
                    name="activity_level"
                    id="activity-level-{{$key}}"
                    value="{{$activity}}"

                />
                <label class="custom-option-item p-1" for="activity-level-{{$key}}">
              <span class="d-flex justify-content-between flex-wrap mb-50">
                <span class="fw-bolder">@lang(Str::headline($activity))</span>
              </span>
                </label>
            </div>
        @endforeach
    </div>
    <div class="row mt-2">
        <button wire:click="complete" class="btn btn-primary me-1">Apply</button>
    </div>
</div>

@section('vendor-script')
    <!-- vendor files -->
    <script src="{{ asset(mix('vendors/js/forms/spinner/jquery.bootstrap-touchspin.js'))}}"></script>
@endsection


@push('scripts')
    <script>
        $(function () {
            $('.touchspin').TouchSpin({
                max: 500,
                buttondown_class: 'btn btn-primary',
                buttonup_class: 'btn btn-primary',
                buttondown_txt: feather.icons['minus'].toSvg(),
                buttonup_txt: feather.icons['plus'].toSvg()
            });


        });
        document.addEventListener('livewire:load', function () {
            $("#age").change(function () {
                @this.
                set('state.age', $(this).val());
            });

            $("#weight").change(function () {
                @this.
                set('state.weight', $(this).val());
            });
            $("#height").change(function () {
                @this.
                set('state.height', $(this).val());

            });
        })
    </script>
@endpush
