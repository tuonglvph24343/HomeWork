@extends('layouts.master')
@section('content')
    <h1>List Product</h1>
    <a href="{{ route('products.create') }}" class="btn btn-info">Add Product</a>
    <div class="table-responsive">
        <table class="table ">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Price Sale</th>
                    <th scope="col">Image</th>
                    <th scope="col">Is Active</th>
                    <th scope="col">Describe</th>
                    <th scope="col">Acction</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    <tr class="">
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->price }}</td>
                        <td>{{ $item->price_sale }}</td>
                        <td>{{ $item->img }}</td>
                        <td>{{ $item->is_active ? 'active' : 'inactive' }}</td>
                        <td>{{ $item->describe }}</td>
                        <td>
                            <a href="{{ route('products.edit', $item) }}" class="btn btn-danger">Edit</a>
                            <form action="{{ route('products.destroy', $item) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-primary"
                                    onclick="return confirm('are you sure delete it')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
