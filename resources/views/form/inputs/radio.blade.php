<?php $error = false; ?>

@error($slug)
<?php $error = true; ?>
@enderror

<div class="{{!isset($class) ? "form-group" : "form-group row"}}">
    @isset($options)
        @foreach($options as $key => $label)

            @isset($class)
                <div class="{{$class}}">
                    @endisset
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="{{ $slug }}" id="{{ $slug }}_radio_input_{{ $key }}" value="{{ $key }}" {{ old( $slug ) === $key ? 'checked' : '' }} {{isset($disabled)? 'disabled' : ''}}>

                        <label class="form-check-label" for="{{ $slug }}_radio_input_{{ $key }}">
                            @isset($icon)<i class="fas fa-{{ $icon }} fa-fw"></i>@else{{ $label }}@endif
                        </label>
                    </div>
                    @isset($class)
                </div>
            @endisset
        @endforeach
    @endisset
</div>

