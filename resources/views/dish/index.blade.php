@extends('layouts.app')

@section('template_title')
Dish
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title">
                            {{ __('Dish') }}
                        </span>

                        <div class="float-right">
                            <a href="{{ route('dishes.create') }}" class="btn btn-primary btn-sm float-right" data-placement="left">
                                {{ __('Create New') }}
                            </a>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="statusToggle" onclick="filterByStatus()" {{ $status == 'A' ? '' : 'checked' }}>
                                <label class="form-check-label" for="statusToggle">Mostrar solo inactivos</label>
                            </div>
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

                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Type Dish Id</th>
                                    <th>Menu Offered Id</th>

                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dishes as $dish)
                                <tr>
                                    <td>{{ ++$i }}</td>

                                    <td>{{ $dish->name }}</td>
                                    <td>{{ $dish->description }}</td>
                                    <td>{{ $dish->status }}</td>
                                    <td>{{ $dish->type_dish_id }}</td>
                                    <td>{{ $dish->menu_offered_id }}</td>

                                    <td>
                                        <form action="{{ route('dishes.destroy',$dish->id) }}" method="POST">
                                            <a class="btn btn-sm btn-primary " href="{{ route('dishes.show',$dish->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                            <a class="btn btn-sm btn-success" href="{{ route('dishes.edit',$dish->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
            {!! $dishes->links() !!}
        </div>
    </div>
</div>
<script>

    function filterByStatus() {
        var status = document.getElementById('statusToggle').checked ? 'I' : 'A';
        // Guarda el estado en el almacenamiento local
        localStorage.setItem('status', status);
        window.location.href = "{{ route('dishes.index') }}?status=" + status;
    }
</script>


@endsection