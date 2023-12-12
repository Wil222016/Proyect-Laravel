@extends('layouts.app')

@section('template_title')
Dish Offered Menu
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title">
                            {{ __('Dish Offered Menu') }}
                        </span>

                        <div class="float-right">
                            <a href="{{ route('dish_offered_menus.create') }}" class="btn btn-primary btn-sm float-right" data-placement="left">
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

                                    <th>Dish Id</th>
                                    <th>Menu Offered Id</th>

                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dishOfferedMenus as $dishOfferedMenu)
                                <tr>
                                    <td>{{ ++$i }}</td>

                                    <td>{{ $dishOfferedMenu->dish_id }}</td>
                                    <td>{{ $dishOfferedMenu->menu_offered_id }}</td>

                                    <td>
                                        <form action="{{ route('dish-offered-menus.destroy', ['dish_offered_menu' => $dishOfferedMenu->id]) }}" method="POST">

                                            <a class="btn btn-sm btn-primary " href="{{ route('dish-offered-menus.show',$dishOfferedMenu->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                            <a class="btn btn-sm btn-success" href="{{ route('dish-offered-menus.edit',$dishOfferedMenu->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
            {!! $dishOfferedMenus->links() !!}
        </div>
    </div>
</div>
@endsection