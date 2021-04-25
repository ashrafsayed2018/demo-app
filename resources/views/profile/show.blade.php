@extends('layouts.app')

@section('content')

<div class="container">
   <div class="row">
        <div class="col-lg-8 offset-md-2">
            <ul>
                <li>{{ $user->username }}</li>
                <li>{{ $user->email }}</li>
                @if ($user->profile)
                <li>{{ $user->profile->mobile_number }}</li>
                <li><img src="{{ asset('storage/profile_image/' . $user->profile->image) }}" alt="" style="width:30px;height: 30px"></li>
                @endif

            </ul>
            <h3> user categories </h3>

            <ul>
                @foreach ($user->categories as $category)
                <li>
                    <a href="{{ route('category.show', $category->slug) }}">
                        {{ $category->category_name }}
                    </a>
                </li>
                @endforeach
            </ul>
        </div>
   </div>
</div>

@endsection
