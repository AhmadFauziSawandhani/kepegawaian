@extends('layouts.app')

@section('auth')
<div class="container" style="
  position: absolute;
  left: 50%;
  top: 50%;
  transform: translate(-50%, -50%);">
    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block" style="
              background-image: url('/assets/img/brand/{{$brand->image_login}}') !important;
              background-position: center;
              background-size: cover;">
              </div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                  </div>
                  <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group">
                      <input id="email" type="email" class="form-control form-control-user @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" aria-describedby="emailHelp" placeholder="Enter Email Address..." autocomplete="email" autofocus required>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                      <input id="password" type="password" class="form-control form-control-user @error('password') is-invalid @enderror" name="password" placeholder="Password" autocomplete="password" required>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="custom-control-label" for="customCheck">{{ __('Remember Me') }}</label>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-user btn-block">
                        {{ __('Login') }}
                    </button>
                  </form>
                  <hr>
                    <div class="text-center">
                        @if (Route::has('password.request'))
                            <a class="btn btn-link small" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </div>
                    <div class="text-center">
                    <a class="small" href="{{url('register')}}">Create an Account!</a>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>
</div>
@endsection
