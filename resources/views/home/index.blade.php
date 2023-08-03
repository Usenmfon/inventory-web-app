@extends('layouts.app-master')

@section('content')
    <div class="container bg-light p-5 rounded">
        @auth
            <h1>Dashboard</h1>
            <p class="lead">Only authenticated users can access this section.</p>
            {{-- <a class="btn btn-lg btn-primary" href="#" role="button"> &raquo;</a> --}}
        @endauth

        @guest
            <h1>Inventory Management App</h1>
            <p class="lead">You are viewing the home page. Please login to view the restricted data.</p>
            <div class="row">
                @foreach ($products as $key => $product)
                    <div class="col-sm-6 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Product Name: {{ $product->name }}</h5>
                                <p class="card-text">{{ $product->description }}</p>
                                <a href="#" class="btn btn-primary">{{ $product->price }}</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endguest
        {{-- <div class="row">
            <div class="col-6 d-flex justify-content-center">
                {!! $products->links() !!}
            </div>
        </div> --}}
    </div>
@endsection
