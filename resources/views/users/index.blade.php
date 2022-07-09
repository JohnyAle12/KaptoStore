@extends('layouts.admin')

@section('title', 'Mi perfil')

@section('content')
<div class="pcoded-wrapper">
    <div class="pcoded-content">
        <div class="pcoded-inner-content">
            <div class="page-header-title">
                <h2 class="m-b-10">Mi perfil</h2>
            </div>
            <!-- [ breadcrumb ] start -->
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="feather icon-home"></i></a></li>
                <li class="breadcrumb-item"><a href="#">Mi perfil</a></li>
            </ul>
            <!-- [ breadcrumb ] end -->
            <div class="main-body">
                <div class="page-wrapper">
                    <!-- [ Main Content ] start -->
                    <div class="row mt-3">
                        <div class="col-xl-6 col-md-12 mb-3">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Administra y actualiza tu información de contacto</h5>
                                </div>
                                <div class="card-body">
                                    <form id="profile-form" method="POST" action="{{ route('user.update', Auth::user()->account) }}" enctype="multipart/form-data" role="form">
                                        @csrf
                                        @method('PUT')
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="name">{{ __('Name') }}</label>
                                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name ?: old('name') }}" required autocomplete="name" autofocus>
                                                    @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group ">
                                                    <label for="lastname">{{ __('LastName') }}</label>
                                                    <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ $user->lastname ?: old('lastname') }}" required autocomplete="lastname" autofocus>
                                        
                                                    @error('lastname')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group ">
                                                    <label for="document_id" >Número de identificación</label>
                                                    <input id="document_id" type="text" class="form-control @error('document_id') is-invalid @enderror" name="document_id" value="{{ $user->document_id ?: old('document_id') }}" required autocomplete="document_id" autofocus>
                                                    @error('document_id')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group ">
                                                    <label for="mobile" >{{ __('Mobile') }}</label><br>
                                                    <div style="width: 100%;">
                                                        <input type="tel" id="phone" type="text" placeholder="Celular del contacto" class="form-control @error('mobile') is-invalid @enderror" value="{{ $user->mobile ?: old('mobile') }}" required autocomplete="mobile" autofocus>
                                                        <input type="hidden" id="mobile" name="mobile" value="{{ $user->mobile ?: old('mobile') }}">
                                                        <span id="valid-msg" class="d-none text-success">✓ Válido</span>
                                                        <span id="error-msg" class="d-none text-danger"></span>
                                                    </div>
                                                    @error('mobile')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group ">
                                                    <label for="city">Ciudad</label>
                                                    <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ $user->city ?: old('city') }}" autocomplete="city" autofocus>
                                                </div>
                                                <div class="form-group ">
                                                    <label for="address" >Dirección</label>
                                                    <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ $user->address ?: old('address') }}" autocomplete="address" autofocus>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <button class="btn btn-success" id="btn-profile-form">Actualizar información</button>
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