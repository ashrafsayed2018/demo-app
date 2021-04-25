@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <ul>
         @foreach ($profiles as $profile)
            <li>{{ $profile->about }}</li>
         @endforeach
        </ul>
    </div>
</div>

@endsection




