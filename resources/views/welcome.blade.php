@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Welcome</h1>

        @auth
            @if (Auth::user()->isAdmin)
                <a href="{{ route('home') }}" class="btn btn-primary">Go to Admin Dashboard</a>
            @endif
        @endauth
    </div>
@endsection