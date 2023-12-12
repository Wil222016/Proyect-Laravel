@extends('layouts.app')

@section('template_title')
    {{ __('Update') }} Dish Offered Menu
@endsection

@section('content')
    <section class="content container">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Update') }} Dish Offered Menu</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('dish_offered_menus.update', $dishOfferedMenu->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('dish-offered-menu.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
