@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Company</h1>

        <form action="{{ route('companies.update', $company) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror"
                       name="name" value="{{ old('name', $company->name) }}" required>
                @error('name')
                <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror"
                       name="email" value="{{ old('email', $company->email) }}" required>
                @error('email')
                <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="logo">Logo</label>
                <input type="file" class="form-control @error('logo') is-invalid @enderror" name="logo">

                @if($company->logo)
                    <p>Current logo:</p>
                    <img src="{{ asset('storage/' . $company->logo) }}" alt="{{ $company->name }}">
                @endif
                @if($errors->has('logo'))
                    <span class="invalid-feedback" role="alert">
                         <strong>{{ $errors->first('logo') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group">
                <label for="website">Website</label>
                <input type="text" class="form-control @error('website') is-invalid @enderror"
                       name="website" value="{{ old('website', $company->website) }}" required>
                @error('website')
                <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
