@extends('layouts.app')

@section('template_title')
    {{ $semester->name ?? "{{ __('Show') Semester" }}
@endsection

@section('content')
    <section class="content container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Semester</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('semesters.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Management:</strong>
                            {{ $semester->management }}
                        </div>
                        <div class="form-group">
                            <strong>Startdate:</strong>
                            {{ $semester->startDate }}
                        </div>
                        <div class="form-group">
                            <strong>Enddate:</strong>
                            {{ $semester->endDate }}
                        </div>
                        <div class="form-group">
                            <strong>Status:</strong>
                            {{ $semester->status }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
