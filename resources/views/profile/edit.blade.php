@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-6 offset-md-3">
                <h3>edit profile </h3>
                @include('errors')

                <form action="{{ route('profile.update',auth()->user()->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="about">About</label>
                        <textarea name="about" id="about" class="form-control">{{ old('about', auth()->user()->profile->about)}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="mobile">Mobile</label>
                        <input type="text" name="mobile_number" value="{{  old('mobile_number', auth()->user()->profile->mobile_number) }}" id="mobile" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="image">image</label>
                        <input type="file" name="image" id="image" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="location">location</label>
                        <input type="text" name="location" value="{{  old('location', auth()->user()->profile->location) }}" id="location" class="form-control">
                    </div>

                    <div class="form-group">
                        <input type="submit" value="Edit" class="btn btn-success btn-sm">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
