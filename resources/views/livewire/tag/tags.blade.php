@section('title', 'Tags')
<div class="">
    <div class="content-header-right text-md-end col-md-12 col-12 d-md-block ">
        <div class="mb-1 breadcrumb-right">
                <button class="btn-icon btn btn-primary btn-round  dropdown-toggle align-content-center" type="button"
                        wire:click="viewModal">
                    <x-feathericon-plus class="align-content-center "/>
                    <span class="align-middle">@lang('Create')</span>
                </button>
        </div>
    </div>
    <!-- Modal -->
    @include('modals.simple-model-create-modal',['model'=>'tag','attribute' => 'name'])
</div>
