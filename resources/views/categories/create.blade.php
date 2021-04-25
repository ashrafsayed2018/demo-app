@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

        <div class="col-md-6 offset-md-3">
            <h3>Create Category </h3>
            @include('errors')

            <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="category_name">Category Name </label>
                    <input type="text" name="category_name" value="{{ old('category_name')}}" id="category_name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="image">image</label>
                    <input type="file" name="image" id="image" class="form-control">
                </div>

                <div class="form-group">
                    <input type="submit" value="Create" class="btn btn-success btn-sm">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
