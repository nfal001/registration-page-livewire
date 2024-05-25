@props(['color'])
<button type="button" {{ $attributes->merge(['class'=>'btn btn-'.$color]) }}>{{ $slot }}</button>