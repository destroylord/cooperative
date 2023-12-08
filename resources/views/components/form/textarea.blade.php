@props([
    'id',
    'name' => '',
    'value' => '',
    'class' => 'form-control',
    'label',
    'labelClass' => 'form-label',
])

<div class="mb-3">
    <label for="{{ $label }}" {{ $attributes->merge(['class' => $labelClass]) }}>{{ $label }}</label>
    <textarea {{ $attributes->merge(['class' => $class]) }} id="{{ $id }}" name="{{ $name }}" rows="3"></textarea>
</div>