@extends('layouts.app')

@section('template_title')
    Semester
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Semester') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('semesters.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
										<th>Management</th>
										<th>Startdate</th>
										<th>Enddate</th>
										<th>Status</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($semesters as $semester)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $semester->management }}</td>
											<td>{{ $semester->startDate }}</td>
											<td>{{ $semester->endDate }}</td>
											<td>{{ $semester->status }}</td>

                                            <td>
                                                <form action="{{ route('semesters.destroy',$semester->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('semesters.show',$semester->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('semesters.edit',$semester->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
                {!! $semesters->links() !!}
            </div>
        </div>
    </div>
@endsection
