<div id="{{ $name . '_div' }}" class="form-group">
    <label for="{{ $name }}">{{ $label }} <x-element.required-asterisk
            :required="$required"></x-element.required-asterisk></label>
    <input type="{{ $type }}" id="{{ $name }}" value="{{ old($name, $value) }}"
        {{ $required ? 'required' : '' }} name="{{ $name }}" {{ $required ? 'required' : '' }}
        class="form-control {{ $errors->has($name) ? 'is-invalid' : '' }} {{ implode(',', $classes) }} ">
    @if ($errors->has($name))
        <span class="invalid-feedback">{{ $errors->first($name) }}</span>
    @endif
</div>
