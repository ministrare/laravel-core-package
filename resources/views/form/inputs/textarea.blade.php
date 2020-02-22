<?php $error = false; ?>

@error($slug)
<?php $error = true; ?>
@enderror

<div class="{{!isset($class) ? "form-group" : "form-group row"}}">
    @isset($class)
        <div class="{{$class}}">
    @endisset

    <label for="{{ $slug }}_text">@isset($icon)<i class="fas fa-{{$icon}} fa-fw"></i>@else{{$label}}@endif</label>

    <textarea id="{{ $slug }}_text" class="form-control{{($error) ? ' is-invalid' : '' }}" name="{{$slug}}"
       @isset($placeholder) placeholder="{{ $placeholder }}" @endif
       @isset($required) required @endif
       @isset($autofocus) autofocus @endif
       @isset($rows) rows="{{ $rows }}" @endif
    >{{ isset($value) ? $value : '' }}</textarea>

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

