@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Employee Details</h1>

        <table class="table">
            <tbody>
                <tr>
                    <th>First Name</th>
                    <td>{{ $employee->first_name }}</td>
                </tr>
                <tr>
                    <th>Last Name</th>
                    <td>{{ $employee->last_name }}</td>
                </tr>
                <tr>
                    <th>Company</th>
                    <td>{{ $employee->company->name }}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{ $employee->email }}</td>
                </tr>
                <tr>
                    <th>Phone</th>
                    <td>{{ $employee->phone }}</td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
