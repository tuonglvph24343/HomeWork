@extends('layouts.master')
@section('content')
    <h1>List car</h1>   
    <a href="{{ route('cars.create') }}" class="btn btn-primary">Create</a>
    <div class="table-responsive">
        <table class="table table-primary">
            <thead>
                <tr>
                    <th scope="col">name</th>
                    <th scope="col">brand</th>
                    <th scope="col">image</th>
                    <th scope="col">is active</th>
                    <th scope="col">description</th>
                    <th scope="col">action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    <tr class="">
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->brand }}</td>
                        <td>
                            <img src="{{Storage::url($item->img)}}" alt="" width="100">
                        </td>
                        <td>{{ $item->is_active ? 'active' : 'in active' }}</td>
                        <td>{{ $item->description }}</td>
                        <td>
                            <a href="{{ route('cars.edit', $item) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('cars.destroy', $item) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('yes delete')"
                                    class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
        {{ $data->links() }}
    </div>
@endsection
