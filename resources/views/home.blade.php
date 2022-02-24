@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Cars List') }}</div>

                <div class="card-body">
                    <a href="{{ route('vehicle.create') }}" class="btn btn-primary mb-2">Add New Car</a>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table table-hover">
                            <thead>
                                <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Model</th>
                                <th scope="col">Price</th>
                                <th scope="col">Comapny</th>
                                <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($vehicles as $vehicle)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $vehicle->name }}</td>
                                    <td>{{ $vehicle->model }}</td>
                                    <td>{{ number_format($vehicle->price,2) }}</td>
                                    <td>{{ substr($vehicle->company->name,0,15) }}</td>
                                    <td>
                                        <a href="{{ route('vehicle.show', ['id' => $vehicle->id]) }}" class="btn btn-info">VIEW</a>
                                        @if(Auth::user()->is_admin)
                                            <a href="{{ route('vehicle.edit', ['id' => $vehicle->id]) }}" class="btn btn-primary">EDIT</a>
                                            <a onclick="return confirm('Are you sure?')" href="{{ route('vehicle.delete', ['id' => $vehicle->id]) }}" class="btn btn-danger">DELETE</a>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div style="margin-left: 345px">{{ $vehicles->links(); }}</div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
