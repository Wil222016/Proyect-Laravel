@extends('layouts.app')

@section('template_title')
    {{ $entryRegister->name ?? "{{ __('Show') Entry Register" }}
@endsection

@section('content')
    <section class="content container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Entry Register</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('entry_registers.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Date:</strong>
                            {{ $entryRegister->date }}
                        </div>
                        <div class="form-group">
                            <strong>Quantity:</strong>
                            {{ $entryRegister->quantity }}
                        </div>
                        <div class="form-group">
                            <strong>Total:</strong>
                            {{ $entryRegister->total }}
                        </div>
                        <div class="form-group">
                            <strong>Status:</strong>
                            {{ $entryRegister->status }}
                        </div>
                        <div class="form-group">
                            <strong>Employee Id:</strong>
                            {{ $entryRegister->employee_id }}
                        </div>
                        <div class="form-group">
                            <strong>Menu Offered Id:</strong>
                            {{ $entryRegister->menu_offered_id }}
                        </div>
                        <div class="form-group">
                            <strong>Reservation Id:</strong>
                            {{ $entryRegister->reservation_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
