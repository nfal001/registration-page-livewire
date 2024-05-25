@props(['id','type','value'])
<input
type="{{ $type }}"
@error('formDaftarSantri.email')             
{{ $attributes->merge(['class' => 'form-control is-invalid']) }}
@else
{{ $attributes->merge(['class' => 'form-control']) }}
@enderror
id="{{ $id }}"
value="{{ $value }}"
placeholder="Enter email"/>