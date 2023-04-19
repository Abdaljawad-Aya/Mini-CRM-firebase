@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center">Employees</h1>
        <a class="btn btn-primary rounded-0 mb-3" href="{{ route('employees.create') }}">Add Employee</a>
        @if($employees->count() > 0)
            <a class="btn btn-secondary rounded-0 mb-3 float-md-end" href="{{ route('export') }} ">Generate Report</a>
        @endif
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th scope="col">First name</th>
                <th scope="col">Last name</th>
                <th scope="col">Company Name</th>
                <th scope="col">Email</th>
                <th scope="col">Mobile</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($employees as $employee)
                <tr>
                    <td>{{ $employee->firstname }}</td>
                    <td>{{ $employee->lastname }}</td>
                    <td>{{ $employee->company->name }}</td>
                    <td>{{ $employee->email }}</td>
                    <td>{{ $employee->phone }}</td>
                    <td>
                        <div class="btn-group">
                            <a class="btn btn-primary rounded-0 btn-sm me-2" href="{{ route('employees.edit', $employee->id) }}">Edit</a>
                            <form action="{{ route('employees.destroy',  $employee->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger rounded-0 btn-sm" type="submit">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $employees->links('pagination::simple-bootstrap-4') }}

    </div>
@endsection


