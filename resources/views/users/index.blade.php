@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h3 class="text-center"> all users </h3>

            <table class="table">
                <thead>
                    <tr>
                        <td>username</td>
                        <td>user image</td>
                        <td>mobile number</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td>
                              <a href="{{ route('profile.show', $user->slug)}}">{{ $user->username }}</a>
                         </td>

                         @if ($user->profile)
                         <td><img src="{{ asset('storage/profile_image/' .$user->profile->image)}}" alt="" style="width:40px;height:40px"></td>

                         <td>{{ $user->profile->mobile_number }}</td>
                         @endif

                     </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
