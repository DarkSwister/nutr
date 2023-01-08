<div>
    <div class="row">
        <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
            <div class="d-flex flex-row">
                <div class="my-auto">
                    <h4 class="fw-bolder mb-0">{{$this->user->bmi}}</h4>
                    <p wire:ignore class="card-text font-small-3 mb-0 text-info" data-bs-toggle="tooltip"
                       data-bs-placement="bottom"
                       title="Body mass index (BMI) is a measure of body fat based on height and weight that applies to adult men and women.">@lang('BMI')</p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
            <div class="d-flex flex-row">

                <div class="my-auto">
                    <h4 class="fw-bolder mb-0">{{$this->user->getBmr()}}</h4>
                    <p wire:ignore class="card-text font-small-3 mb-0 text-info"
                       data-bs-toggle="tooltip"
                       data-bs-placement="bottom"
                       title="Your Basal Metabolic Rate (BMR) is the number of calories you burn as your body performs basic (basal) life-sustaining function. Commonly also termed as Resting Metabolic Rate (RMR), which is the calories burned if you stayed in bed all day.  In either case, many utilize the basal metabolic rate formula to calculate their body’s metabolism rate.">
                        @lang('Maintenance Calories')</p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-sm-0">
            <div class="d-flex flex-row">
                <div class="my-auto">
                    <h4 class="fw-bolder mb-0">{{ $this->user->getCutCalories()}}</h4>
                    <p class="card-text font-small-3 mb-0">@lang('Cut Calories')</p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 col-12">
            <div class="d-flex flex-row">
                <div class="my-auto">
                    <h4 class="fw-bolder mb-0">{{ $this->user->getBulkCalories() }}</h4>
                    <p class="card-text font-small-3 mb-0">@lang('Bulk Calories')</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-xl-12 col-sm-12 col-12 mb-2 mb-xl-0">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th>@lang('Activity Level')</th>
                        <th>@lang('Calorie')</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach(\App\Domains\Auth\Models\User::$activityLevel as $activity)
                        <tr>
                            <td>
                                <span class="fw-bold">{{Str::headline($activity)}}</span>
                            </td>
                            <td>
                                <span
                                    class="fw-bold">{{number_format($this->user->getTdeeForActivity($activity))}}</span>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

