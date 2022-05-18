@extends('backend.layouts.app')

@section('content')


<div class="container">

    <div class="page-header">
        <div class="d-flex justify-content-between align-items-center">
            <h3 class="">Car Items</h3>
        </div>
    </div>
    <div class="row">
    	<table class="table">
		    <tr>
		      <th scope="row">Product</th>
		      <td>{{ $carItems->product ? $car_item->product->name : null }}</td>
		    </tr>
		</table> 
    </div>
                
@endsection