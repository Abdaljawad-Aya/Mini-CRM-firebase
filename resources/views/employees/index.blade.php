@extends('layouts.app')

@section('content')
    <div class="container">
    <a class="btn btn-primary rounded-0 mb-3" href="{{ route('employees.create') }}">Add Employee</a>
        <table class="table table-dark">
            <thead>
            <tr>
                <th scope="col">First name</th>
                <th scope="col">Last name</th>
                <th scope="col">Company ID</th>
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


