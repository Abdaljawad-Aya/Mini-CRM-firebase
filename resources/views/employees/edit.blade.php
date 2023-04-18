 @extends('layouts.app')

    @section('content')
        <div class="container">
            <h1>Edit Employee</h1>
            @if($errors->any())
                <div class="alert alert-danger">
                    <strong>Warning!</strong>
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('employees.update', $employee->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')

                <div class="form-group">
                    <label for="firstname">First Name</label>
                    <input type="text" class="form-control" id="firstname" name="firstname" value="{{ $employee->firstname }}">
                </div>

                <div class="form-group">
                    <label for="lastname">Last Name</label>
                    <input type="text" class="form-control "
                           name="lastname" value="{{ $employee->lastname }}" required>
                </div>

                <div class="form-group">
                    <label for="phone">Last Name</label>
                    <input type="text" class="form-control @error('phone') is-invalid @enderror"
                    name="phone" value="{{ $employee->lastname }}" required>
                </div>

                <div class="form-group">
                    <label for="company_id">Company</label>
                    <select class="form-control" name="company_id">
                        @foreach($companies as $company)
                            <option value="{{ $company->id }}"
                                {{ $company->id == $employee->company_id ? 'selected' : '' }}>
                                {{ $company->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary rounded-0 mt-2">Update</button>
            </form>
        </div>
    @endsection
