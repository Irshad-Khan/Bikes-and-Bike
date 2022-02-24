@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Companies List') }}</div>

                <div class="card-body">
                    <a href="{{ route('company.create') }}" class="btn btn-primary mb-2">Add New Company</a>
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
                                <th scope="col">address</th>
                                <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($companies as $company)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $company->name }}</td>
                                    <td>{{ $company->address }}</td>
                                    <td>
                                        <a href="{{ route('company.show', ['id' => $company->id]) }}" class="btn btn-info">VIEW</a>
                                        <a href="{{ route('company.edit', ['id' => $company->id]) }}" class="btn btn-primary">EDIT</a>
                                        <a onclick="return confirm('Are you sure?')" href="{{ route('company.delete', ['id' => $company->id]) }}" class="btn btn-danger">DELETE</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div style="margin-left: 345px">{{ $companies->links(); }}</div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
