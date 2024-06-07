@extends('layouts.default')

@section('content')
<div class="col-lg-9 mt-3">
    <h2 class="text-center mb-4">Edit Agent</h2>
    <form action="{{ route('agents.update', $agent->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="agent-name">Name</label>
            <input type="text" class="form-control" id="agent-name" name="name" value="{{ $agent->name }}" required>
        </div>
        <div class="form-group">
            <label for="agent-company">Company Name</label>
            <input type="text" class="form-control" id="agent-company" name="company_name" value="{{ $agent->company_name }}" required>
        </div>
        <div class="form-group">
            <label for="agent-contact">Contact Number</label>
            <input type="text" class="form-control" id="agent-contact" name="phone" value="{{ $agent->phone }}">
        </div>
        <div class="form-group">
            <label for="agent-email">Email Address</label>
            <input type="email" class="form-control" id="agent-email" name="email" value="{{ $agent->email }}" required>
        </div>
        <div class="form-group">
            <label for="agent-image">Image</label>
            <input type="file" class="form-control-file" id="agent-image" name="image">
            @if ($agent->image)
                <img src="{{ asset('images/' . $agent->image) }}" alt="Agent Image" style="height: 100px; width: 100px;">
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('agents.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
