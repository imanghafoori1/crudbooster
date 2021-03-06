<div class='bootstrap-timepicker'>
    <div class='form-group {{$header_group_class}} {{ ($errors->first($name))?"has-error":"" }}'
         id='form-group-{{$name}}' style="{{@$formInput['style']}}">
        <label class='control-label col-sm-2'>{{$label}} {!!($required)?"<span class='text-danger' title='".cbTrans('this_field_is_required')."'>*</span>":"" !!}</label>

        <div class="{{$col_width?:'col-sm-10'}}">
            <div class="input-group">
                @if(!$disabled)
                    <span class="input-group-addon"><i class='fa fa-clock-o'></i></span>
                @endif
                <input type='text' title="{{$label}}"
                       {{$required}} {{$readonly}} {!!$placeholder!!} {{$disabled}} class='form-control notfocus timepicker'
                       name="{{$name}}" id="{{$name}}" readonly value='{{$value}}'/>
            </div>
            {!! underField($formInput['help'], $errors->first($name)) !!}
        </div>
    </div>
</div>