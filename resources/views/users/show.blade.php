@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-4 rounded">
        <h1>{{ $user->name }}</h1>
        <div class="lead">

        </div>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th width="1%">
                        Id
                    </th>
                    <th>
                        Email
                    </th>
                    <th>
                        Username
                    </th>
                    <th>
                        Total products added
                    </th>
                    <th>
                        Date Joined
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->username }}</td>
                    <td>{{ count($user->product) }}</td>
                    <td>{{ $user->created_at->format('d/m/y h:i:s') }}</td>
                </tr>
            </tbody>
        </table>

    </div>
    <div class="mt-4">
        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-info">Edit</a>
        <a href="{{ route('users.index') }}" class="btn btn-default">Back</a>
    </div>
@endsection


