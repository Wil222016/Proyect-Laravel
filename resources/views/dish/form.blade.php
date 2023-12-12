<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('name') }}
            {{ Form::text('name', $dish->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('description') }}
            {{ Form::text('description', $dish->description, ['class' => 'form-control' . ($errors->has('description') ? ' is-invalid' : ''), 'placeholder' => 'Description']) }}
            {!! $errors->first('description', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('status', 'Estado') }}
            {{ Form::select('status', ['A' => 'Activo', 'I' => 'Inactivo'], $dish->status, ['class' => 'form-control' . ($errors->has('status') ? ' is-invalid' : ''), 'placeholder' => 'Selecciona un estado']) }}
            {!! $errors->first('status', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('type_dish_id', 'Tipo de Plato') }}
            {{ Form::select('type_dish_id', $dishType, $dish->type_dish_id, ['class' => 'form-control' . ($errors->has('type_dish_id') ? ' is-invalid' : ''), 'placeholder' => 'Selecciona un tipo de plato']) }}
            {!! $errors->first('type_dish_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('menu_offered_id', 'Menú Ofrecido') }}
            {{ Form::select('menu_offered_id', $offeredMenu, $dish->menu_offered_id, ['class' => 'form-control' . ($errors->has('menu_offered_id') ? ' is-invalid' : ''), 'placeholder' => 'Selecciona un menú ofrecido']) }}
            {!! $errors->first('menu_offered_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>


    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>