@extends('layouts.app')

@section('auth')
<div class="container" style="
position: absolute;
left: 50%;
top: 50%;
transform: translate(-50%, -50%);">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-5 d-none d-lg-block" style="
          background-image: url('/assets/img/{{$brand->image_register}}'); 
          background-position: center;
          background-size: cover;">
          </div>
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
              </div>
              <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-group">
                    <input id="name" name="name" type="text" class="form-control form-control-user @error('name') is-invalid @enderror" placeholder="Name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                  <input id="email" name="email" type="email" class="form-control form-control-user @error('email') is-invalid @enderror" placeholder="Email Address" value="{{ old('email') }}" required autocomplete="email">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input id="password" name="password" type="password" class="form-control form-control-user @error('password') is-invalid @enderror" placeholder="Password" required autocomplete="new-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                  <div class="col-sm-6">
                    <input id="password-confirm" name="password_confirmation" type="password" class="form-control form-control-user " placeholder="Confirm Password" required autocomplete="new-password">
                  </div>
                </div>
                <button type="submit" class="btn btn-primary btn-user btn-block">
                    {{ __('Register') }}
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
                <a class="small" href="{{url('login')}}">Already have an account? Login here!</a>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
@endsection
