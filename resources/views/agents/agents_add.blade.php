@extends('layouts.default')

@section('content')
<div class="col-lg-9 mt-3">
    <h2 class="text-center mb-4">Create Agent</h2>
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form id="create-agent-form" action="{{ route('agents.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="agent-name">Name</label>
            <input type="text" name="name" class="form-control" id="agent-name" placeholder="Enter name" value="{{ old('name') }}">
        </div>
        <div class="form-group">
            <label for="company-name">Company Name</label>
            <input type="text" name="company_name" class="form-control" id="company-name" placeholder="Enter company name" value="{{ old('company_name') }}">
        </div>
        <div class="form-group">
            <label for="contact-number">Contact Number</label>
            <input type="tel" name="phone" class="form-control" id="contact-number" placeholder="Enter contact number" value="{{ old('phone') }}">
        </div>
        <div class="form-group">
            <label for="agent-email">Email Address</label>
            <input type="email" name="email" class="form-control" id="agent-email" placeholder="Enter email address" value="{{ old('email') }}">
        </div>
        <div class="form-group">
            <label for="agent-image">Image</label>
            <input type="file" name="image" class="form-control-file" id="agent-image">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="{{ route('agents.index') }}" class="btn btn-primary">Back</a>
    </form>
</div>
@endsection
