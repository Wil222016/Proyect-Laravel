<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('quantity') }}
            {{ Form::text('quantity', $drinkConsumption->quantity, ['class' => 'form-control' . ($errors->has('quantity') ? ' is-invalid' : ''), 'placeholder' => 'Quantity']) }}
            {!! $errors->first('quantity', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('unit_price') }}
            {{ Form::text('unit_price', $drinkConsumption->unit_price, ['class' => 'form-control' . ($errors->has('unit_price') ? ' is-invalid' : ''), 'placeholder' => 'Unit Price']) }}
            {!! $errors->first('unit_price', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('entry_register_id') }}
            {{ Form::text('entry_register_id', $drinkConsumption->entry_register_id, ['class' => 'form-control' . ($errors->has('entry_register_id') ? ' is-invalid' : ''), 'placeholder' => 'Entry Register Id']) }}
            {!! $errors->first('entry_register_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('drink_id') }}
            {{ Form::text('drink_id', $drinkConsumption->drink_id, ['class' => 'form-control' . ($errors->has('drink_id') ? ' is-invalid' : ''), 'placeholder' => 'Drink Id']) }}
            {!! $errors->first('drink_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>