@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Employee</h1>

        <form action="{{ route('employee.update', $employee->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="first_name">First Name</label>
                <input type="text" name="first_name" id="first_name" class="form-control" value="{{ $employee->first_name }}">
            </div>

             <div class="form-group">
                <label for="last_name">Last Name:</label>
                <input type="text" name="last_name" class="form-control" id="last_name" name="last_name" value="{{ $employee->last_name }}">
            </div>

             <div class="form-group">
                <label for="gender">Gender:</label>
                <select class="form-control" id="gender" name="gender">
                    <option value="male" {{ $employee->gender == 'male' ? 'selected' : '' }}>Male</option>
                    <option value="female" {{ $employee->gender == 'female' ? 'selected' : '' }}>Female</option>
                    <option value="other" {{ $employee->gender == 'other' ? 'selected' : '' }}>Other</option>
                </select>
            </div>

            <div class="form-group">
                <label for="mobile">Mobile:</label>
                <input type="text" class="form-control" id="mobile" name="mobile" value="{{ $employee->mobile }}">
            </div>
            

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ $employee->email }}">
            </div>

             <div class="form-group">
                <label for="company_id">Company:</label>
                <select class="form-control" id="company_id" name="company">
                    @foreach ($companies as $company)
                        <option value="{{ $company->id }}" {{ $company->id == $employee->company_id ? 'selected' : '' }}>
                            {{ $company->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Update Company</button>
        </form>
    </div>
@endsection
