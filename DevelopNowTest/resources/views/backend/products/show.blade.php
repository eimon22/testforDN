@extends('backend.layouts.app')

@section('content')


<div class="container">

    <div class="d-flex justify-content-between align-items-center">
        <h3 class="">Products</h3>
    </div>
    <div class="row">
    	<table class="table">
		    <tr>
		      <th scope="row">Name</th>
		      <td>{{ $products->name }}</td>
		    </tr>
		    <tr>
		      <th scope="row">Price</th>
		      <td>{{ $products->price }}</td>
		    </tr>
		    <tr>
		      <th scope="row">Image</th>
		      <td>
		      	@if($products->image)
                    <div class="col-md-9">
                        <img src="{{asset('storage/news/'. $products->image)}}" style="width: 150px;" alt="Product Image">
                    </div>
                    <div class="clearfix"></div>
		      	@endif
		      </td>
		    </tr>
		    <tr>
		      <th scope="row">Product Category</th>
		      <td>{{ $products->productCategory ? $products->productCategory->name : null }}</td>
		    </tr>
		</table> 
    </div>
</div>
                
@endsection