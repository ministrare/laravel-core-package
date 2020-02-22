<?php $error = false; ?>

@error($slug)
<?php $error = true; ?>
@enderror

<div class="{{isset($class) ? "form-group row" : "form-group"}}">
    @isset($class)
        <div class="{{$class}}">
    @endisset

    <label for="{{ $slug }}_input">
        @isset($icon)
            <i class="fas fa-{{$icon}} fa-fw"></i>
        @else
            {{$label}}
        @endif
    </label>

    <input
        id="{{ $slug }}_input"
        class="form-control{{ isset($readonly)? "-plaintext" : " " }}{{($error) ? ' is-invalid' : '' }}{{ isset($size) ? 'form-control-'.$size : '' }}"
        type="text"
        name="{{ $slug }}"
        value="{{ old($slug)??$value }}"
        @isset($autocomplete) autocomplete="{{$slug}}" @endif
        @isset($autofocus) autofocus @endif
        @isset($disabled) disabled @endif
        @isset($placeholder) placeholder="{{ $placeholder }}" @endif
        @isset($readonly) readonly @endif
        @isset($required) required @endif
    >
    @isset($small)
        <small id="{{ $slug }}_help" class="form-text text-muted">{{ $small }}</small>
    @endif

    @error($slug)
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror

    @isset($class)
        </div>
    @endisset
</div>

