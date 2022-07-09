@extends('layouts.admin_login')

@section('title', 'Recuperar contraseña')

@section('content')
<div class="auth-wrapper">
	<div class="auth-content">
		<div class="card">
			@if (session('status'))
				<div class="alert alert-success" role="alert">
					{{ session('status') }}
				</div>
			@endif
			<form method="POST" action="{{ route('password.update') }}">
				@csrf
				<input type="hidden" name="token" value="{{ $token }}">
				<div class="card-body text-center">
					<div class="mb-4">
						<i class="feather icon-unlock auth-icon"></i>
					</div>
					<h3 class="mb-4">Recuperar contraseña</h3>
					<div class="input-group mb-3">
						<input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Correo electrónico" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
						@error('email')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
						@enderror
					</div>
					<div class="input-group mb-3">
						<input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Contraseña" required autocomplete="current-password">
						@error('password')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
						@enderror
					</div>
					<div class="input-group mb-3">
						<input type="password" class="form-control" name="password_confirmation" placeholder="Confirmar contraseña" required autocomplete="new-password">
					</div>
					<button class="btn btn-primary shadow-2 mb-4">Cambiar contraseña</button>
					<p class="mb-0 text-muted">Ya me encuentro registrado <a href="{{ route('login') }}">Iniciar sesión</a></p>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection