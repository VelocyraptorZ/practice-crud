@extends('companies.layout')
@section('content')
<div class="row">
    <div class="col-lg-12 p5">
        <div class="row align-items-center mb-3">
            <div class="col-md-6">
                 <h2> Show Company</h2>
            </div>
            <div class="col-md-6 d-flex justify-content-end">
                <a class="btn btn-success me-2" href="{{ route('companies.index') }}">Back</a>
            </div>
        </div>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm border-0 mb-4">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <span class="fs-5 fw-semibold">Company Details</span>
                <span class="badge bg-light text-primary">{{ $company->name }}</span>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label fw-bold">Company:</label>
                    <div class="form-control-plaintext">{{ $company->name }}</div>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Email:</label>
                    <div class="form-control-plaintext">{{ $company->email }}</div>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Address:</label>
                    <div class="form-control-plaintext">{{ $company->address }}</div>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Products:</label>
                    @if ($company->products->isEmpty())
                        <div class="alert alert-warning py-2 mb-0">No Products Found.</div>
                    @else
                        <ul class="list-group">
                            @foreach ($company->products as $product)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <a class="text-decoration-none text-primary" href="{{ route('products.show', $product->id) }}">
                                        {{ $product->name }}
                                    </a>
                                    <span class="badge bg-secondary">{{ $product->category ?? 'Uncategorized' }}</span>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
            <div class="card-footer bg-white d-flex justify-content-end gap-2">
                <a class="btn btn-info" href="{{ route('companies.show', $company->id) }}">
                    <i class="bi bi-eye"></i> Show
                </a>
                <a class="btn btn-primary" href="{{ route('companies.edit', $company->id) }}">
                    <i class="bi bi-pencil"></i> Edit
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