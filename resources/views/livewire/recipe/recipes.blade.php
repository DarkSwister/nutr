@section('page-style')
    {{-- Page Css files --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('css/base/pages/page-blog.css') }}"/>
@endsection
@section('title', 'All Recipes')
<div class="">
    <div class="content-header-right text-md-end col-md-12 col-12 d-md-block d-none">
        <div class="mb-1 breadcrumb-right">
            <div class="dropdown">
                <button class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle" type="button"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <x-feathericon-grid width="14" height="14"/>
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    {{--                    <div class="basic-modal">--}}
                    {{--                        <button wire:click="viewModal" class="dropdown-item">--}}
                    {{--                            <x-feathericon-plus class="me-1" width="14" height="14"/>--}}
                    {{--                            <span class="align-middle">@lang('Create Recipe')</span>--}}
                    {{--                        </button>--}}
                    {{--                    </div>--}}

                    <a class="dropdown-item" href="{{route('recipes.random')}}">
                        <x-feathericon-play class="me-1" width="14" height="14"/>
                        <span class="align-middle">@lang('Random')</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    @include('modals.simple-model-create-modal',['model' => 'recipe','attribute'=>'name'])
    <!-- Basic trigger modal end -->
    <div class="blog-list-wrapper">
        <!-- Blog List Items -->
        <div class="row">
            @foreach($recipes as $recipe)
                <div class="col-md-4 col-12">
                    <div class="card">
                        <a href="{{ route('recipe.show', $recipe->slug) }}">
                            <img class="card-img-top img-fluid" src="{{$recipe->getImageUrlAttribute()}}"
                                 alt="Blog Post pic"/>
                        </a>
                        <div class="card-body">
                            <h4 class="card-title">
                                <a href="{{ route('recipe.show', $recipe->slug) }}" class="blog-title-truncate text-body-heading"
                                >{{$recipe->name}}</a>
                            </h4>
                            <div class="d-flex">
                                <div class="avatar me-50">
                                    <img src="{{$recipe->user->profile_photo_url ?? ''}}" alt="" width="24"
                                         height="24"/>
                                </div>
                                <div class="author-info">
                                    <small class="text-muted me-25">by</small>
                                    <small><a href="#" class="text-body">{{$recipe->user->full_name ?? 'Generated'}}</a></small>
                                    <span class="text-muted ms-50 me-25">|</span>
                                    <small class="text-muted">{{$recipe->created_at->toDateString()}}</small>
                                </div>
                            </div>
                            <div class="my-1 py-25">
                                @foreach($recipe->tags as $tag)
                                    <a href="">
                                        <span class="badge rounded-pill badge-light-info me-50">{{$tag->name}}</span>
                                    </a>
                                @endforeach


                            </div>
                            <p class="card-text blog-content-truncate">
                                {{$recipe->description}}
                            </p>
                            <hr/>
                            <div class="d-flex justify-content-between align-items-center">
                                <button type="button" id="deleteFavourite{{$recipe->id}}"
                                        wire:click="deleteFromFavourites('{{$recipe->id}}')"
                                        class="btn btn-sm btn-primary-outline p-0"
                                        style="{{ $recipe->currentUserFavourites->first() ? '' : 'display: none;' }}">
                                    <x-feathericon-heart style="stroke: darkred;
                                      stroke-width: 2;
                                      stroke-linecap: round;
                                      stroke-linejoin: round;
                                      fill: red;
                                    };"/>
                                </button>
                                <!-- hide if favourited -->
                                <button type="button" id="addFavourite{{$recipe->id}}"
                                        wire:click="addToFavourites('{{$recipe->id}}')"
                                        class="btn btn-sm btn-primary-outline p-0"
                                        style="{{ $recipe->currentUserFavourites->first() ? 'display: none;' : '' }}">
                                    <x-feathericon-heart/>
                                </button>
                                <!-- -->
                                <a href="{{ asset('page/blog/detail#blogComment') }}">
                                    <div class="d-flex align-items-center">
                                        @if($recipe->comments_count > 0)
                                            <i data-feather="message-square" class="font-medium-1 text-body me-50"></i>
                                            <span class="text-body fw-bold">{{$recipe->comments_count}} Comments</span>
                                        @endif
                                    </div>
                                </a>
                                <a href="{{ route('recipe.show',['recipe'=>$recipe->slug]) }}"
                                   class="fw-bold">Read
                                    More</a>
                            </div>
                        </div>
                    </div>
                </div>

            @endforeach
            <div
                x-data="{
        observe () {
            let observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        @this.call('loadMore')
                    }
                })
            }, {
                root: null
            })

            observer.observe(this.$el)
        }
    }"
                x-init="observe"
            ></div>
        </div>

    </div>
</div>

