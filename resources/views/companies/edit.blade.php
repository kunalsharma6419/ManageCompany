@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Company</h1>

        <form action="{{ route('company.update', $company->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $company->name }}">
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ $company->email }}">
            </div>

            <div class="form-group">
                <label for="logo">Logo</label>
                <input type="file" name="logo" id="logo" class="form-control-file">
            </div>

            <div class="form-group">
                <label for="website">Website</label>
                <input type="text" name="website" id="website" class="form-control" value="{{ $company->website }}">
            </div>

            <button type="submit" class="btn btn-primary">Update Company</button>
        </form>
    </div>
@endsection
