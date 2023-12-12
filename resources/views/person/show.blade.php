@extends('layouts.app')

@section('template_title')
    {{ $person->name ?? "{{ __('Show') Person" }}
@endsection

@section('content')
    <section class="content container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Person</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('people.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Full Name:</strong>
                            {{ $person->full_name }}
                        </div>
                        <div class="form-group">
                            <strong>Ci:</strong>
                            {{ $person->ci }}
                        </div>
                        <div class="form-group">
                            <strong>Email:</strong>
                            {{ $person->email }}
                        </div>
                        <div class="form-group">
                            <strong>Phone:</strong>
                            {{ $person->phone }}
                        </div>
                        <div class="form-group">
                            <strong>Status:</strong>
                            {{ $person->status }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
