@extends('layouts.app')

@section('template_title')
    {{ $dishOfferedMenu->name ?? "{{ __('Show') Dish Offered Menu" }}
@endsection

@section('content')
    <section class="content container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Dish Offered Menu</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('dish_offered_menus.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Dish Id:</strong>
                            {{ $dishOfferedMenu->dish_id }}
                        </div>
                        <div class="form-group">
                            <strong>Menu Offered Id:</strong>
                            {{ $dishOfferedMenu->menu_offered_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
