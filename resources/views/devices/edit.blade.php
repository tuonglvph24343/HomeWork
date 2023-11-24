@extends('layouts.master')
@section('content')
    @if (\Session::has('msg'))
        <div class="alert alert-primary" role="alert">
            {{ \Session::get('msg') }}
        </div>
    @endif
    <h1>Edit Device</h1>
    <a href="{{ route('devices.index') }}" class="btn btn-primary">Back</a>
    <form action="{{ route('devices.update', $device->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="" class="form-label">Name</label>
            <input type="text" class="form-control" name="name" id="name" aria-describedby="helpId"
                placeholder="" value="{{ $device->name }}">

            <label for="" class="form-label">Serial</label>
            <input type="text" class="form-control" name="serial" id="serial" aria-describedby="helpId"
                placeholder="" value="{{ $device->serial }}">

            <label for="" class="form-label">Image</label>
            <input type="file" class="form-control" name="img" id="img" aria-describedby="helpId"
                placeholder="" value="{{ $device->img }}">
            <img src="{{ Storage::url($device->img) }}" alt="" width="100">

            <div class="form-check">
                <input class="form-check-input" type="radio" name="is_active" id="isactive1"
                    value="{{ \App\Models\Device::ACTIVE }}" @if ($device->is_active == \App\Models\Device::ACTIVE) checked @endif>
                <label class="form-check-label" for="isactive1">
                    Active
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="is_active" id="isactive2"
                    value="{{ \App\Models\Device::INACTIVE }}" @if ($device->is_active == \App\Models\Device::INACTIVE) checked @endif>
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
                <button type="submit" class="btn btn-success text-center">Edit</button>
            </div>
        </div>
    </form>
@endsection
