@extends('layouts.master')
@section('content')
    <h1>List Device</h1>
    <a href="{{ route('devices.create') }}" class="btn btn-primary">Add</a>
    @if (\Session::has('msg'))
    <div class="alert alert-primary" role="alert">
        {{ \Session::get('msg') }}
    </div>
@endif
    <div class="table-responsive">
        <table class="table table-primary">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Serial</th>
                    <th scope="col">Image</th>
                    <th scope="col">Is active</th>
                    <th scope="col">Description</th>
                    <th scope="col">Action</th>

                </tr>
            </thead>
            @foreach ($data as $item)
                <tbody>
                    <tr class="">
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->serial }}</td>
                        <td>
                            <img src="{{Storage::url($item->img)}}" alt="" width="100">
                        </td>
                        <td>{{ $item->is_active ? 'active' : 'inactive' }}</td>
                        <td>{{ $item->description }}</td>
                        <td>
                            <a href="{{ route('devices.edit', $item) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('devices.destroy', $item) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-info"
                                    onclick="return confirm('Are you sure to delete it')">Delete</button>
                            </form>
                        </td>
                    </tr>
                </tbody>
            @endforeach
        </table>
        {{ $data->links() }}
    </div>
@endsection
