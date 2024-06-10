@extends('layouts.default')

@section('content')
<div class="col-lg-9 mt-3">
    <h2 class="text-center mb-4">Edit Selling Record</h2>
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <form id="selling-form" method="POST" action="{{ route('sellings.update', $selling->id) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="drug-id">Drug ID</label>
            <input type="text" class="form-control" id="drug-id" name="drug_id" value="{{ $selling->drug_id }}" placeholder="Enter drug ID">
        </div>
        <div class="form-group">
            <label for="drug-name">Drug Name</label>
            <input type="text" class="form-control" id="drug-name" readonly>
        </div>
        <div class="form-group">
            <label for="available-quantity">Available Quantity</label>
            <input type="text" class="form-control" id="available-quantity" readonly>
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="text" class="form-control" id="price" name="price" value="{{ $selling->price }}" placeholder="Enter price">
        </div>
        <div class="form-group">
            <label for="quantity">Quantity</label>
            <input type="number" class="form-control" id="quantity" name="quantity" value="{{ $selling->quantity }}" placeholder="Enter quantity">
        </div>
        <div class="form-group">
            <label for="selling-date">Selling Date</label>
            <input type="date" class="form-control" id="selling-date" name="selling_date" value="{{ $selling->selling_date }}">
        </div>
        <div class="form-group">
            <label for="total-price">Total Price</label>
            <input type="text" class="form-control" id="total-price" readonly>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('sellings.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    function fetchDrugDetails(drugId) {
        if (drugId) {
            $.ajax({
                url: '/drugs/' + drugId + '/details',
                type: 'GET',
                success: function(data) {
                    if (data) {
                        $('#drug-name').val(data.name);
                        $('#available-quantity').val(data.quantity);
                        var priceAfterDiscount = data.price - (data.price * (data.discount / 100));
                        $('#price').val(priceAfterDiscount.toFixed(2));
                        calculateTotalPrice();
                    } else {
                        alert('No drug found with this ID');
                    }
                }
            });
        }
    }

    $('#drug-id').on('change', function() {
        fetchDrugDetails($(this).val());
    });

    $('#quantity').on('input', function() {
        calculateTotalPrice();
    });

    function calculateTotalPrice() {
        var price = parseFloat($('#price').val()) || 0;
        var quantity = parseInt($('#quantity').val()) || 0;
        $('#total-price').val((price * quantity).toFixed(2));
    }

    // Fetch details for the initial load
    fetchDrugDetails($('#drug-id').val());
});
</script>
@endsection
