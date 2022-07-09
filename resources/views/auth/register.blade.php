@extends('layouts.admin_login')

@section('title', 'Registrarse')

@section('content')
<div class="auth-wrapper">
	<div class="auth-content">
		<div class="card">
			<form id="register-form" method="POST" action="{{ route('register') }}">
				@csrf
				<div class="card-body text-center">
					<div class="mb-4">
						<i class="feather icon-user-plus auth-icon"></i>
					</div>
					<h3 class="mb-4">Registrarse</h3>
					<div class="input-group mb-3">
						<input id="document_id" type="text" class="form-control @error('document_id') is-invalid @enderror" name="document_id" value="{{ old('document_id') }}" placeholder="Identificación" required autocomplete="document_id" autofocus>
						@error('document_id')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
						@enderror
					</div>
					<div class="input-group mb-3">
						<input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Nombres" required autocomplete="name" autofocus>
						@error('name')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
						@enderror
					</div>
					<div class="input-group mb-3">
						<input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}" placeholder="Apellidos" required autocomplete="lastname" autofocus>
						@error('lastname')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
						@enderror
					</div>
					<div class="input-group mb-3">
						<input type="tel" id="phone" type="text" placeholder="Celular del contacto" class="form-control @error('mobile') is-invalid @enderror" value="{{ old('mobile') }}" required autocomplete="mobile" autofocus>
						<input type="hidden" id="mobile" name="mobile" value="{{ old('mobile') }}">
						<span id="valid-msg" class="d-none text-success">✓ Válido</span>
						<span id="error-msg" class="d-none text-danger"></span>
						@error('mobile')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
						@enderror
					</div>
					<div class="input-group mb-3">
						<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Correo electrónico" required autocomplete="email">
						@error('email')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
						@enderror
					</div>
					<div class="input-group mb-3">
						<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" placeholder="Contraseña" required autocomplete="new-password">
						@error('password')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
						@enderror
					</div>
					<div class="input-group mb-3">
						<input type="password" class="form-control" name="password_confirmation" placeholder="Confirmar contraseña" required autocomplete="new-password">
					</div>
					<button class="btn btn-primary shadow-2 mb-4">Registrarse</button>
					<p class="mb-0 text-muted">Ya me encuentro registrado <a href="{{ route('login') }}">Iniciar sesión</a></p>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection
