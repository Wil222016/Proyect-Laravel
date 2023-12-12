@extends('layouts.app')

@section('template_title')
    Drink Consumption
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Drink Consumption') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('drink_consumptions.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
										<th>Quantity</th>
										<th>Unit Price</th>
										<th>Entry Register Id</th>
										<th>Drink Id</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($drinkConsumptions as $drinkConsumption)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $drinkConsumption->quantity }}</td>
											<td>{{ $drinkConsumption->unit_price }}</td>
											<td>{{ $drinkConsumption->entry_register_id }}</td>
											<td>{{ $drinkConsumption->drink_id }}</td>

                                            <td>
                                                <form action="{{ route('drink_consumptions.destroy',$drinkConsumption->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('drink_consumptions.show',$drinkConsumption->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('drink_consumptions.edit',$drinkConsumption->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
                {!! $drinkConsumptions->links() !!}
            </div>
        </div>
    </div>
@endsection
