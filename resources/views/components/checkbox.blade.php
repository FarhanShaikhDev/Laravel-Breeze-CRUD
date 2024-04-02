<!-- resources/views/components/checkbox.blade.php -->

@props(['name', 'value', 'checked' => false])

<input type="checkbox" name="{{ $name }}" id="{{ $name }}" value="{{ $value }}" {{ $attributes->merge(['class' => 'form-checkbox']) }} {{ $checked ? 'checked' : '' }}>
