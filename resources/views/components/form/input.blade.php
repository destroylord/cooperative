@props([
    'id',
    'type' => 'text',
    'name' => '',
    'value' => '',
    'inputClass' => 'form-control',
    'label',
    'labelClass' => 'form-label',
])

<div class="mb-3">
    <label for="{{ $label }}" {{ $attributes->merge(['class' => $labelClass]) }}>{{ $label }}</label>
    <input
        {!! $attributes->merge(['class' => $inputClass]) !!} 
        type="{{ $type }}" @if(strlen($name) > 0) 
        name="{{ $name }}" @endif value="{{ old($name,$value) }}" 
        id="{{ $id }}"  @readonly(isset($readonly)) />
</div>

 @error($name)
    <div class="text-danger">
        {{ $message }}
    </div>
@enderror