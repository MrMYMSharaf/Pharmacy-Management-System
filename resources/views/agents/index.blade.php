@extends('layouts.default')

@section('content')
<div class="col-lg-9 mt-3">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-center mb-0">Agents List</h2>
        <a href="{{ route('agents.create') }}" class="btn btn-success">Create</a>
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
                <th scope="col">Image</th>
                <th scope="col">Name</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($agents as $agent)
                <tr>
                    <th scope="row" class="align-middle">{{ $agent->id }}</th>
                    <td class="align-middle">
                        @if ($agent->image)
                            <img src="{{ asset('images/' . $agent->image) }}" alt="Agent Image" style="height: 100px; width: 100px;">
                        @else
                            No Image
                        @endif
                    </td>
                    <td class="align-middle">{{ $agent->name }}</td>
                    <td class="align-middle">
                        <div class="flex">
                            <a class="btn btn-info btn-sm" href="{{ route('agents.show', $agent->id) }}">View</a>
                            <a class="btn btn-warning btn-sm" href="{{ route('agents.edit', $agent->id) }}">Edit</a>
                            <a class="btn btn-danger btn-sm" href="{{ route('agents.delete', $agent->id) }}">Delete</a>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
