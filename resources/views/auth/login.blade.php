@extends('layouts.app')

@section('content')

<div class="login-container">
    <div class="forms-container">
        <div class="signin-signup">

            <!-- start sign in form -->
            <form class="sign-in-form" method="POST" action="{{route('login')}}">

                @csrf
                <h2 class="title"> Sign in </h2>
                <div class="input-field">
                    <i class="fa fa-user"></i>
                    <input type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="input-field">
                    <i class="fa fa-lock"></i>
                    <input type="password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                </div>
                <input type="submit" value="login" class="btn solid">

                <p class="social-text">or sign in with social platforms </p>
                <div class="social-media">
                    <a href="#" class="social-icon">
                        <i class="fa fa-google"></i>
                    </a>
                    <a href="#" class="social-icon">
                        <i class="fa fa-facebook"></i>
                    </a>
                    <a href="#" class="social-icon">
                        <i class="fa fa-twitter"></i>
                    </a>
                    <a href="#" class="social-icon">
                        <i class="fa fa-linkedin"></i>
                    </a>
                </div>
            </form>
            <!-- end sign in form -->

            <!-- start sign up form -->

            <form class="sign-up-form" method="POST" action="{{route('register')}}">

                @csrf
                <h2 class="title"> Sign up </h2>
                <div class="input-field">
                    <i class="fa fa-user"></i>
                    <input type="text" name="regsiter_username" placeholder="Username">
                </div>

                <div class="input-field">
                    <i class="fa fa-envelope"></i>
                    <input type="email" name="regsiter_email" value="{{ old('regsiter_email') }}" placeholder="Email">
                    @error('regsiter_email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="input-field">
                    <i class="fa fa-lock"></i>
                    <input type="password" class="@error('register_password') is-invalid @enderror" name="register_password"  placeholder="password">
                </div>
                <div class="input-field">
                    <i class="fa fa-lock"></i>
                    <input id="password-confirm" type="password" name="regsiter_password-confirm" class="@error('regsiter_password-confirm') is-invalid @enderror"  autocomplete="new-password" placeholder="confirm password">

                </div>
                <div class="form-group row">
                    <div class="col-md-6 offset-md-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>
                </div>
                <input type="submit" value="Sign up" class="btn solid">
                <p class="social-text">or sign up with social platforms </p>
                <div class="social-media">
                    <a href="#" class="social-icon">
                        <i class="fa fa-google"></i>
                    </a>
                    <a href="#" class="social-icon">
                        <i class="fa fa-facebook"></i>
                    </a>
                    <a href="#" class="social-icon">
                        <i class="fa fa-twitter"></i>
                    </a>
                    <a href="#" class="social-icon">
                        <i class="fa fa-linkedin"></i>
                    </a>
                </div>
            </form>

            <!-- end sign up form  -->
        </div>
    </div>
    <!-- start panels container -->
    <div class="panels-container">
        <div class="panel left-panel">
            <div class="content">
                <h3>New here ? </h3>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Est fuga neque exercitationem debitis aperiam dignissimos totam accusamus, culpa provident hic nam eveniet minima incidunt, in quasi. Sunt dolore repudiandae aut.</p>
                <button class="btn transparent" id="sign-up-btn">Sign Up</button>
            </div>
            <img src="{{ asset('storage/icons/log.svg') }}" class="image" alt="">
        </div>
        <div class="panel right-panel">
            <div class="content">
                <h3>One of us ? </h3>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Est fuga neque exercitationem debitis aperiam dignissimos totam accusamus, culpa provident hic nam eveniet minima incidunt, in quasi. Sunt dolore repudiandae aut.</p>
                <button class="btn transparent" id="sign-in-btn">Sign In</button>
            </div>
            <img src="{{ asset('storage/icons/register.svg') }}" class="image" alt="">
        </div>
    </div>
</div>


{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection
