@extends('layouts.app')

@section('template_title')
    {{ $offeredMenu->name ?? "{{ __('Show') Offered Menu" }}
@endsection

@section('content')
    <section class="content container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Offered Menu</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('offered_menus.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Price:</strong>
                            {{ $offeredMenu->price }}
                        </div>
                        <div class="form-group">
                            <strong>Date:</strong>
                            {{ $offeredMenu->date }}
                        </div>
                        <div class="form-group">
                            <strong>Photo:</strong>
                            {{ $offeredMenu->photo }}
                        </div>
                        <div class="form-group">
                            <strong>Status:</strong>
                            {{ $offeredMenu->status }}
                        </div>
                        <div class="form-group">
                            <strong>Semester Id:</strong>
                            {{ $offeredMenu->semester_id }}
                        </div>
                        <div class="form-group">
                            <strong>Type Menu Id:</strong>
                            {{ $offeredMenu->type_menu_id }}
                        </div>
                        <div class="form-group">
                            <strong>Schedule Id:</strong>
                            {{ $offeredMenu->schedule_id }}
                        </div>
                        <div class="form-group">
                            <strong>Category Id:</strong>
                            {{ $offeredMenu->category_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
