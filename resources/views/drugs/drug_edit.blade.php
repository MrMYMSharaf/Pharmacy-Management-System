@extends('layouts.default')

@section('content')

<div class="col-lg-9 mt-3">
    <h2 class="text-center mb-4">Edit Drug</h2>
    <form id="edit-drug-form" action="{{ route('drugs.update', $drug->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="drug-name">Name</label>
            <input type="text" class="form-control" id="drug-name" name="name" value="{{ $drug->name }}" placeholder="Enter name">
        </div>
        <div class="form-group">
            <label for="drug-description">Description</label>
            <textarea class="form-control" id="drug-description" name="description" rows="3" placeholder="Enter description">{{ $drug->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="drug-quantity">Quantity</label>
            <input type="number" class="form-control" id="drug-quantity" name="quantity" value="{{ $drug->quantity }}" placeholder="Enter quantity">
        </div>
        <div class="form-group">
            <label for="drug-agent-id">Agent</label>
            <select class="form-control" id="drug-agent-id" name="agent_id">
                @foreach($agents as $agent)
                    <option value="{{ $agent->id }}" {{ $drug->agent_id == $agent->id ? 'selected' : '' }}>{{ $agent->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="drug-expiry-date">Expiration Date</label>
            <input type="date" class="form-control" id="drug-expiry-date" name="expiry_date" value="{{ $drug->expiry_date }}">
        </div>
        <div class="form-group">
            <label for="drug-price">Price</label>
            <input type="number" class="form-control" id="drug-price" name="price" value="{{ $drug->price }}" placeholder="Enter price">
        </div>
        <div class="form-group">
            <label for="drug-discount">Discount Percentage</label>
            <input type="number" class="form-control" id="drug-discount" name="discount" value="{{ $drug->discount }}" placeholder="Enter discount percentage">
        </div>
        <div class="form-group">
            <label for="drug-actual-price">Actual Price</label>
            <input type="number" class="form-control" id="drug-actual-price" name="actual_price" value="{{ $drug->actual_price }}" placeholder="Enter actual price">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a type="button" class="btn btn-info" href="{{ route('drugs.index') }}">Back</a>
    </form>
</div>

@endsection
