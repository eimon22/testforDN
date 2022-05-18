@extends('backend.layouts.app')

@section('content')


<div class="container">
	<div class="page-header">
        <div class="d-flex justify-content-between align-items-center">
            <h3 class="">Product Categories</h3>
            
        </div>
    </div>

     <div class="row">
    	<table class="table">
		    <tr>
		      <th scope="row">Name</th>
		      <td>{{ $productCategory->name }}</td>
		    </tr>
		</table> 
    </div>
</div>     
@endsection