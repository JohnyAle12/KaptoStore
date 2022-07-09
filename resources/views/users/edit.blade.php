@extends('layouts.admin')

@section('title', 'Editar usuario')

@section('content')
<div class="pcoded-wrapper">
    <div class="pcoded-content">
        <div class="pcoded-inner-content">
            <div class="page-header-title">
                <h2 class="m-b-10">Edición de usuario</h2>
            </div>
            <!-- [ breadcrumb ] start -->
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="feather icon-home"></i></a></li>
                @if($op == 'agents')
                    <li class="breadcrumb-item"><a href="{{ route('agent.index') }}">Administración de agentes</a></li>
                @else
                    <li class="breadcrumb-item"><a href="{{ route('admin.users') }}">Administración de usuarios</a></li>
                @endif
                <li class="breadcrumb-item"><a href="#">Edición usuario</a></li>
            </ul>
            <!-- [ breadcrumb ] end -->
            <div class="main-body">
                <div class="page-wrapper">
                    <!-- [ Main Content ] start -->
                    <div class="row">
                        <div class="col-xl-12 col-md-12 mb-3">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Editar usuarios</h5>
                                </div>
                                <div class="card-body">
                                    <form id="usuario-form" method="POST" action="{{ route('user.update', $usuario->account) }}" enctype="multipart/form-data" role="form">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="from" value="{{ md5(now()) }}">
                                        <input type="hidden" name="op" value="{{ $op }}">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group ">
                                                    <label for="document_id" >Número de identificación</label>
                                                    <input id="document_id" type="text" class="form-control @error('document_id') is-invalid @enderror" name="document_id" value="{{ $usuario->document_id }}" required autocomplete="document_id" autofocus>
                                                    @error('document_id')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="name">{{ __('Name') }}</label>
                                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $usuario->name }}" required autocomplete="name" autofocus>
                                                    @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group ">
                                                    <label for="lastname">{{ __('LastName') }}</label>
                                                    <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ $usuario->lastname }}" required autocomplete="lastname" autofocus>
                                        
                                                    @error('lastname')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group ">
                                                    <label for="mobile" >{{ __('Mobile') }}</label>
                                                    <div style="width: 100%;">
                                                        <input type="tel" id="phone" type="text" placeholder="Celular del contacto" class="form-control @error('mobile') is-invalid @enderror" value="{{ $usuario->mobile }}" required autocomplete="mobile" autofocus>
                                                        <input type="hidden" id="mobile" name="mobile" value="{{ $usuario->mobile }}" required>
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
                                                <div class="form-group ">
                                                    <label for="city">Ciudad</label>
                                                    <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ $usuario->city }}" autocomplete="city" autofocus>
                                                </div>
                                                <div class="form-group ">
                                                    <label for="address" >Dirección</label>
                                                    <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ $usuario->address }}" autocomplete="address" autofocus>
                                                </div>
                                                <div class="form-group">
                                                    <label for="email">{{ __('E-Mail Address') }}</label>
                                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $usuario->email }}" required autocomplete="email">
                                    
                                                    @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <button class="btn btn-success" id="btn-usuario-form">Actualizar usuario</button>
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