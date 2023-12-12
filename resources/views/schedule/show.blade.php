@extends('layouts.app')

@section('template_title')
    {{ $schedule->name ?? "{{ __('Show') Schedule" }}
@endsection

@section('content')
    <section class="content container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Schedule</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('schedules.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Opening Time:</strong>
                            {{ $schedule->opening_time }}
                        </div>
                        <div class="form-group">
                            <strong>Closing Time:</strong>
                            {{ $schedule->closing_time }}
                        </div>
                        <div class="form-group">
                            <strong>Description:</strong>
                            {{ $schedule->description }}
                        </div>
                        <div class="form-group">
                            <strong>Status:</strong>
                            {{ $schedule->status }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
