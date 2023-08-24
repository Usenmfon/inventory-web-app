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
                        <li class="breadcrumb-item active">Update Product</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div class="bg-light p-4 rounded">
        <div class="lead">
            Edit Product.
        </div>

        <div class="container mt-4">

            <form method="POST" action="{{ route('products.update', $product->id) }}">
                @method('patch')
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input value="{{ $product->name }}" type="text" class="form-control" name="name"
                        placeholder="Name" required>

                    @if ($errors->has('name'))
                        <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                    @endif
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea type="text" class="form-control" name="description" placeholder="Description" required>{{ $product->description }}</textarea>

                    @if ($errors->has('description'))
                        <span class="text-danger text-left">{{ $errors->first('description') }}</span>
                    @endif
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input value="{{ $product->price }}" type="text" class="form-control" name="price"
                        placeholder="Price" required>

                    @if ($errors->has('price'))
                        <span class="text-danger text-left">{{ $errors->first('price') }}</span>
                    @endif
                </div>

                <div class="mb-3">
                    <label for="sold" class="form-label">Sold</label>
                    <select class="form-control" name="sold" required>
                        <?php $sold = ['yes', 'no']; ?>
                        <option value="">--Sold--</option>
                        @foreach ($sold as $key)
                            <option value="{{ $key }}" {{ in_array($key, $sold) ? 'selected' : '' }}>
                                {{ $key }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('sold'))
                        <span class="text-danger text-left">{{ $errors->first('sold') }}</span>
                    @endif
                </div>

                <div class="mb-3">
                    @auth
                        @role('admin')
                            <label for="status" class="form-label">Status</label>
                            <span href="#myModal" class="trigger-btn" data-toggle="modal">
                                <select class="form-control" name="status" required>
                                    <?php $status = ['pending', 'approved', 'rejected']; ?>
                                    @foreach ($status as $status_value)
                                        <option value="{{ $status_value }}"
                                            {{ in_array($status_value, $status) ? 'selected' : '' }}>
                                            {{ $status_value }}</option>
                                    @endforeach
                                    <option value="" selected>--Status--</option>
                                </select>
                            </span>
                            @if ($errors->has('status'))
                                <span class="text-danger text-left">{{ $errors->first('status') }}</span>
                            @endif
                        @endrole
                    @endauth
                </div>

                <div id="myModal" class="modal fade">
                    <div class="modal-dialog modal-confirm">
                        <div class="modal-content">
                            <div class="modal-header flex-column">
                                <div class="icon-box">
                                    <i class="material-icons">&#xE5CD;</i>
                                </div>
                                <h4 class="modal-title w-100">Are you sure?</h4>
                                <button type="button" class="close" data-dismiss="modal"
                                    aria-hidden="true">&times;</button>
                            </div>
                            <div class="modal-body">
                                <p>Do you really want to update the status of this product?</p>
                            </div>
                            <div class="modal-footer justify-content-center">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Save changes</button>
                <a href="{{ route('products.index') }}" class="btn btn-default">Back</a>
            </form>
        </div>

    </div>
@endsection
