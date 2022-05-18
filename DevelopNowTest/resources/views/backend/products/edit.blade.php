@extends('backend.layouts.app')

@section('content')

<div class="container">

        <div class="page-header">
            <div class="d-flex justify-content-between align-items-center">
                <h3 class="">Products</h3>
            </div>
        </div>
        <form method="POST" action="{{ route('products.update', $products->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-row">
                <div class="form-group col-md-8">
                    <label for="name">Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                        placeholder="name" value="{{ $products->name }}">
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group col-md-8">
                    <label for="price">Price</label>
                    <input type="text" class="form-control @error('price') is-invalid @enderror" name="price"
                        placeholder="price" value="{{ $products->price }}">
                    @error('price')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group col-md-8">
                    <label for="image">Image</label>
                    <input type="file" class="form-control" name="image">
                    <div class="clearfix"></div>
                    @if($products->image)
                        <div class="col-md-3"></div>
                        <div class="col-md-9">
                            <img src="{{asset('storage/news/'. $products->image)}}" style="width: 150px;" alt="Product Image">
                        </div>
                        <div class="clearfix"></div>
                    @endif
                </div>
            </div>
            <div class="form-row">

                <div class="form-group col-md-8">
                    <label for="category">Product Category</label>
                    <select class="select2 form-control py-3" name="category_id">
                        @foreach ($product_categories as $categories)
                            <option value="{{ $categories->id }}">{{ $categories->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection

@section('third_party_scripts')
    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>
@endsection