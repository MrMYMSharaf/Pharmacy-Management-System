@extends('layouts.default')

@section('content')
<div class="col-lg-9 mt-3">
    <h2 class="text-center mb-4">Agent Details</h2>
    <div class="card mx-auto" style="max-width: 500px;">
        @if ($agent->image)
            <img src="{{ asset('images/' . $agent->image) }}" class="card-img-top" alt="Agent Image">
        @else
            <img src="/img/default-image.jpg" class="card-img-top" alt="Default Image">
        @endif
        <div class="card-body">
            <h5 class="card-title">{{ $agent->name }}</h5>
            <p class="card-text">Company Name: {{ $agent->company_name }}</p>
            <p class="card-text">Contact Number: {{ $agent->phone }}</p>
            <p class="card-text">Email Address: {{ $agent->email }}</p>
            <a href="{{ route('agents.index') }}" class="btn btn-primary">Back</a>
        </div>
    </div>
</div>
@endsection
