<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('management') }}
            {{ Form::text('management', $semester->management, ['class' => 'form-control' . ($errors->has('management') ? ' is-invalid' : ''), 'placeholder' => 'Management']) }}
            {!! $errors->first('management', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('startDate') }}
            {{ Form::text('startDate', $semester->startDate, ['class' => 'form-control' . ($errors->has('startDate') ? ' is-invalid' : ''), 'placeholder' => 'Startdate']) }}
            {!! $errors->first('startDate', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('endDate') }}
            {{ Form::text('endDate', $semester->endDate, ['class' => 'form-control' . ($errors->has('endDate') ? ' is-invalid' : ''), 'placeholder' => 'Enddate']) }}
            {!! $errors->first('endDate', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('status') }}
            {{ Form::text('status', $semester->status, ['class' => 'form-control' . ($errors->has('status') ? ' is-invalid' : ''), 'placeholder' => 'Status']) }}
            {!! $errors->first('status', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>