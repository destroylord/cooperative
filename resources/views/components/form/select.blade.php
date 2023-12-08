@props([
    'id' => '',
    'name' => '',
    'value' => '',
    'class' => 'form-select',
    'label',
    'labelClass' => 'form-label',
    'options',
    'selected' => null,
])

<div class="mb-3">
    <label for="defaultSelect" {{ $attributes->merge(['class' => $labelClass]) }}>{{ $label }}</label>
    <select @if(strlen($name) > 0) name="{{ $name }}" @endif id="{{ $id }}" {{ $attributes->merge(['class' => $class]) }}>
        <option selected disabled>Pilih salah satu</option>
        @foreach ($options as $key => $option)
            <option value="{{ $key }}" {{ $option == $selected ? 'selected' : '' }}>{{ $option }}</option>
        @endforeach
    </select>
</div>
@error($name)
    <div class="text-danger">
        {{ $message }}
    </div>
@enderror