<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('amount') }}
            {{ Form::text('amount', $payment->amount, ['class' => 'form-control' . ($errors->has('amount') ? ' is-invalid' : ''), 'placeholder' => 'Amount']) }}
            {!! $errors->first('amount', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('payment_method') }}
            {{ Form::text('payment_method', $payment->payment_method, ['class' => 'form-control' . ($errors->has('payment_method') ? ' is-invalid' : ''), 'placeholder' => 'Payment Method']) }}
            {!! $errors->first('payment_method', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('receipt') }}
            {{ Form::text('receipt', $payment->receipt, ['class' => 'form-control' . ($errors->has('receipt') ? ' is-invalid' : ''), 'placeholder' => 'Receipt']) }}
            {!! $errors->first('receipt', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('status') }}
            {{ Form::text('status', $payment->status, ['class' => 'form-control' . ($errors->has('status') ? ' is-invalid' : ''), 'placeholder' => 'Status']) }}
            {!! $errors->first('status', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('reservation_id') }}
            {{ Form::text('reservation_id', $payment->reservation_id, ['class' => 'form-control' . ($errors->has('reservation_id') ? ' is-invalid' : ''), 'placeholder' => 'Reservation Id']) }}
            {!! $errors->first('reservation_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('entry_register_id') }}
            {{ Form::text('entry_register_id', $payment->entry_register_id, ['class' => 'form-control' . ($errors->has('entry_register_id') ? ' is-invalid' : ''), 'placeholder' => 'Entry Register Id']) }}
            {!! $errors->first('entry_register_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>