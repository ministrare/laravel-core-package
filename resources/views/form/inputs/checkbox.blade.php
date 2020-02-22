<?php $error = false; ?>

@error($slug)
<?php $error = true; ?>
@enderror

<div class="{{!isset($class) ? "form-group" : "form-group row"}}">
    @isset($options)
        @foreach($options as $slug => $label)
            @isset($class)
                <div class="{{$class}}">
                    @endisset
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="{{ $slug }}" id="{{ $slug }}_check_input" {{ old( $slug ) ? 'checked' : '' }} {{isset($disabled)? 'disabled' : ''}}>

                        <label class="form-check-label" for="{{ $slug }}_check_input">
                            @isset($icon)<i class="fas fa-{{ $icon }} fa-fw"></i>@else{{ $label }}@endif
                        </label>
                    </div>
                    @isset($class)
                </div>
            @endisset
        @endforeach
    @endisset
</div>

