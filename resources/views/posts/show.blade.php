@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">

            <ul>
                <li>{{ $post->title }}</li>
                <li>{{ $post->content }}</li>
                <li><img src="{{ asset('storage/posts_image/'. $post->image) }}" alt="" width="30px" height="30px"></li>
                <li>{{ $post->created_at->diffForHumans() }}</li>
            </ul>
        </div>
    </div>
</div>

@endsection
