@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-4 rounded">
        <h2>Update Product</h2>
        <div class="lead">
            Edit Product.
        </div>

        <div class="container mt-4">

            <form method="POST" action="{{ route('products.update', $product->id) }}">
                @method('patch')
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input value="{{ $product->name }}" type="text" class="form-control" name="name" placeholder="Name"
                        required>

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
                                {{ strtoupper($key) }}</option>
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
                            <select class="form-control" name="status" required>
                                <?php $status = ['pending', 'approved', 'rejected']; ?>
                                <option value="">--Status--</option>
                                @foreach ($status as $status_value)
                                    <option value="{{ $status_value }}" {{ in_array($status_value, $status) ? 'selected' : '' }}>
                                        {{ strtoupper($status_value) }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('status'))
                                <span class="text-danger text-left">{{ $errors->first('status') }}</span>
                            @endif
                        @endrole
                    @endauth
                </div>

                <button type="submit" class="btn btn-primary">Save changes</button>
                <a href="{{ route('products.index') }}" class="btn btn-default">Back</a>
            </form>
        </div>

    </div>
@endsection
