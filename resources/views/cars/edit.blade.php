@extends('layouts.master')
@section('content')
    <h1>Edit car</h1>
    @if (\Session::has('msg'))
        <div class="alert alert-primary" role="alert">
            {{ \Session::get('msg') }}
        </div>
    @endif
    <a href="{{ route('cars.index') }}" class="btn btn-primary">Back</a>
    <div class="table-responsive">
        <form action="{{ route('cars.update', $car->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" id="name" aria-describedby="helpId"
                    placeholder="" value="{{ $car->name }}">

                <label for="" class="form-label">Brand</label>
                <input type="text" class="form-control" name="brand" id="brand" aria-describedby="helpId"
                    placeholder="" value="{{ $car->brand }}">

                <label for="" class="form-label">Image</label>
                <input type="file" class="form-control" name="img" id="img" aria-describedby="helpId"
                    placeholder="" value="{{ $car->img }}">
                    <img src="{{Storage::url($car->img)}}" alt="" width="100">

                <div class="form-check">
                    <input class="form-check-input" type="radio" value=" {{ \App\Models\Car::ACTIVE }}" name="is_active"
                        id="is_active1" @if ($car->is_active == \App\Models\Car::ACTIVE) checked @endif>

                    <label class="form-check-label" for="is_active1">
                        Active
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" value=" {{ \App\Models\Car::INACTIVE }} "name="is_active"
                        id="is_active2" @if ($car->is_active == \App\Models\Car::INACTIVE) checked @endif>

                    <label class="form-check-label" for="is_active2">
                        In Active
                    </label>
                </div>

                <label for="" class="form-label">Description</label>
                <input type="text" class="form-control" name="description" id="description" aria-describedby="helpId"
                    placeholder="" value="{{ $car->description }}">
                <br>
                <div class="text-center">
                    <button type="submit" class="btn btn-danger">Save</button>
                </div>



            </div>
        </form>
    @endsection
