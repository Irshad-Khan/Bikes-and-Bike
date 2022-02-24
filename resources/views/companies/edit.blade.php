@extends('layouts.app')

@section('content')
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><a href="{{ route('company.index') }}">Companies List</a> | {{ __('Update Company') }}</div>

                <div class="card-body">
                    <form action="{{ route('company.update') }}"
                        method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $company->id }}">
                        <div class="form-group mb-2">
                            <label for="name">Name</label>
                            <input type="text"
                                class="form-control"
                                id="name"
                                name="name"
                                placeholder="Enter car name"
                                value="{{ old('name', $company->name) }}">
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
                                placeholder="Enter address">{{ old('address', $company->address) }}</textarea>
                                @error('address')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
@stop
