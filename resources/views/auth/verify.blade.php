@extends('layouts.admin')

@section('title', 'Inicio')

@section('title-head')
  <div class="col-sm-6">
    <h1 class="m-0 text-dark">{{ __('Verify Your Email Address') }}</h1>
  </div>
@stop

@section('content')
  <div class="col">
    <div class="card-body">
        @if (session('resent'))
            <div class="alert alert-success" role="alert">
                {{ __('A fresh verification link has been sent to your email address.') }}
            </div>
        @endif
        Para activar las funciones de tu cuenta, debes verificar que actualmente controlas tu cuenta, por ello enviamos un correo electrónico con un enlace de confirmación.
        {{ __('Before proceeding, please check your email for a verification link.') }}
        {{ __('If you did not receive the email') }},
        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
            @csrf
            <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
        </form>
    </div>
  </div>
@stop