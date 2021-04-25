@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h3 class="text-center">categories page </h3>
                <ul>
                    @foreach ($categories as $category)
                    <li><a href="{{ route('category.show' , $category->slug) }}">{{ $category->category_name }}</a></li>
                    @endforeach
                </ul>

            </div>
        </div>
    </div>
@endsection
