@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-6 offset-md-3">
                <h3>Create profile </h3>
                @include('errors')
                @if (Session()->has('success'))

                <p class="alert alert-success text-right">{{ Session()->get('success') }}</p>

                @endif
                <form action="{{ route('profile.store',auth()->user()->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="about">About</label>
                        <textarea name="about" id="about" class="form-control">{{ old('about')}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="mobile">Mobile</label>
                        <input type="text" name="mobile_number" value="{{ old('mobile_number')}}" id="mobile" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="image">image</label>
                        <input type="file" name="image" id="image" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="location">location</label>
                        <input type="text" name="location" value="{{ old('location')}}" id="location" class="form-control">
                    </div>

                    <div class="form-group">
                        <input type="submit" value="Edit" class="btn btn-success btn-sm">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
