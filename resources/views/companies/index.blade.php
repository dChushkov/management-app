@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Companies</h1>

    <a href="{{ route('companies.create') }}" class="btn btn-primary">Create Company</a>

    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Address</th>
                <th>Email</th>
                <th>Logo</th>
                <th>Website</th>
                <th></th> <!-- Add a new column for action buttons -->
            </tr>
        </thead>
        <tbody>
            @foreach ($companies as $company)
            <tr>
                <td>{{ $company->name }}</td>
                <td>{{ $company->address }}</td>
                <td>{{ $company->email }}</td>
                <td>
                    @if ($company->logo)
                    <img src="{{ asset(Storage::url($company->logo)) }}" width="50">
                    @else
                    No logo
                    @endif
                </td>
                <td>{{ $company->website }}</td>
                <td>
                    <a href="{{ route('companies.edit', $company->id) }}" class="btn btn-primary">Edit</a>
                    
                    <form action="{{ route('companies.destroy', $company->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
    <a href="{{ route('home') }}" class="btn btn-secondary">Back</a>
    
    <div class="text-center">
        {{ $companies->links() }}
    </div>
</div>
@endsection
