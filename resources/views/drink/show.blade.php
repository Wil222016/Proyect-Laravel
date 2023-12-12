@extends('layouts.app')

@section('template_title')
    {{ $drink->name ?? "{{ __('Show') Drink" }}
@endsection

@section('content')
    <section class="content container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Drink</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('drinks.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $drink->name }}
                        </div>
                        <div class="form-group">
                            <strong>Price:</strong>
                            {{ $drink->price }}
                        </div>
                        <div class="form-group">
                            <strong>Description:</strong>
                            {{ $drink->description }}
                        </div>
                        <div class="form-group">
                            <strong>Photo:</strong>
                            {{ $drink->photo }}
                        </div>
                        <div class="form-group">
                            <strong>Status:</strong>
                            {{ $drink->status }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
