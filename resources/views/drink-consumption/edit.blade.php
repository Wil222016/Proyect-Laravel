@extends('layouts.app')

@section('template_title')
    {{ __('Update') }} Drink Consumption
@endsection

@section('content')
    <section class="content container">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Update') }} Drink Consumption</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('drink_consumptions.update', $drinkConsumption->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('drink-consumption.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
