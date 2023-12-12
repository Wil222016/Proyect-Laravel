<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('dish_id') }}
            {{ Form::text('dish_id', $dishOfferedMenu->dish_id, ['class' => 'form-control' . ($errors->has('dish_id') ? ' is-invalid' : ''), 'placeholder' => 'Dish Id']) }}
            {!! $errors->first('dish_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('menu_offered_id') }}
            {{ Form::text('menu_offered_id', $dishOfferedMenu->menu_offered_id, ['class' => 'form-control' . ($errors->has('menu_offered_id') ? ' is-invalid' : ''), 'placeholder' => 'Menu Offered Id']) }}
            {!! $errors->first('menu_offered_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>