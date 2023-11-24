@extends('layouts.master')

@section('content')
    <h1>Create Student</h1>
    <a href="{{ route('students.index') }}" class="btn btn-info">Back to Students</a>

    @if (\Session::has('msg'))
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
            {{ Session::get('msg') }}
        </div>
    @endif

    <form action="{{ route('students.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" name="name" id="name" aria-describedby="helpId" placeholder="">

            <label for="code" class="form-label">Code</label>
            <input type="text" class="form-control" name="code" id="code" aria-describedby="helpId" placeholder="">

            <label for="date_of_birth" class="form-label">Date of Birth</label>
            <input type="text" class="form-control" name="date_of_birth" id="date_of_birth" aria-describedby="helpId"
                placeholder="">

            <label for="img" class="form-label">Image</label>
            <input type="file" class="form-control" name="img" id="img" aria-describedby="helpId" placeholder="">

            <div class="form-check">
                <input class="form-check-input" type="radio" name="is_active" id="is-active1"
                    value="{{ App\Models\Student::ACTIVE_STUDENT }}">
                <label class="form-check-label" for="is-active1">
                    Active
                </label>
            </div>

            <div class="form-check">
                <input class="form-check-input" type="radio" name="is_active" id="is-active2"
                    value="{{ App\Models\Student::INACTIVE_STUDENT }}">
                <label class="form-check-label" for="is-active2">
                    Inactive
                </label>
            </div>

        

            <div class="text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection
