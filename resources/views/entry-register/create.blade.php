@extends('layouts.app')

@section('template_title')
    {{ __('Create') }} Entry Register
@endsection

@section('content')
    <section class="content container">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Create') }} Entry Register</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('entry_registers.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('entry-register.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
