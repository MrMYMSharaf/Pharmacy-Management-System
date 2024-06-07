@extends('layouts.default')

@section('content')
<div class="col-lg-9 mt-3">
    <div class="d-flex justify-content-end mb-3">
        <a class="btn btn-success" href="{{ route('drugs.index') }}">Back</a>
    </div>
    <form action="{{ route('drugs.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3" placeholder="Enter description"></textarea>
        </div>
        <div class="form-group">
            <label for="quantity">Quantity</label>
            <input type="number" class="form-control" id="quantity" name="quantity" placeholder="Enter quantity" required>
        </div>
        <div class="form-group">
            <label for="agent_id">Agent</label>
            <select class="form-control" id="agent_id" name="agent_id" required>
                <option value="">Select Agent</option>
                @foreach($agents as $agent)
                    <option value="{{ $agent->id }}">{{ $agent->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="expiry_date">Expiration Date</label>
            <input type="date" class="form-control" id="expiry_date" name="expiry_date" required>
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" class="form-control" id="price" name="price" placeholder="Enter price" required>
        </div>
        <div class="form-group">
            <label for="discount_percentage">Discount Percentage</label>
            <input type="number" class="form-control" id="discount_percentage" name="discount" placeholder="Enter discount percentage">
        </div>
        <div class="form-group">
            <label for="actual_price">Actual Price</label>
            <input type="number" class="form-control" id="actual_price" name="actual_price" placeholder="Enter actual price" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
