@extends('layouts.app')

@section('content')
    <div class="container">
        @if($errors->any())
            <div class="alert alert-danger">
                <strong>Warning!</strong>
                There were some problems with your inputs. <br><br>
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('employees.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="firstname">First Name</label>
                <input type="text" class="form-control" value="{{ old('firstname') }}" name="firstname">
            </div>

            <div class="form-group">
                <label for="lastname">Last Name</label>
                <input type="text" class="form-control" value="{{ old('lastname') }}" name="lastname">
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" value="{{ old('email') }}"name="email">
            </div>

            <div class="form-group">
                <label for="company_id">Company:</label>
                <select class="form-control" id="company_id" name="company_id" required>
                    <option value="">--Select Company--</option>
                    @foreach ($companies as $company)
                        <option value="{{ $company->id }}">{{ $company->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" class="form-control" value="{{ old('phone') }}" name="phone">
            </div>
            <button type="submit" class="btn btn-primary rounded-0 mt-2">Submit</button>
        </form>
    </div>
@endsection
