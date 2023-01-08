<div>
    <select wire:model="selectedGroupId" name="group" class="form-select mt-1">
        <option value="">@lang('Choose Group')</option>
        @forelse($groups as $group)
            <option value="{{$group->id}}">{{$group->name}}</option>
        @empty
            <option value="">@lang('You are not assigned to group')</option>
        @endforelse
    </select>

    @error('selectedGroupId')
    <div class="alert alert-danger mt-1" role="alert">
        <div class="alert-body">{{$message}}</div>
    </div>
    @enderror
    @if($groups->isNotEmpty())
        <div class="d-grid col-lg-12 col-md-12 mb-1 mt-2 mb-lg-0">
            <button type="button" wire:click="generateLink"
                    class="btn btn-primary waves-effect waves-float waves-light">@lang('Get Invite Link')</button>
        </div>
    @endisset

    <input type="text" @if(!$link) hidden @endif class="form-control mt-2" id="copy-to-clipboard-input" value="{{$link}}">

    <input type="email"  wire:model.debounce.500ms="email" id="email-input" class="form-control mt-2" placeholder="Email">
    @error('email')
    <div class="alert alert-danger mt-1" role="alert">
        <div class="alert-body">{{$message}}</div>
    </div>
    @enderror
    <div class="col-12 mt-2" >
        <button id="btn-copy" @if(!$link) disabled @endif
                class="btn btn-primary me-1 waves-effect waves-float waves-light">@lang('Copy')</button>
        <button type="button" wire:click="sendEmail" @if(!$validEmail) disabled
                @endif class="btn btn-outline-primary waves-effect">@lang('Invite')</button>
    </div>
</div>
