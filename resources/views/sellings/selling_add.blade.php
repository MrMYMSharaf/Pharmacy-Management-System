@extends('layouts.default')

@section('content')
<div class="col-lg-9 mt-3">
                <h2 class="text-center mb-4">Create Selling Record</h2>
                <form>
                    <div class="form-group">
                        <label for="drug-id">Drug ID</label>
                        <input type="text" class="form-control" id="drug-id" placeholder="Enter drug ID">
                    </div>
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="text" class="form-control" id="price" placeholder="Enter price">
                    </div>
                    <div class="form-group">
                        <label for="quantity">Quantity</label>
                        <input type="number" class="form-control" id="quantity" placeholder="Enter quantity">
                    </div>
                    <div class="form-group">
                        <label for="selling-date">Selling Date</label>
                        <input type="date" class="form-control" id="selling-date">
                    </div>
                    <button type="submit" class="btn btn-primary">Create</button>
                    <a href="selling.html" class="btn btn-secondary">Back</a>
                </form>
            </div>
            @endsection