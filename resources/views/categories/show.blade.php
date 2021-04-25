@extends('layouts.app')

@section('content')
       <ul>
           <li>
               <a href="{{ route('posts.show', $category->slug ) }}">{{ $category->category_name }}</a>
           </li>
           <li><img src="{{ asset('storage/category_image/'. $category->image) }}" alt="" style="width:30px;height:30px"></li>
       </ul>
@endsection
