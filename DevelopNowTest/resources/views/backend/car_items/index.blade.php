@extends('backend.layouts.app')

@section('content')
    <div class="container">
        <div class="page-header">
            <div class="d-flex justify-content-between align-items-center">
                <h3 class="">Car Items</h3>
                <a href="{{ route('car_items.create') }}" class="btn btn-info float-none sm:float-right btn-sm">Add New</a>
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
                                    <th scope="col">Producat Name</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($car_items as $car_item)
                                    <tr>
                                        <th scope="row">{{ $i++ }}</th>
                                        <td>{{ $car_item->product ? $car_item->product->name : null }}
                                        <td>
                                            <form action="{{ route('car_items.destroy', $car_item->id) }}" method="POST">
                                                {{-- View button --}}
                                                <a href="{{ route('car_items.show', $car_item->id) }}"
                                                    class="btn btn-info  btn-sm">View</a>
                                                {{--  --}}
                                                {{-- edit button --}}
                                                <a href="{{ route('car_items.edit', $car_item->id) }}"
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
                        {{ $car_items->links() }}
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
