@extends('layouts.admin')

@section('title', 'Administración de usuarios')

@section('content')
  <input type="hidden" name="_token" value="{{csrf_token()}}" id="token">
  <div class="pcoded-wrapper">
    <div class="pcoded-content">
        <div class="pcoded-inner-content">
            <div class="page-header-title">
                <h2 class="m-b-10">Administración de usuarios</h2>
            </div>
            <!-- [ breadcrumb ] start -->
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="feather icon-home"></i></a></li>
                <li class="breadcrumb-item"><a href="#">Administración de usuarios</a></li>
            </ul>
            <!-- [ breadcrumb ] end -->
            <div class="main-body">
                <div class="page-wrapper">
                    <!-- [ Main Content ] start -->
                    <div class="row">
                        <div class="col-xl-12 col-md-12 mb-3">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Administración de usuarios</h5>
                                </div>
                                <div class="card-body">
                                    <table id="users-table" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Fecha de registro</th>
                                                <th>Nombres y apellidos</th>
                                                <th>Identificación</th>
                                                <th>Perfiles</th>
                                                <th>Datos contacto</th>
                                                <th>Aprobar</th>
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

@stop