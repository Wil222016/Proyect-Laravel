<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('price') }}
            {{ Form::text('price', $offeredMenu->price, ['class' => 'form-control' . ($errors->has('price') ? ' is-invalid' : ''), 'placeholder' => 'Price']) }}
            {!! $errors->first('price', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('date') }}
            {{ Form::date('date', $offeredMenu->date, ['class' => 'form-control' . ($errors->has('date') ? ' is-invalid' : '')]) }}
            {!! $errors->first('date', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('photo') }}
            {{ Form::file('photo', ['class' => 'form-control-file' . ($errors->has('photo') ? ' is-invalid' : '')]) }}
            {!! $errors->first('photo', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('status') }}
            {{ Form::text('status', $offeredMenu->status, ['class' => 'form-control' . ($errors->has('status') ? ' is-invalid' : ''), 'placeholder' => 'Status']) }}
            {!! $errors->first('status', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('semester_id', 'Semester') }}
            {{ Form::select('semester_id', $semesters, $offeredMenu->semester_id, ['class' => 'form-control' . ($errors->has('semester_id') ? ' is-invalid' : ''), 'placeholder' => 'Select Semester']) }}
            {!! $errors->first('semester_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('type_menu_id', 'Type Menu') }}
            {{ Form::select('type_menu_id', $typeMenus, $offeredMenu->type_menu_id, ['class' => 'form-control' . ($errors->has('type_menu_id') ? ' is-invalid' : ''), 'placeholder' => 'Select Type Menu']) }}
            {!! $errors->first('type_menu_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('schedule_id', 'Schedule') }}
            {{ Form::select('schedule_id', $schedules, $offeredMenu->schedule_id, ['class' => 'form-control' . ($errors->has('schedule_id') ? ' is-invalid' : ''), 'placeholder' => 'Select Schedule']) }}
            {!! $errors->first('schedule_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('category_id', 'Category') }}
            {{ Form::select('category_id', $categories, $offeredMenu->category_id, ['class' => 'form-control' . ($errors->has('category_id') ? ' is-invalid' : ''), 'placeholder' => 'Select Category']) }}
            {!! $errors->first('category_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>
