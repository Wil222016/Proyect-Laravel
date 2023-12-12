@extends('layouts.app')

@section('template_title')
    {{ $dish->name ?? "{{ __('Show') Dish" }}
@endsection

@section('content')
    <section class="content container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Dish</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('dishes.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $dish->name }}
                        </div>
                        <div class="form-group">
                            <strong>Description:</strong>
                            {{ $dish->description }}
                        </div>
                        <div class="form-group">
                            <strong>Status:</strong>
                            {{ $dish->status }}
                        </div>
                        <div class="form-group">
                            <strong>Type Dish Id:</strong>
                            {{ $dish->type_dish_id }}
                        </div>
                        <div class="form-group">
                            <strong>Menu Offered Id:</strong>
                            {{ $dish->menu_offered_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
