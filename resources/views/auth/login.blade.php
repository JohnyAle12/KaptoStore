@extends('layouts.admin_login')

@section('title', 'Iniciar sesión')

@section('content')
<div class="auth-wrapper">
  <div class="auth-content">
      <div class="card">
        <form action="{{ route('login') }}" method="POST">
          @csrf
          <div class="card-body text-center">
              <div class="mb-4">
                  <i class="feather icon-unlock auth-icon"></i>
              </div>
              <h3 class="mb-4">Iniciar sesión</h3>
              <div class="input-group mb-3">
                  <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Correo electrónico" value="{{ old('email') }}" required autocomplete="email" autofocus>
                  @error('email')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
              <div class="input-group mb-4">
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Contraseña" required autocomplete="current-password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <div class="form-group text-left">
                  <div class="checkbox checkbox-fill d-inline">
                      <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                      <label for="remember" class="cr"> Recuérdame</label>
                  </div>
              </div>
              <button class="btn btn-primary shadow-2 mb-4">Iniciar Sesión</button>
              <p class="mb-2 text-muted">¿Olvidaste tu contraseña? <a href="{{ route('password.request') }}">Recuperar</a></p>
              <p class="mb-0 text-muted">¿No tienes una cuenta aún? <a href="{{ route('register') }}">Registrate</a></p>
          </div>
        </form>
      </div>
  </div>
</div>
@endsection