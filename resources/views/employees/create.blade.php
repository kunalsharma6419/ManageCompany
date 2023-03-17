@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <!-- resources/views/companies/create.blade.php -->
<div class="card-header">{{ __('Create Employee') }}</div>
<div class="card-body">
<form method="POST" action="{{ route('employee.store') }}">
    @csrf
    
    <div class="form-group">
        <label for="first_name">First Name:</label>
        <input type="text" class="form-control" id="first_name" name="first_name" required>
    </div>
    
    <div class="form-group">
        <label for="last_name">Last Name:</label>
        <input type="text" class="form-control" id="last_name" name="last_name" required>
    </div>
    
    <div class="form-group">
        <label for="gender">Gender:</label>
        <select class="form-control" id="gender" name="gender">
            <option value="male">Male</option>
            <option value="female">Female</option>
            <option value="other">Other</option>
        </select>
    </div>
    
    <div class="form-group">
        <label for="mobile">Mobile:</label>
        <input type="text" class="form-control" id="mobile" name="mobile" required>
    </div>
    
    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" class="form-control" id="email" name="email">
    </div>
    
    <div class="form-group">
        <label for="company_id">Company:</label>
        <select class="form-control" id="company_id" name="company_id" required>
            @foreach ($companies as $company)
                <option value="{{ $company->id }}">{{ $company->name }}</option>
            @endforeach
        </select>
    </div>
    
    <button type="submit" class="btn btn-primary">Submit</button>
</form>


</div>
        </div>
    </div>
</div>
@endsection
