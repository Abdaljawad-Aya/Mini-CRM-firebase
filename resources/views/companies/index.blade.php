@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Companies</h1>
        <a class="btn btn-primary rounded-0 mb-3" href="{{ route('companies.create') }}">Add Companies</a>
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Logo</th>
                    <th scope="col">website</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($companies as $company)
                    <tr>
                        <td>{{ $company->id }}</td>
                        <td>{{ $company->name }}</td>
                        <td>{{ $company->email }}</td>
                        <td>
                            @if($company->logo)
                                <img src="{{ asset('storage/' . $company->logo) }}" alt="{{ $company->name }}" width="100"/>
                            @else
                                No Logo
                            @endif
                        </td>
                        <td>{{ $company->website }}</td>
                        <td>
                            <div class="btn-group">
                            <a class="btn btn-primary rounded-0 btn-sm me-2" href="{{ route('companies.edit', $company) }}">Edit</a>
                            <form action="{{ route('companies.destroy', $company) }}" method="post">
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
        {{ $companies->links('pagination::simple-bootstrap-4') }}

    </div>

@endsection
