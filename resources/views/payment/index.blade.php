@extends('layouts.app')

@section('template_title')
    Payment
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Payment') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('payments.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
										<th>Amount</th>
										<th>Payment Method</th>
										<th>Receipt</th>
										<th>Status</th>
										<th>Reservation Id</th>
										<th>Entry Register Id</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($payments as $payment)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $payment->amount }}</td>
											<td>{{ $payment->payment_method }}</td>
											<td>{{ $payment->receipt }}</td>
											<td>{{ $payment->status }}</td>
											<td>{{ $payment->reservation_id }}</td>
											<td>{{ $payment->entry_register_id }}</td>

                                            <td>
                                                <form action="{{ route('payments.destroy',$payment->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('payments.show',$payment->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('payments.edit',$payment->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
                {!! $payments->links() !!}
            </div>
        </div>
    </div>
@endsection
