@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-4 rounded">
        <h2>Products</h2>
        <div class="lead">
            <p class="">Manage your products here.</p>
            <form class="mx-sm-3 mb-2">
                <input type="search" class="form-control" placeholder="Find products here by name..." name="search" value="{{ request('search') }}">
            </form>
            <a href="{{ route('products.create') }}" class="btn btn-primary btn-sm float-right mb-2">Add new product</a>
        </div>
        <div class="mt-2" x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)">
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
                @forelse ($products as $key => $product)
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
                            <div class="text-center">
                                <a href="#myModal" class="btn btn-danger trigger-btn" data-toggle="modal">Delete</a>
                            </div>

                            <!-- Confirmation Modal -->
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
                                            <p>Do you really want to delete
                                                <strong>{{ strtoupper($product->name) }}</strong>? This process cannot be
                                                undone.</p>
                                        </div>
                                        <div class="modal-footer justify-content-center">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Cancel</button>
                                            <div>
                                                {!! Form::open([
                                                    'method' => 'DELETE',
                                                    'route' => ['products.destroy', $product->id],
                                                    'style' => 'display:inline',
                                                ]) !!}
                                                {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                                                {!! Form::close() !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    @empty
                        <li class="list-group-item list-group-item-danger">Product Not Found.</li>
                    </tr>
                @endforelse

            </tbody>
        </table>
    </div>
    <div class="d-flex mt-4">
        {!! $products->links() !!}
    </div>
@endsection
