<div id="{{ $name . '_div' }}" class="form-group">
    <label for="{{ $name }}">{{ $label }} <x-element.required-asterisk
            :required="$required"></x-element.required-asterisk></label>
    <select id="{{ $name }}" name="{{ $name }}" {{ $onChange ? 'onchange=' . $onChange : '' }}
        {{ $required ? 'required' : '' }}
        class="form-control {{ $select2 ? 'select2' : '' }} {{ $errors->has($name) ? 'is-invalid' : '' }}">
        <option value="">-- Select {{ $label }} --</option>
        @if ($labelKey)
            @foreach ($options as $option)
                <option value="{{ $option[$valueKey] }}" {{ $option[$valueKey] == $value ? 'selected' : '' }}>
                    {{ $option[$labelKey] }}</option>
            @endforeach
        @else
            @foreach ($options as $optionValue)
                <option value="{{ $optionValue }}" {{ $optionValue == $value ? 'selected' : '' }}>{{ $optionValue }}
                </option>
            @endforeach
        @endif
    </select>
    @if ($errors->has($name))
        <span class="invalid-feedback">{{ $errors->first($name) }}</span>
    @endif
</div>
