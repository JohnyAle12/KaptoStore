@extends('layouts.admin')

@section('title', 'Asignar perfiles')

@section('content')
<div class="pcoded-wrapper">
    <div class="pcoded-content">
        <div class="pcoded-inner-content">
            <div class="page-header-title">
                <h2 class="m-b-10">Asignar perfiles</h2>
            </div>
            <!-- [ breadcrumb ] start -->
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="feather icon-home"></i></a></li>
                <li class="breadcrumb-item"><a href="#">Asignar perfiles</a></li>
            </ul>
            <!-- [ breadcrumb ] end -->
            <div class="main-body">
                <div class="page-wrapper">
                    <!-- [ Main Content ] start -->
                    <div class="row">
                        <div class="col-xl-4 col-md-4 mb-3">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Asignar perfiles</h5>
                                </div>
                                <div class="card-body">
                                    <form method="POST" action="{{ route('save.assign.profile') }}" role="form">
                                        @csrf
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group ">
                                                    <label for="document_id">Número de identificación</label>
                                                    <input id="document_id" type="text" class="form-control @error('document_id') is-invalid @enderror" name="document_id" value="{{ old('document_id') }}" required autocomplete="document_id" autofocus>
                                                    @error('document_id')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="role">Rol de usuario</label>
                                                    <select id="role" name="role" class="form-control @error('role') is-invalid @enderror" required>
                                                        <option value="">Seleccionar</option>
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
                                            </div>
                                        </div>
                                        <button class="btn btn-success">Asignar</button>
                                    </form>
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