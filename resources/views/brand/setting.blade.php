@extends('layouts.app')
@section('content')
<div class="form-group">
    <form method="POST" action="{{ route('setting.update', $brand->id) }}">
        @method('PATCH')
        @csrf
        <div class="row">
            <div class="form-group col-lg-6">
                <label for="name_brand">Nama Aplikasi</label>
                <input id="name_brand" name="name_brand" type="text" class="form-control @error('name_brand') is-invalid @enderror" value="{{ $brand->name_brand }}"  autocomplete="name" onkeyup="this.value = this.value.toUpperCase()" autofocus>
                @error('name_brand')
                    <span class="invalid-feedback" role="alert  ">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection