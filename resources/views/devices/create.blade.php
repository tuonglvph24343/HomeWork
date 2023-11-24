@extends('layouts.master')
@section('content')
    @if (\Session::has('msg'))
        <div class="alert alert-primary" role="alert">
            {{ \Session::get('msg') }}
        </div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <h1>Add Device</h1>
    <a href="{{ route('devices.index') }}" class="btn btn-primary">Back</a>
    <form action="{{ route('devices.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="" class="form-label">Name</label>
            <input type="text" class="form-control" name="name" id="name" aria-describedby="helpId"
                placeholder="">

            <label for="" class="form-label">Serial</label>
            <input type="text" class="form-control" name="serial" id="serial" aria-describedby="helpId"
                placeholder="">

            <label for="" class="form-label">Image</label>
            <input type="file" class="form-control" name="img" id="img" aria-describedby="helpId"
                placeholder="">
            <div class="form-check">
                <input class="form-check-input" type="radio" name="is_active" id="isactive1"
                    value="{{ \App\Models\Device::ACTIVE }}">
                <label class="form-check-label" for="isactive1">
                    Active
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="is_active" id="isactive2"
                    value="{{ \App\Models\Device::INACTIVE }}">
                <label class="form-check-label" for="isactive2">
                    In Active
                </label>
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Description</label>
                <textarea class="form-control" name="description" id="description" rows="3"></textarea>
            </div>
            <br>
            <div class="text-center">
                <button type="submit" class="btn btn-success text-center">Add</button>
            </div>
        </div>
    </form>
@endsection
