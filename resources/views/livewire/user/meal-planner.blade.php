@push('css')
    <style>
        .card-img-top {
            width: 100%;
            height: 4vw;
            object-fit: cover;
        }
    </style>
@endpush
<div>
    <button wire:click="generate" class="btn btn-primary">Generate For Week</button>
    <button wire:click="regenerateForWeek('{{\Carbon\Carbon::now()->toDateString()}}')" class="btn btn-primary">
        Regenerate For Week
    </button>
    <div class="d-flex justify-center flex-column">
        <h3 class="text-h6 mt-2 text-center">{{$this->date->startOfWeek()->toFormattedDayDateString()}}
            - {{$this->date->endOfWeek()->toFormattedDayDateString()}} </h3>
        <div class="d-flex justify-content-center my-2 align-center" style="gap: 10px;">

        </div>
    </div>
    <div class="row">

        @foreach($meals as $day => $entries)
            <div class="col-borders my-1 d-flex flex-column col-sm-12 col-md-4 col-lg-3 col-xl-2 col-12">
                <div class="mb-2 ">
                    <p class="headline text-center mb-1">
                        {{\Carbon\Carbon::createFromDate($day)->toFormattedDayDateString() }}
                    </p>
                </div>
                @foreach($entries as $meal)
                    <div class="card mb-1">
{{--                        <img class="card-img-top" src="{{$meal->recipe->getImageUrlAttribute()}}"/>--}}
                        <div class="card-body">
                            <p class="card-text">
                                {{$meal->recipe->name}}
                                <span
                                    class="badge rounded-pill badge-light-info me-50">{{ucfirst($meal->entry_type)}}</span>

                            </p>
                        </div>
                        <button wire:click="delete('{{$meal->id}}')" class="btn btn-flat-danger">
                            <x-feathericon-trash></x-feathericon-trash>
                        </button>

                    </div>
                @endforeach
                <div class="mb-2 ">
                    <p class="headline text-center mb-1">
                        <button wire:click="regenerateForDay('{{$day}}')" class="btn btn-primary">Regenerate</button>
                    </p>
                </div>
            </div>
        @endforeach

    </div>

</div>
