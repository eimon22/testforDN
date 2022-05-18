@extends('backend.layouts.app')

@section('content')

<div class="container">
        <form method="POST" action="{{ route('product_categories.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-8">
                    <label for="name">Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                        placeholder="name" value="{{ old('name') }}">
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
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
