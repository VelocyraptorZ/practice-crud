@extends('companies.layout')
@section('content')
<div class="row">
    <div class="col-lg-12 p5">
        <div class="row align-items-center mb-3">
            <div class="col-md-6">
                <h2>Edit Company</h2>
            </div>
            <div class="col-md-6 d-flex justify-content-end">
                <a class="btn btn-success me-2" href="{{ route('companies.index') }}">Back</a>
            </div>
        </div>
    </div>
    <div class="col-md-8 offset-md-2">
        <div class="card shadow-sm border-0 mb-4">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Edit Company</h5>
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('companies.update', $company->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="name" class="form-label">Company Name</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name', $company->name) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" value="{{ old('email', $company->email) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <textarea name="address" class="form-control" rows="3">{{ old('address', $company->address) }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Update Company</button>
                </form>
            </div>
            <div class="card-footer bg-white d-flex justify-content-end align-items-center gap-2">
                <a class="btn btn-info" href="{{ route('companies.show', $company->id) }}">
                    <i class="bi bi-eye"></i> Show
                </a>
                <form action="{{ route('companies.destroy', $company->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this company?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                        <i class="bi bi-trash"></i> Delete
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection