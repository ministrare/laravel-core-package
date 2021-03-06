<?php $error = false; ?>

@error($slug)
<?php $error = true; ?>
@enderror

<div class="{{isset($class) ? "form-group row" : "form-group"}}">
    @isset($class)
        <div class="{{$class}}">
    @endisset

    <label for="{{ $slug }}_text">
        @isset($icon)
            <i class="fas fa-{{$icon}} fa-fw"></i>
        @else
            {{$label}}
        @endif
    </label>

    <textarea
        id="{{ $slug }}_text"
        class="form-control{{($error) ? ' is-invalid' : '' }}"
        name="{{$slug}}"
        @isset($autofocus) autofocus @endif
        @isset($placeholder) placeholder="{{ $placeholder }}" @endif
        @isset($required) required @endif
        @isset($rows) rows="{{ $rows }}" @endif
    >{{ old($slug)??$value??'' }}</textarea>

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

