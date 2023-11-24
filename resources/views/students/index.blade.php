@extends('layouts.master')

@section('content')
    <h1>List Students</h1>
    <a href="{{ route('students.create') }}" class="btn btn-info">Add Student</a>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Code</th>
                    <th scope="col">Date of Birth</th>
                    <th scope="col">Image</th>
                    <th scope="col">Is Active</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    <tr>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->code }}</td>
                        <td>{{ $item->date_of_birth }}</td>
                        <td>{{ $item->img }}</td>
                        <td>{{ $item->is_active ? 'active' : 'inactive' }}</td>
                        <td>
                            <a href="{{ route('students.edit', $item) }}" class="btn btn-danger">Edit</a>
                            <form action="{{ route('students.destroy', $item) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure to delete it')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

