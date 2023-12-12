@extends('layouts.app')

@section('template_title')
    {{ __('Create') }} Administrator
@endsection

@section('content')
    <section class="content container">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Create') }} Administrator</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('administrators.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('administrator.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
