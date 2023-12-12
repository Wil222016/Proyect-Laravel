@extends('layouts.app')

@section('template_title')
    {{ $typeMenu->name ?? "{{ __('Show') Type Menu" }}
@endsection

@section('content')
    <section class="content container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Type Menu</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('type_menus.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $typeMenu->name }}
                        </div>
                        <div class="form-group">
                            <strong>Status:</strong>
                            {{ $typeMenu->status }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
