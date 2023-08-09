@extends('layouts.app-master')

@section('content')
<div class="bg-light p-4 rounded">
        <h2>Products</h2>
        <div class="lead">
            <p class="">Manage your products here.</p>
            <a href="{{ route('products.create') }}" class="btn btn-primary btn-sm float-right">Add new product</a>
        </div>
        <div class="mt-2" x-data="{show:true}" x-show="show" x-init="setTimeout(() => show = false, 3000)">
            @include('layouts.partials.messages')
        </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th width="1%">
                    No
                </th>
                <th>
                    Name
                </th>
                <th>
                    Status
                </th>
                <th>
                    Sold
                </th>
                <th>
                    Added By
                </th>
                <th>
                    Date Created
                </th>
                <th width="3%" colspan="3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $key => $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->status }}</td>
                <td>{{ $product->sold }}</td>
                <td>{{ $product->user->name }}</td>
                <td>{{ $product->created_at->format('d/m/y h:i:s') }}</td>

                <td>
                    <a class="btn btn-info btn-sm" href="{{ route('products.show', $product->id) }}">View</a>
                </td>
                <td>
                    <a class="btn btn-primary btn-sm" href="{{ route('products.edit', $product->id) }}">Edit</a>
                </td>
                <td>
                    {!! Form::open(['method' => 'DELETE','route' => ['products.destroy', $product->id],'style'=>'display:inline']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>
</div>
<div class="d-flex mt-4">
    {!! $products->links() !!}
</div>
@endsection

