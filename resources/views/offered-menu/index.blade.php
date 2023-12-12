@extends('layouts.app')

@section('template_title')
Offered Menu
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title">
                            {{ __('Offered Menu') }}
                        </span>

                        <div class="float-right">
                            <a href="{{ route('offered_menus.create') }}" class="btn btn-primary btn-sm float-right" data-placement="left">
                                {{ __('Create New') }}
                            </a>
                        </div>
                    </div>
                </div>
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
                @endif

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="thead">
                                <tr>
                                    <th>No</th>

                                    <th>Price</th>
                                    <th>Date</th>
                                    <th>Photo</th>
                                    <th>Status</th>
                                    <th>Semester Id</th>
                                    <th>Type Menu Id</th>
                                    <th>Schedule Id</th>
                                    <th>Category Id</th>

                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($offeredMenus as $offeredMenu)
                                <tr>
                                    <td>{{ ++$i }}</td>

                                    <td>{{ $offeredMenu->price }}</td>
                                    <td>{{ $offeredMenu->date }}</td>
                                    <td>
                                        @if ($offeredMenu->photo)
                                        <img src="{{ asset('storage/' . $offeredMenu->photo) }}" alt="Menu Photo" style="max-width: 100px; max-height: 100px;">
                                        @else
                                        No Image
                                        @endif
                                    </td>
                                    <td>{{ $offeredMenu->status }}</td>
                                    <td>{{ $offeredMenu->semester_id }}</td>
                                    <td>{{ $offeredMenu->type_menu_id }}</td>
                                    <td>{{ $offeredMenu->schedule_id }}</td>
                                    <td>{{ $offeredMenu->category_id }}</td>

                                    <td>
                                        <form action="{{ route('offered_menus.destroy',$offeredMenu->id) }}" method="POST">
                                            <a class="btn btn-sm btn-primary " href="{{ route('offered_menus.show',$offeredMenu->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                            <a class="btn btn-sm btn-success" href="{{ route('offered_menus.edit',$offeredMenu->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {!! $offeredMenus->links() !!}
        </div>
    </div>
</div>
@endsection