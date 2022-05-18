@extends('backend.layouts.app')

@section('content')

<div class="container">
    <div class="page-header">
            <div class="d-flex justify-content-between align-items-center">
                <h3 class="">Car Items</h3>
            </div>
        </div>
        <form method="POST" action="{{ route('car_items.update', $carItems->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-row">

                <div class="form-group col-md-8">
                    <label for="product">Product</label>
                    <select class="select2 form-control py-3" name="product_id">
                        @foreach ($products as $carItem)
                            <option value="{{ $carItem->id }}">{{ $carItem->name }}</option>
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