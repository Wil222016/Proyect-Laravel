@extends('layouts.app')

@section('template_title')
    {{ $drinkConsumption->name ?? "{{ __('Show') Drink Consumption" }}
@endsection

@section('content')
    <section class="content container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Drink Consumption</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('drink_consumptions.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Quantity:</strong>
                            {{ $drinkConsumption->quantity }}
                        </div>
                        <div class="form-group">
                            <strong>Unit Price:</strong>
                            {{ $drinkConsumption->unit_price }}
                        </div>
                        <div class="form-group">
                            <strong>Entry Register Id:</strong>
                            {{ $drinkConsumption->entry_register_id }}
                        </div>
                        <div class="form-group">
                            <strong>Drink Id:</strong>
                            {{ $drinkConsumption->drink_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
