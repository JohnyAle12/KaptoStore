@extends('layouts.admin')

@section('title', 'Crear usuarios')

@section('content')
<div class="pcoded-wrapper">
    <div class="pcoded-content">
        <div class="pcoded-inner-content">
            <div class="page-header-title">
                <h2 class="m-b-10">Creación usuarios</h2>
            </div>
            <!-- [ breadcrumb ] start -->
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="feather icon-home"></i></a></li>
                <li class="breadcrumb-item"><a href="#">Crear usuarios</a></li>
            </ul>
            <!-- [ breadcrumb ] end -->
            <div class="main-body">
                <div class="page-wrapper">
                    <!-- [ Main Content ] start -->
                    <div class="row">
                        <div class="col-xl-8 col-md-8 mb-3">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Crear usuarios</h5>
                                </div>
                                <div class="card-body">
                                    <form id="usuario-form" method="POST" action="{{ route('user.store') }}" enctype="multipart/form-data" role="form">
                                        @csrf
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group ">
                                                    <label for="document_id" >Número de identificación</label>
                                                    <input id="document_id" type="text" class="form-control @error('document_id') is-invalid @enderror" name="document_id" value="{{ old('document_id') }}" required autocomplete="document_id" autofocus>
                                                    @error('document_id')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="name">{{ __('Name') }}</label>
                                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                                    @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group ">
                                                    <label for="lastname">{{ __('LastName') }}</label>
                                                    <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}" required autocomplete="lastname" autofocus>
                                        
                                                    @error('lastname')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="role">Rol de usuario</label>
                                                    <select id="role" name="role" class="form-control @error('role') is-invalid @enderror" required>
                                                        <option>Seleccionar</option>
                                                        @foreach ($roles as $role)
                                                            <option value="{{ $role->id }}" {{ old('role') == $role->id ? 'selected':'' }}>{{ $role->name }}</option>
                                                        @endforeach
                                                    </select>
                                        
                                                    @error('role')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group ">
                                                    <label for="mobile" >{{ __('Mobile') }}</label>
                                                    <div style="width: 100%;">
                                                        <input type="tel" id="phone" type="text" placeholder="Celular del contacto" class="form-control @error('mobile') is-invalid @enderror" value="{{ old('mobile') }}" required autocomplete="mobile" autofocus>
                                                        <input type="hidden" id="mobile" name="mobile" value="{{ old('mobile') }}" required>
                                                        <span id="valid-msg" class="d-none text-success">✓ Válido</span>
                                                        <span id="error-msg" class="d-none text-danger"></span>
                                                    </div>
                                                    @error('mobile')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="city">Ciudad</label>
                                                    <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ old('city') }}" autocomplete="city" autofocus>
                                                </div>
                                                <div class="form-group ">
                                                    <label for="address" >Dirección</label>
                                                    <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" autocomplete="address" autofocus>
                                                </div>
                                                <div class="form-group">
                                                    <label for="email">{{ __('E-Mail Address') }}</label>
                                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                    
                                                    @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="password">{{ __('Password') }}</label>
                                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                    
                                                    @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                    
                                                <div class="form-group">
                                                    <label for="password-confirm">{{ __('Confirm Password') }}</label>
                                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <button class="btn btn-success" id="btn-usuario-form">Crear usuario</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- [ Main Content ] end -->
                </div>
            </div>
        </div>
    </div>
</div>

@endsection