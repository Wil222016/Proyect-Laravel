@extends('layouts.app')

@section('template_title')
    Reservation
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Reservation') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('reservations.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
										<th>Num People</th>
										<th>Total Amount</th>
										<th>Receipt</th>
										<th>Status</th>
										<th>Client Id</th>
										<th>Person Id</th>
										<th>Menu Offered Id</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($reservations as $reservation)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $reservation->date }}</td>
											<td>{{ $reservation->num_people }}</td>
											<td>{{ $reservation->total_amount }}</td>
											<td>{{ $reservation->receipt }}</td>
											<td>{{ $reservation->status }}</td>
											<td>{{ $reservation->client_id }}</td>
											<td>{{ $reservation->person_id }}</td>
											<td>{{ $reservation->menu_offered_id }}</td>

                                            <td>
                                                <form action="{{ route('reservations.destroy',$reservation->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('reservations.show',$reservation->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('reservations.edit',$reservation->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
                {!! $reservations->links() !!}
            </div>
        </div>
    </div>
@endsection
