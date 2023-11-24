@extends('layouts.master')
@section('content')
    @if (\Session::has('msg'))
        <div class="alert alert-primary" role="alert">
            {{ \Session::get('msg') }}
        </div>
    @endif
    <h1>Create car</h1>
    <a href="{{ route('cars.index') }}" class="btn btn-primary">Back</a>
    <div class="table-responsive">
        <form action="{{ route('cars.store') }}" method="POST" enctype="multipart/form-data" >
            @csrf
          
            <div class="mb-3">
                <label for="" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" id="name" aria-describedby="helpId"
                    placeholder="">

                <label for="" class="form-label">Brand</label>
                <input type="text" class="form-control" name="brand" id="brand" aria-describedby="helpId"
                    placeholder="">

                <label for="" class="form-label">Image</label>
                <input type="file" class="form-control" name="img" id="img" aria-describedby="helpId"
                    placeholder="">

                <div class="form-check">
                    <input class="form-check-input" type="radio" value=" {{ \App\Models\Car::ACTIVE }}" name="is_active"
                        id="is_active1">
                    <label class="form-check-label" for="is_active1">
                        Active
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" value=" {{ \App\Models\Car::INACTIVE }} "name="is_active"
                        id="is_active2">
                    <label class="form-check-label" for="is_active2">
                        In Active
                    </label>
                </div>

                <label for="" class="form-label">Description</label>
                <input type="text" class="form-control" name="description" id="description" aria-describedby="helpId"
                    placeholder="">
                <br>
                <div class="text-center">
                    <button type="submit" class="btn btn-danger">Save</button>
                </div>



            </div>
        </form>
    @endsection
