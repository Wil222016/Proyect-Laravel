<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('date') }}
            {{ Form::text('date', $reservation->date, ['class' => 'form-control' . ($errors->has('date') ? ' is-invalid' : ''), 'placeholder' => 'Date']) }}
            {!! $errors->first('date', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('num_people') }}
            {{ Form::text('num_people', $reservation->num_people, ['class' => 'form-control' . ($errors->has('num_people') ? ' is-invalid' : ''), 'placeholder' => 'Num People']) }}
            {!! $errors->first('num_people', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('total_amount') }}
            {{ Form::text('total_amount', $reservation->total_amount, ['class' => 'form-control' . ($errors->has('total_amount') ? ' is-invalid' : ''), 'placeholder' => 'Total Amount']) }}
            {!! $errors->first('total_amount', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('receipt') }}
            {{ Form::text('receipt', $reservation->receipt, ['class' => 'form-control' . ($errors->has('receipt') ? ' is-invalid' : ''), 'placeholder' => 'Receipt']) }}
            {!! $errors->first('receipt', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('status') }}
            {{ Form::text('status', $reservation->status, ['class' => 'form-control' . ($errors->has('status') ? ' is-invalid' : ''), 'placeholder' => 'Status']) }}
            {!! $errors->first('status', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('client_id') }}
            {{ Form::text('client_id', $reservation->client_id, ['class' => 'form-control' . ($errors->has('client_id') ? ' is-invalid' : ''), 'placeholder' => 'Client Id']) }}
            {!! $errors->first('client_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('person_id') }}
            {{ Form::text('person_id', $reservation->person_id, ['class' => 'form-control' . ($errors->has('person_id') ? ' is-invalid' : ''), 'placeholder' => 'Person Id']) }}
            {!! $errors->first('person_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('menu_offered_id') }}
            {{ Form::text('menu_offered_id', $reservation->menu_offered_id, ['class' => 'form-control' . ($errors->has('menu_offered_id') ? ' is-invalid' : ''), 'placeholder' => 'Menu Offered Id']) }}
            {!! $errors->first('menu_offered_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>