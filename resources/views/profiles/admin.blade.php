@extends('layouts.admin')

@section('title', 'Crear perfiles')

@section('content')
<input type="hidden" name="_token" value="{{csrf_token()}}" id="token">
<div class="pcoded-wrapper">
    <div class="pcoded-content">
        <div class="pcoded-inner-content">
            <div class="page-header-title">
                <h2 class="m-b-10">Administrar perfiles</h2>
            </div>
            <!-- [ breadcrumb ] start -->
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="feather icon-home"></i></a></li>
                <li class="breadcrumb-item"><a href="#">Administrar perfiles</a></li>
            </ul>
            <!-- [ breadcrumb ] end -->
            <div class="main-body">
                <div class="page-wrapper">
                    <!-- [ Main Content ] start -->
                    <div class="row">
                        <div class="col-xl-4 col-md-4 mb-3">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Administrar perfiles</h5>
                                </div>
                                <div class="card-body">
                                    <form method="POST" action="{{ route('save.profile.transaction') }}" role="form">
                                        @csrf
                                        <div class="row">
                                            <div class="col-sm-12">
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
                                                <div class="form-group">
                                                    <label for="transaction">Transacción</label>
                                                    <select id="transaction" name="transaction" class="form-control @error('transaction') is-invalid @enderror" required>
                                                        <option value="">Seleccionar</option>
                                                        @foreach ($categories as $category)
                                                            <optgroup label="{{ $category->category }}">
                                                                @foreach ($transactions->where('category', $category->category) as $transaction)
                                                                    <option value="{{ $transaction->id }}" {{ old('role') == $transaction->id ? 'selected':'' }}>{{ $transaction->name }}</option>
                                                                @endforeach
                                                            </optgroup>
                                                        @endforeach
                                                    </select>
                                        
                                                    @error('transaction')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <button class="btn btn-success">Crear</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-8 col-md-8 mb-3">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Perfil - Transacciones</h5>
                                </div>
                                <div class="card-body">
                                    <table id="profiles-transactions-table" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Perfil</th>
                                                <th>Transacción</th>
                                                <th>Eliminar</th>
                                            </tr>
                                        </thead>
                                    </table>
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