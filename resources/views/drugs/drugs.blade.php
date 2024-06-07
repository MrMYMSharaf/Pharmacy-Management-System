@extends('layouts.default')

@section('content')

<div class="col-lg-9 mt-3">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-center mb-0">Drug List</h2>
        <a href="{{ route('drugs.create') }}" class="btn btn-success">Create</a>
    </div>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Quantity</th>
                <th scope="col">Expiration Date</th>
                <th scope="col">Price</th>
                <th scope="col" class="text-right">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($drugs as $drug)
                <tr>
                    <th scope="row" class="align-middle">{{ $drug->id }}</th>
                    <td>{{ $drug->name }}</td>
                    <td>{{ $drug->quantity }}</td>
                    <td>{{ $drug->expiry_date }}</td>
                    <td>{{ $drug->price }}</td>
                    <td class="text-right">
                        <div class="d-flex justify-content-end">
                            <a class="btn btn-info btn-sm mr-2" href="{{ route('drugs.show', $drug->id) }}">View</a>
                            <a class="btn btn-warning btn-sm mr-2" href="{{ route('drugs.edit', $drug->id) }}">Edit</a>
                            <a class="btn btn-danger btn-sm mr-2" href="{{ route('drugs.delete', $drug->id) }}">Delete</a>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
