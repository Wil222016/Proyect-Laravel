@extends('layouts.app')

@section('template_title')
    Entry Register
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Entry Register') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('entry_registers.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
										<th>Date</th>
										<th>Quantity</th>
										<th>Total</th>
										<th>Status</th>
										<th>Employee Id</th>
										<th>Menu Offered Id</th>
										<th>Reservation Id</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($entryRegisters as $entryRegister)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $entryRegister->date }}</td>
											<td>{{ $entryRegister->quantity }}</td>
											<td>{{ $entryRegister->total }}</td>
											<td>{{ $entryRegister->status }}</td>
											<td>{{ $entryRegister->employee_id }}</td>
											<td>{{ $entryRegister->menu_offered_id }}</td>
											<td>{{ $entryRegister->reservation_id }}</td>

                                            <td>
                                                <form action="{{ route('entry_registers.destroy',$entryRegister->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('entry_registers.show',$entryRegister->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('entry_registers.edit',$entryRegister->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
                {!! $entryRegisters->links() !!}
            </div>
        </div>
    </div>
@endsection
