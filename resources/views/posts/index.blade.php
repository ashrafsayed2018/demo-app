@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="clo-md-8 offset-md-2">

                <a href="{{ route('posts.create') }}" class="btn btn-primary">create new Post</a>
                @foreach ($posts as $post)
                    <ul>
                        <li><a href="{{ route('posts.show', $post->slug) }}">{{ $post->title }}</a></li>
                    </ul>
                @endforeach
            </div>
        </div>
    </div>
@endsection
