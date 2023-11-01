@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Admin Dashboard</h1>

    @auth
    @if (auth()->user()->is_admin=1)
    <div class="mb-4">
        <a href="{{ route('companies.index') }}" class="btn btn-primary">Manage Companies</a>
    </div>

    <div>
        <a href="{{ route('employees.index') }}" class="btn btn-primary">Manage Employees</a>
    </div>
    @else
    <p>You are not an admin. You do not have permission to manage companies or employees.</p>
    @endif
    @endauth
</div>
@endsection