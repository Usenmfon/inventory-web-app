@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-4 rounded">
        <h2>Add new product</h2>
        <div class="lead">
            Add a new product here
        </div>
        <div class="container mt-4">
            <form method="POST" action="{{ route('products.store') }}">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input value="{{ old('name') }}"
                        type="text"
                        class="form-control"
                        name="name"
                        placeholder="Name" required>

                    @if ($errors->has('name'))
                        <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                    @endif
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control"
                        name="description"
                        placeholder="Description" required>{{ old('description') }}</textarea>

                    @if ($errors->has('description'))
                        <span class="text-danger text-left">{{ $errors->first('description') }}</span>
                    @endif
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input value="{{ old('price') }}"
                        type="text"
                        class="form-control"
                        name="price"
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
                                <?php $status = ['Pending', 'Aprroved', 'Rejected'] ?>
                                <option value="">--Status--</option>
                                @foreach ($status as $status_value)
                                    <option value="{{ $status_value }}"
                                        {{ in_array($status_value, $status) ? 'selected' : '' }}>
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
