@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <!-- resources/views/companies/create.blade.php -->
<div class="card-header">{{ __('Create Company') }}</div>
<div class="card-body">
            <form method="POST" action="{{ route('company.store') }}" enctype="multipart/form-data" class="form-horizontal">
    @csrf

    <div class="form-group">
        <label for="name" class="col-sm-2 control-label">Name *</label>
        <div class="col-sm-10">
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
    </div>

    <div class="form-group">
        <label for="email" class="col-sm-2 control-label">Email</label>
        <div class="col-sm-10">
            <input type="email" name="email" id="email" class="form-control">
        </div>
    </div>

    <div class="form-group">
        <label for="logo" class="col-sm-2 control-label">Logo *</label>
        <div class="col-sm-10">
            <input type="file" name="logo" id="logo" class="form-control-file" accept="image/*" required>
        </div>
    </div>

    <div class="form-group">
        <label for="website" class="col-sm-2 control-label">Website</label>
        <div class="col-sm-10">
            <input type="text" name="website" id="website" class="form-control">
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </div>
</form>

</div>
        </div>
    </div>
</div>
@endsection
