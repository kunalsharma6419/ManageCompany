@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Employees</h1>
        @if(session()->has('message'))
            
                    <div class="alert alert-success">
            
                        <button type="button" class="close" data-dismiss="alert">
                        x
                        </button>
                        {{ session()->get('message') }}
                    </div>
                  @endif
        <ul class="list-group">
            @foreach ($employees as $employee)
                <li class="list-group-item">
                    <div class="row align-items-center">
                        <div class="col-7">
                            <h3>Firstname: {{ $employee->first_name }} </h3>
                            <h3>Lastname: {{$employee->last_name}}</h3>
                            <p>{{ $employee->gender }}</p>
                            <p>Mobile: {{ $employee->mobile }}</p>
                            <p>Email: {{ $employee->email }}</p>
                            <p>Company: {{ $employee->company->name }}</p>
                            <a href="{{ route('employee.edit', ['id' => $employee->id]) }}">Edit</a>
                            <a onclick="return confirm('Are you Sure to delete this')" href="{{ route('employee.destroy', ['id' => $employee->id]) }}" style="color: red;">Delete</a>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>

        <div class="d-flex justify-content-center mt-4">
            {{ $employees->links() }}
        </div>
    </div>
@endsection
