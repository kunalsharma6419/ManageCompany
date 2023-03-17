@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}
                
            </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('HI admin!') }}
                    <ul>
                        <li>Companies
                            <ul>
                                <li><a  href="{{ route('company.index') }}">
                    {{ __('Companies') }}
                </a></li>
                <li>
                    <a  href="{{ route('company.create') }}">
                    {{ __('Add Company') }}
                     </a>
               </li>
            </ul>
        </ul>
        <ul>
                        <li>Employees
                            <ul>
                                <li><a  href="{{ route('employee.index') }}">
                    {{ __('Employee') }}
                </a></li>
                <li><a  href="{{ route('employee.create') }}">
                    {{ __('Add Employee') }}
                </a></li>
            </ul>
            </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
