@extends('layouts.app')

@section('template_title')
    {{ $reservation->name ?? "{{ __('Show') Reservation" }}
@endsection

@section('content')
    <section class="content container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Reservation</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('reservations.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Date:</strong>
                            {{ $reservation->date }}
                        </div>
                        <div class="form-group">
                            <strong>Num People:</strong>
                            {{ $reservation->num_people }}
                        </div>
                        <div class="form-group">
                            <strong>Total Amount:</strong>
                            {{ $reservation->total_amount }}
                        </div>
                        <div class="form-group">
                            <strong>Receipt:</strong>
                            {{ $reservation->receipt }}
                        </div>
                        <div class="form-group">
                            <strong>Status:</strong>
                            {{ $reservation->status }}
                        </div>
                        <div class="form-group">
                            <strong>Client Id:</strong>
                            {{ $reservation->client_id }}
                        </div>
                        <div class="form-group">
                            <strong>Person Id:</strong>
                            {{ $reservation->person_id }}
                        </div>
                        <div class="form-group">
                            <strong>Menu Offered Id:</strong>
                            {{ $reservation->menu_offered_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
