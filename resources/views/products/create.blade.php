@extends('layouts.master')
@section('content')
    <h1>Create Product</h1>
    <a href="{{ route('products.index') }}" class="btn btn-info">Back Product</a>
    @if (\Session::has('msg'))
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
            {{ Session::get('msg') }}
        </div>
    @endif
    <form action={{ route('products.store') }} method="POST">
        @csrf
        <div class="mb-3">
            <label for="" class="form-label">Name</label>
            <input type="text" class="form-control" name="name" id="name" aria-describedby="helpId" placeholder="">

            <label for="" class="form-label">Price</label>
            <input type="text" class="form-control" name="price" id="price" aria-describedby="helpId"
                placeholder="">

            <label for="" class="form-label">Price Sale</label>
            <input type="text" class="form-control" name="price_sale" id="price_sale" aria-describedby="helpId"
                placeholder="">

            <label for="" class="form-label">Image</label>
            <input type="file" class="form-control" name="img" id="img" aria-describedby="helpId"
                placeholder="">

            <div class="form-check">
                <input class="form-check-input" type="radio" name="is_active" id="is-active1"
                    value="{{ App\Models\Product::ACTIVE_PRODUCT }}"
                    >
                <label class="form-check-label" for="">
                    Active
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="is_active" id="is-active2"
                    value="{{ App\Models\Product::INACTIVE_PRODUCT }}">
                <label class="form-check-label" for="">
                    In Active
                </label>
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Describe</label>
                <textarea class="form-control" name="describe" id="" rows="3"></textarea>
            </div>
            <br>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection
