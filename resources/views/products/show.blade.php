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
                        <li class="breadcrumb-item active">View Product</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div class="bg-light p-4 rounded">
        <div class="lead">

        </div>

        <div class="container mt-4">
            <div>
                Name: {{ $product->name }}
            </div>
            <div>
                Description: {{ $product->description }}
            </div>
            <div>
                Price: {{ $product->price }}
            </div>
        </div>

    </div>
    <div class="mt-4">
        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-info">Edit</a>
        <a href="{{ route('products.index') }}" class="btn btn-default">Back</a>
    </div>
@endsection
