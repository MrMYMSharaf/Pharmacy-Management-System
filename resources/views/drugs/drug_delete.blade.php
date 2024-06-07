@extends('layouts.default')

@section('content')

<div class="col-lg-9 mt-3">
    <h2 class="text-center mb-4">Delete Drug</h2>
    <form action="{{ route('drugs.destroy', $drug->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <div class="form-group">
            <label for="drug-name">Name</label>
            <input type="text" class="form-control" id="drug-name" value="{{ $drug->name }}" readonly>
        </div>
        <div class="form-group">
            <label for="drug-description">Description</label>
            <textarea class="form-control" id="drug-description" rows="3" readonly>{{ $drug->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="drug-quantity">Quantity</label>
            <input type="number" class="form-control" id="drug-quantity" value="{{ $drug->quantity }}" readonly>
        </div>
        <div class="form-group">
            <label for="drug-agent-id">Agent ID</label>
            <input type="text" class="form-control" id="drug-agent-id" value="{{ $drug->agent_id }}" readonly>
        </div>
        <div class="form-group">
            <label for="drug-expiration-date">Expiration Date</label>
            <input type="date" class="form-control" id="drug-expiration-date" value="{{ $drug->expiry_date }}" readonly>
        </div>
        <div class="form-group">
            <label for="drug-price">Price</label>
            <input type="number" class="form-control" id="drug-price" value="{{ $drug->price }}" readonly>
        </div>
        <div class="form-group">
            <label for="drug-discount-percentage">Discount Percentage</label>
            <input type="number" class="form-control" id="drug-discount-percentage" value="{{ $drug->discount }}" readonly>
        </div>
        <button type="submit" class="btn btn-danger">Delete</button>
        <a type="button" class="btn btn-info" href="{{ route('drugs.index') }}">Back</a>
    </form>
</div>

@endsection
