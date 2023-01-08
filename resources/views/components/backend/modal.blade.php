@props(['id', 'maxWidth'])

@php
    $id = $id ?? md5($attributes->wire('model'));
    $maxWidth = [
        'sm' => ' modal-sm',
        'md' => '',
        'lg' => ' modal-lg',
        'xl' => ' modal-xl',
        'full' => ' modal-fullscreen',
    ][$maxWidth ?? 'md'];
@endphp
<div
    x-data="{
        show: @entangle($attributes->wire('model')),
    }"
    x-init="() => {
        $watch('show', value => {
            if (value) {
            console.log(value);
                $('#modal-id-{{ $id }}').modal('show');
                show = false;
            }
        });
    }"
    wire:ignore.self
    class="modal fade text-start modal-primary show"
    tabindex="-1"

    id="modal-id-{{ $id }}"
    aria-labelledby="modal-id-{{ $id }}"
    aria-hidden="true"
    x-ref="modal-id-{{ $id }}"
>
    <div class="modal-dialog{{ $maxWidth }} modal-dialog-centered" >
        {{ $slot }}
    </div>
</div>
