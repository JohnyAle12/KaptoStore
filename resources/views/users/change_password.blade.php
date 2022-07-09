@extends('layouts.admin')

@section('title', 'Cambiar contraseña')

@section('content')
<div class="pcoded-wrapper">
    <div class="pcoded-content">
        <div class="pcoded-inner-content">
            <div class="page-header-title">
                <h2 class="m-b-10">Cambiar contraseña</h2>
            </div>
            <!-- [ breadcrumb ] start -->
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="feather icon-home"></i></a></li>
                <li class="breadcrumb-item"><a href="#">Cambiar contraseña</a></li>
            </ul>
            <!-- [ breadcrumb ] end -->
            <div class="main-body">
                <div class="page-wrapper">
                    <!-- [ Main Content ] start -->
                    <div class="row">
                        <div class="col-xl-6 col-md-6 mb-3">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Cambiar contraseña</h5>
                                </div>
                                <div class="card-body">
                                    <form id="password-form" method="POST" action="{{ route('password.user.update', $user->account) }}" role="form">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group">
                                            <label for="password-actual">Contraseña actual</label>
                                            <input type="password" class="form-control @error('password_actual') is-invalid @enderror" id="password-actual" name="password_actual" required>
                                            @error('password_actual')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Contraseña nueva</label>
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required >
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="password-confirm">{{ __('Confirm Password') }}</label>
                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                        </div>
                                    </form>
                                    <button class="btn btn-success" onclick="event.preventDefault();document.getElementById('password-form').submit();">Actualizar contraseña</button>
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

@stop