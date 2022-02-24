@extends('layouts.app')

@section('content')
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><a href="{{ route('company.index') }}">Companies List</a> | {{ __('Show Company') }}</div>

                <div class="card-body">

                        <div class="form-group mb-2">
                            <label for="name">Name</label>
                            <input type="text"
                                class="form-control"
                                id="name"
                                name="name"
                                placeholder="Enter car name"
                                value="{{ old('name', $company->name) }}"
                                readonly style="background: white">
                                @error('name')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                        </div>
                         <div class="form-group mb-2">
                            <label for="address">Address</label>
                            <textarea
                                rows="5"
                                class="form-control"
                                id="address"
                                name="address"
                                placeholder="Enter address"
                                readonly style="background: white">{{ old('address', $company->address) }}</textarea>
                                @error('address')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                        </div>

                    <h3>Company Cars</h3>
                    <table class="table table-hover">
                            <thead>
                                <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Model</th>
                                <th scope="col">Price</th>
                                <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($company->vehicles as $vehicle)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $vehicle->name }}</td>
                                    <td>{{ $vehicle->model }}</td>
                                    <td>{{ number_format($vehicle->price,2) }}</td>
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

                </div>

            </div>
        </div>
    </div>
</div>
@stop
