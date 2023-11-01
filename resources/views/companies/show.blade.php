@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Company Details</h1>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $company->name }}</h5>
                <p class="card-text"><strong>Address:</strong> {{ $company->address }}</p>
                <p class="card-text"><strong>Email:</strong> {{ $company->email }}</p>
                <p class="card-text"><strong>Website:</strong> {{ $company->website }}</p>
            </div>
        </div>
        <a href="{{ route('companies.index') }}" class="btn btn-secondary mt-2">Back</a>
    </div>
@endsection
