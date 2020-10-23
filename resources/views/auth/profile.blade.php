@extends('layouts.app')
@section('content')
<div class="form-group">
    <form method="POST" action="{{ route('profile.update', $profile->id) }}">
        @method('PATCH')
        @csrf
        <div class="row">
            <div class="form-group col-lg-6">
                <label for="name">Nama</label>
                <input id="name" name="name" type="text" class="form-control @error('name') is-invalid @enderror" value="{{ $profile->name }}"  autocomplete="name" autofocus>
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group col-lg-6">
                <label for="email">Email address</label>
                <input id="email" name="email" type="email" class="form-control @error('email') is-invalid @enderror" aria-describedby="emailHelp" value="{{ $profile->email }}"  autocomplete="email" autofocus readonly>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="form-group col-lg-6">
            <label for="password">Password Baru</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Masukan Password Baru" autocomplete="new-password">
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>
            <div class="form-group col-lg-6">
                <label for="password-confirm">Konfirmasi Password Baru</label>
                <input type="password" class="form-control" id="password-confirm" placeholder="Konfirmasi Password Baru" name="password_confirmation" required autocomplete="new-password">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection