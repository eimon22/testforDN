@extends('backend.layouts.app')

@section('content')
    <div class="container">
        <div class="page-header">
            <div class="d-flex justify-content-between align-items-center">
                <h3 class="">Products</h3>
                <a href="{{ route('products.create') }}" class="btn btn-info float-none sm:float-right btn-sm">Add New</a>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">image</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($products as $product)
                                    <tr>
                                        <th scope="row">{{ $i++ }}</th>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->price }}</td>
                                        <td>{{ $product->productCategory ? $product->productCategory->name : null }}</td>
                                        <td>
                                            @if($product->image)
                                            <div class="col-md-9">
                                                <img src="{{asset('storage/news/'. $product->image)}}" style="width: 150px;" alt="Product Image">
                                            </div>
                                            <div class="clearfix"></div>
                                            @endif
                                        </td>
                                        <td>
                                            <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                                                {{-- View button --}}
                                                <a href="{{ route('products.show', $product->id) }}"
                                                    class="btn btn-info  btn-sm">View</a>
                                                {{--  --}}
                                                {{-- edit button --}}
                                                <a href="{{ route('products.edit', $product->id) }}"
                                                    class="btn btn-warning  btn-sm">Edit</a>
                                                {{--  --}}
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger  btn-sm" type="submit"
                                                    onclick="return confirm('Are you sure you want to delete this product?')">
                                                    Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex justify-content-center">
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
