<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <x-frontend.card>
                <x-slot name="header">
                    @lang('Group')
                </x-slot>

                <x-slot name="body">
                    @lang('Before proceeding, please assign yourself to existing group or create new.')

                    <form class="validate-form mt-2 " wire:submit.prevent="syncGroup">
                        <div class="row mt-2">
                            <div class="col-12 col-sm-12 mb-1">
                                <label class="form-label" for="accountFirstName">@lang('Groups')</label>
                                <select wire:model.defer="selectedGroup" name="group" class="form-select">
                                    <option value="">@lang('Choose Group')</option>

                                    @foreach($groups as $group)
                                        <option value="{{$group->id}}">{{$group->name}}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mt-1 me-1">@lang('Sync')</button>
                    </form>


                </x-slot>
            </x-frontend.card>
        </div><!--col-md-8-->
    </div><!--row-->
</div><!--container-->
