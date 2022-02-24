@extends('layouts.app')

@section('content')
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><a href="{{ route('home') }}">Car List</a> | {{ __('Add Car') }}</div>

                <div class="card-body">
                    <form action="{{ route('vehicle.store') }}"
                        method="POST"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="form-group mb-2">
                            <label for="name">Name</label>
                            <input type="text"
                                class="form-control"
                                id="name"
                                name="name"
                                placeholder="Enter car name"
                                value="{{ old('name') }}">
                                @error('name')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                        </div>
                         <div class="form-group mb-2">
                            <label for="model">Model</label>
                            <input type="text"
                                class="form-control"
                                id="model"
                                name="model"
                                placeholder="Enter car model"
                                value="{{ old('model') }}">
                                @error('model')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                        </div>
                        <div class="form-group mb-2">
                            <label for="price">Price</label>
                            <input type="number"
                                class="form-control"
                                id="price"
                                name="price"
                                placeholder="Enter car price"
                                value="{{ old('price') }}">
                                @error('price')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                        </div>

                        <div class="form-group mb-2">
                            <label for="company">Select Company</label>
                            <Select class="form-control" name="company_id">
                                <option value="">Select Company</option>
                                @foreach ($companies as $company)
                                    <option
                                        value="{{ $company->id }}"
                                    >{{ $company->name }}</option>
                                @endforeach
                            </Select>
                            @error('company_id')
                                    <div class="error">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-2">
                            <label for="image">Car Image</label>
                            <input type="file"
                                class="form-control"
                                name="image">
                             @error('image')
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
