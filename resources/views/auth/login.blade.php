@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-center ">
    <div class="row ">
        <div class="col-md-12">
            <div class="login-box">
                <div class="login-logo mt-5">
                    <img src="../img/logo_title_down.png"alt="Logo Toko Sarjono" class="img" style="opacity: .8; width: 50%">
                    <h1 class="mt-5"> Management Toko</h1>
                </div>
                <div class="card">
                <div class="card-body login-card-body">
                    <p class="login-box-msg text-center">Silahkan Login Untuk memulai Sesi anda</p>
            
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                    <label for="email"> Masukkan Username / Email </label>
                    <div class="input-group mb-3">
                        <input id="login" type="text"
                                class="form-control{{ $errors->has('username') || $errors->has('email') ? ' is-invalid' : '' }}"
                                name="login" value="{{ old('username') ?: old('email') }}" required autofocus>
                    
                        @if ($errors->has('username') || $errors->has('email'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('username') ?: $errors->first('email') }}</strong>
                            </span>
                        @endif
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope-open"></span>
                            </div>
                        </div>
                    </div>
                    <label for="email"> Masukkan Password </label>
                    <div class="input-group mb-3">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                        <div class="icheck-primary">
                            <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label for="remember">
                            Ingat sesi saya.
                            </label>
                        </div>
                        </div>
                        <div class="col-6">
                        <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                        </div>
                    </div>
                    </form>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
  <!-- /.login-box -->
  
  <!-- jQuery -->
  <script src="{{ asset("/bower_components/admin-lte/plugins/jquery/jquery.min.js" )}}"></script>
  <!-- Bootstrap 4 -->
  <script src="{{ asset("/bower_components/admin-lte/plugins/bootstrap/js/bootstrap.bundle.min.js" )}}"></script>
  <!-- AdminLTE App -->
  <script src="{{ asset("/bower_components/admin-lte/dist/js/adminlte.min.js" )}}"></script>
@endsection
