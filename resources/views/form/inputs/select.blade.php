<?php $error = false; ?>

@error($slug)
<?php $error = true; ?>
@enderror

<div class="{{isset($class) ? "form-group row" : "form-group"}}">
    @isset($class)
        <div class="{{$class}}">
    @endisset

            <label for="{{ $slug }}_select">@isset($icon)<i class="fas fa-{{ $icon }} fa-fw"></i>@else{{ $label }}@endif</label>
    @isset($options)
        <select @isset($multiple){{"multiple"}}@endisset class="form-control" id="{{ $slug }}_select" name="{{ $slug }}" @if(isset($size)) size="{{ $size }}" @endif>
            @if(isset($emptyFirst) && $emptyFirst)
                <option value=""></option>
            @endif
            @foreach($options as $key => $label)
            <option value="{{ $key }}" @if(isset($value) || old($slug)) @if($key === $value || $key === old($slug) || in_array($key,$value)){{ 'selected' }}@endif @endisset>{{ $label }}</option>
            @endforeach
        </select>
    @endisset

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
