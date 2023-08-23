@extends('layouts.app-master')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Product</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active">Add Product</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div class="bg-light p-4 rounded">
        <div class="lead">
            Add a new product here
        </div>
        <div class="container mt-4">
            <form method="POST" action="{{ route('products.store') }}">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input value="{{ old('name') }}" type="text" class="form-control" name="name" placeholder="Name"
                        required>

                    @if ($errors->has('name'))
                        <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                    @endif
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" name="description" placeholder="Description" required>{{ old('description') }}</textarea>

                    @if ($errors->has('description'))
                        <span class="text-danger text-left">{{ $errors->first('description') }}</span>
                    @endif
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input value="{{ old('price') }}" type="text" class="form-control" name="price"
                        placeholder="Price" required>

                    @if ($errors->has('price'))
                        <span class="text-danger text-left">{{ $errors->first('price') }}</span>
                    @endif
                </div>

                <div class="mb-3">
                    @auth
                        @role('admin')
                            <label for="status" class="form-label">Status</label>
                            <select class="form-control" name="status" required>
                                <?php $status = ['pending', 'approved', 'rejected']; ?>
                                <option value="">--Status--</option>
                                @foreach ($status as $status_value)
                                    <option value="{{ $status_value }}" {{ in_array($status_value, $status) ? 'selected' : '' }}>
                                        {{ $status_value }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('status'))
                                <span class="text-danger text-left">{{ $errors->first('status') }}</span>
                            @endif
                        @endrole
                    @endauth
                </div>

                <div class="d-flex justify-between">
                    <button type="submit" class="">Save Product</button>
                    <a href="{{ route('products.index') }}" class="btn btn-default">Back</a>
                </div>
            </form>
        </div>
    </div>
@endsection
