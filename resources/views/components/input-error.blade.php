@props(['for'])

@error($for)
    <span {{ $attributes->merge(['class' => 'error']) }}>{{ $message }}</span>
@enderror
