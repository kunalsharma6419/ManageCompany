@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Companies</h1>
        @if(session()->has('message'))
            
                    <div class="alert alert-success">
            
                        <button type="button" class="close" data-dismiss="alert">
                        x
                        </button>
                        {{ session()->get('message') }}
                    </div>
                  @endif
        <ul class="list-group">
            @foreach ($companies as $company)
                <li class="list-group-item">
                    <div class="row align-items-center">
                        <div class="col-2">
                            <img src="{{ Storage::url($company->logo) }}" alt="{{ $company->name }}" class="img-fluid">
                        </div>
                        <div class="col-7">
                            <h3>{{ $company->name }}</h3>
                            <p>{{ $company->email }}</p>
                            <p>{{ $company->website }}</p>
                            <a href="{{ route('company.edit', ['id' => $company->id]) }}">Edit</a>
                            <a onclick="return confirm('Are you Sure to delete this')" href="{{ route('company.destroy', ['id' => $company->id]) }}" style="color: red;">Delete</a>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>

        <div class="d-flex justify-content-center mt-4">
            {{ $companies->links() }}
        </div>
    </div>
@endsection
