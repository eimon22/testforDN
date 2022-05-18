@extends('backend.layouts.app')

@section('content')
    <div class="container">
        <div class="page-header">
            <div class="d-flex justify-content-between align-items-center">
                <h3 class="">Product Categories</h3>
                <a href="{{ route('product_categories.create') }}" class="btn btn-info float-none sm:float-right btn-sm">Add New</a>
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
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($product_categories as $product)
                                    <tr>
                                        <th scope="row">{{ $i++ }}</th>
                                        <td>{{ $product->name }}</td>
                                        <td>
                                            <form action="{{ route('product_categories.destroy', $product->id) }}" method="POST">
                                                {{-- View button --}}
                                                <a href="{{ route('product_categories.show', $product->id) }}"
                                                    class="btn btn-info  btn-sm">View</a>
                                                {{--  --}}
                                                {{-- edit button --}}
                                                <a href="{{ route('product_categories.edit', $product->id) }}"
                                                    class="btn btn-warning  btn-sm">Edit</a>
                                                {{--  --}}
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger  btn-sm" type="submit"
                                                    onclick="return confirm('Are you sure you want to delete this product category?')">
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
                        {{ $product_categories->links() }}
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
