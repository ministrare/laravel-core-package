<?php $error = false; ?>

@error($slug)
<?php $error = true; ?>
@enderror

<div class="{{isset($class) ? "form-group" : "form-group row"}}">
    @isset($class)
        <div class="{{$class}}">
    @endisset

    <label for="{{ $slug }}_input">@isset($icon)<i class="fas fa-{{$icon}} fa-fw"></i>@else{{$label}}@endif</label>

    <input id="{{ $slug }}_input" class="form-control{{ isset($readonly)? "-plaintext" : " " }}{{($error) ? ' is-invalid' : '' }}{{ isset($size) ? 'form-control-'.$size : '' }}" type="text" name="{{ $slug }}" value="{{ (old($slug)) ? old($slug) : (isset($value)) ? $value : '' }}"
           @isset($placeholder) placeholder="{{ $placeholder }}" @endif
           @isset($required) required @endif
           @isset($autofocus) autofocus @endif
           @isset($autocomplete) autocomplete="{{$slug}}" @endif
           @isset($readonly) readonly @endif
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

