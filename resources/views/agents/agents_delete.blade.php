@extends('layouts.default')

@section('content')
<div class="col-lg-9 mt-3">
    <h2 class="text-center mb-4">Delete Agent</h2>
    <form action="{{ route('agents.destroy', $agent->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <div class="form-group">
            <label for="agent-name">Name</label>
            <input type="text" class="form-control" id="agent-name" value="{{ $agent->name }}" readonly>
        </div>
        <div class="form-group">
            <label for="company-name">Company Name</label>
            <input type="text" class="form-control" id="company-name" value="{{ $agent->company_name }}" readonly>
        </div>
        <div class="form-group">
            <label for="contact-number">Contact Number</label>
            <input type="text" class="form-control" id="contact-number" value="{{ $agent->phone }}" readonly>
        </div>
        <div class="form-group">
            <label for="email-address">Email Address</label>
            <input type="email" class="form-control" id="email-address" value="{{ $agent->email }}" readonly>
        </div>
        <div class="form-group">
            <label for="agent-image">Image</label>
            @if($agent->image)
                <img src="{{ asset('images/' . $agent->image) }}" alt="Agent Image" style="height: 100px; width: 100px;">
            @else
                <p>No image available</p>
            @endif
        </div>
        <button type="submit" class="btn btn-danger">Delete</button>
        <a href="{{ route('agents.index') }}" class="btn btn-info">Back</a>
    </form>
</div>
@endsection
