@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h1>{{ $company->name }}</h1>
                <p><strong>Email:</strong> {{ $company->email }}</p>
                <p><strong>Website:</strong> {{ $company->website }}</p>
                <p><strong>Logo:</strong></p>
                <img src="{{ asset($company->logo) }}" alt="{{ $company->name }} logo" class="img-fluid">
            </div>
            <div class="col-md-4">
                <a href="{{ route('companies.edit', $company) }}" class="btn btn-primary btn-block">Edit</a>
            </div>
        </div>
        <hr>
        <h2>Employees</h2>
        @if(count($company->employees) > 0)
            <table class="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                </tr>
                </thead>
                <tbody>
                @foreach($company->employees as $employee)
                    <tr>
                        <td>{{ $employee->id }}</td>
                        <td>{{ $employee->firstname }}</td>
                        <td>{{ $employee->lastname }}</td>
                        <td>{{ $employee->email }}</td>
                        <td>{{ $employee->phone }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
            <p>No employees found.</p>
        @endif
    </div>
@endsection
