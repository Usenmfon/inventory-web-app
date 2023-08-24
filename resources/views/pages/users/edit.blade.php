@extends('layouts.app-master')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">User</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active">Upate User</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
    <div class="bg-light p-4 rounded">
        <div class="lead"></div>

        <div class="container mt-4">
            <form method="post" action="{{ route('users.update', $user->id) }}">
                @method('patch')
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label"><strong>Name</strong></label>
                    <input value="{{ $user->name }}" type="text" class="form-control" name="name" placeholder="Name"
                        required>

                    @if ($errors->has('name'))
                        <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label"><strong>Email</strong></label>
                    <input value="{{ $user->email }}" type="email" class="form-control" name="email"
                        placeholder="Email address" required>
                    @if ($errors->has('email'))
                        <span class="text-danger text-left">{{ $errors->first('email') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label"><strong>Username</strong></label>
                    <input value="{{ $user->username }}" type="text" class="form-control" name="username"
                        placeholder="Username" required>
                    @if ($errors->has('username'))
                        <span class="text-danger text-left">{{ $errors->first('username') }}</span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="role" class="form-label"><strong>Role</strong></label>
                    <div>
                        @foreach ($roles as $role)
                            <label for="" class="px-2"><input type="checkbox" name="role[]"
                                    value="{{ $role->id }}"
                                    {{ in_array($role->name, $userRole) ? 'checked' : '' }}>{{ strtoupper($role->name) }}</label>
                        @endforeach
                    </div>

                    @if ($errors->has('role'))
                        <span class="text-danger text-left">{{ $errors->first('role') }}</span>
                    @endif
                </div>

                <button type="submit" class="btn btn-primary">Update user</button>
                <a href="{{ route('users.index') }}" class="btn btn-default">Cancel</a>
            </form>
        </div>
    </div>
@endsection
