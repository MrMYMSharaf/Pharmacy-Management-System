@extends('layouts.default')

@section('content')
<div class="col-lg-9 mt-3">
    <h2 class="text-center mb-4">Drug View</h2>
    <div class="drug-details card p-4 mb-4">
        <h4>Drug Details</h4>
        <div class="row">
            <div class="col-md-6">
                <p><strong>Name:</strong> {{ $drug->name }}</p>
                <p><strong>Description:</strong> {{ $drug->description }}</p>
                <p><strong>Quantity:</strong> {{ $drug->quantity }}</p>
            </div>
            <div class="col-md-6">
                <p><strong>Agent:</strong> <a href="{{ route('agents.show', $drug->agent->id) }}">{{ $drug->agent->name }}</a></p>
                <p><strong>Expiration Date:</strong> {{ $drug->expiry_date }}</p>
                <p><strong>Price:</strong> ${{ $drug->price }}</p>
                <p><strong>Discount:</strong> {{ $drug->discount }}%</p>
                <p><strong>Actual Price:</strong> ${{ $drug->actual_price }}</p>
            </div>
        </div>
        <div class="mt-3">
            <a class="btn btn-primary" href="{{ route('drugs.index') }}">Back</a>
        </div>
    </div>
</div>
@endsection
