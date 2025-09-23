@extends('companies.layout')
@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="row align-items-center mb-3">
            <h2>Laravel 11 CRUD Application</h2>
            <div class="col-md-6">
                <h1>Companies Table</h1>
            </div>
            <div class="col-md-6 d-flex justify-content-end">
                <a class="btn btn-success me-2" href="{{ route('companies.create') }}">Create New Company</a>
            </div>
        </div>
    </div>
</div>

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<table class="table table-bordered">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Address</th>
        <th width="250rem">Action</th>
    </tr>
    @if ($companies->isEmpty())
        <tr>
            <td colspan="5">No Companies Found.</td>
        </tr>
    @else
        @foreach ($companies as $company)
        <tr>
            <td>{{ $company->id }}</td>
            <td>{{ $company->name }}</td>
            <td>{{ $company->email }}</td>
            <td class="text-truncate" style="max-width: 200px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                {{ $company->address }}
            </td>
            <td>
                <form action="{{ route('companies.destroy',$company->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('companies.show',$company->id) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('companies.edit',$company->id) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    @endif
</table>

<div class="d-flex justify-content-center">
    {!! $companies->links() !!}
</div>
@endsection