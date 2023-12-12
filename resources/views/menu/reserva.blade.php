@extends('layouts.app')

@section('template_title')
    {{ __('Create Reservation') }}
@endsection

@section('content')
    <section class="content container">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Create Reservation') }}</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('reservations.store') }}" role="form" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                {{ Form::label('date', __('Date')) }}
                                {{ Form::datetimeLocal('date', now()->format('Y-m-d\TH:i'), ['class' => 'form-control' . ($errors->has('date') ? ' is-invalid' : ''), 'readonly']) }}
                                {!! $errors->first('date', '<div class="invalid-feedback">:message</div>') !!}
                            </div>

                            <div class="form-group">
                                {{ Form::label('num_people', __('Number of People')) }}
                                {{ Form::number('num_people', old('num_people'), ['class' => 'form-control' . ($errors->has('num_people') ? ' is-invalid' : ''), 'placeholder' => __('Number of People'), 'required', 'id' => 'num_people']) }}
                                {!! $errors->first('num_people', '<div class="invalid-feedback">:message</div>') !!}
                            </div>

                            <div class="form-group">
                                {{ Form::label('total_amount', __('Total Amount')) }}
                                {{ Form::text('total_amount', old('total_amount', 0), ['class' => 'form-control' . ($errors->has('total_amount') ? ' is-invalid' : ''), 'readonly', 'required', 'id' => 'total_amount']) }}
                                {!! $errors->first('total_amount', '<div class="invalid-feedback">:message</div>') !!}
                            </div>

                            <div class="form-group">
                                {{ Form::label('receipt', __('Receipt')) }}
                                {{ Form::text('receipt', old('receipt'), ['class' => 'form-control' . ($errors->has('receipt') ? ' is-invalid' : ''), 'placeholder' => __('Receipt')]) }}
                                {!! $errors->first('receipt', '<div class="invalid-feedback">:message</div>') !!}
                            </div>

                            <div class="form-group">
                                {{ Form::label('status', __('Status')) }}
                                {{ Form::text('status', 'Pending', ['class' => 'form-control' . ($errors->has('status') ? ' is-invalid' : ''), 'readonly', 'required']) }}
                                {!! $errors->first('status', '<div class="invalid-feedback">:message</div>') !!}
                            </div>

                            <div class="form-group">
                                {{ Form::label('client_id', __('Client ID')) }}
                                {{ Form::number('client_id', old('client_id'), ['class' => 'form-control' . ($errors->has('client_id') ? ' is-invalid' : ''), 'placeholder' => __('Client ID'), 'required']) }}
                                {!! $errors->first('client_id', '<div class="invalid-feedback">:message</div>') !!}
                            </div>

                            <div class="form-group">
                                {{ Form::label('person_id', __('Person ID')) }}
                                {{ Form::number('person_id', old('person_id'), ['class' => 'form-control' . ($errors->has('person_id') ? ' is-invalid' : ''), 'placeholder' => __('Person ID'), 'required']) }}
                                {!! $errors->first('person_id', '<div class="invalid-feedback">:message</div>') !!}
                            </div>

                            <div class="form-group">
                                {{ Form::label('menu_offered_id', __('Menu Offered ID')) }}
                                {{ Form::number('menu_offered_id', old('menu_offered_id'), ['class' => 'form-control' . ($errors->has('menu_offered_id') ? ' is-invalid' : ''), 'placeholder' => __('Menu Offered ID'), 'required']) }}
                                {!! $errors->first('menu_offered_id', '<div class="invalid-feedback">:message</div>') !!}
                            </div>

                            <button type="submit" class="btn btn-primary">{{ __('Create Reservation') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        // Manejar el evento 'input' del campo num_people para actualizar el total_amount
        document.getElementById('num_people').addEventListener('input', function () {
            var numPeople = this.value;
            
            // Validar que no sea negativo ni más de 10
            numPeople = Math.min(Math.max(numPeople, 0), 10);
            
            var totalAmount = numPeople * 60;
            
            // Actualizar el valor del campo total_amount
            document.getElementById('total_amount').value = totalAmount.toFixed(2);
        });
    </script>
@endsection
