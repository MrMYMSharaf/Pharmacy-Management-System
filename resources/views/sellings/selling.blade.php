@extends('layouts.default')

@section('content')
<div class="col-lg-9 mt-3">
    <h2 class="text-center mb-4">Selling</h2>
    <div class="text-right mb-3">
        <a href="{{ route('sellings.create') }}" class="btn btn-success">Create</a>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Drug ID</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Selling Date</th>
                <th scope="col">Total Price</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($sellings as $selling)
            <tr>
                <th scope="row">{{ $selling->id }}</th>
                <td>{{ $selling->drug_id }}</td>
                <td>${{ $selling->price }}</td>
                <td>{{ $selling->quantity }}</td>
                <td>{{ $selling->selling_date }}</td>
                <td>${{ $selling->total_price }}</td>
                <td>
                    <a href="{{ route('sellings.edit', $selling->id) }}" class="btn btn-info btn-sm">Edit</a>
                    <form action="{{ route('sellings.destroy', $selling->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="text-right">
        <h4>Total Price: ${{ $sellings->sum('total_price') }}</h4>
    </div>
</div>
@endsection
