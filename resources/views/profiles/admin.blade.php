@extends('layouts.admin')

@section('title', 'Crear perfiles')

@section('content')
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
                                    <h5>Administrar perfiles - pendiente ...</h5>
                                </div>
                                <div class="card-body">
                                    <form method="POST" action="{{ route('save.profile') }}" role="form">
                                        @csrf
                                        {{-- <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group ">
                                                    <label for="name">Nombre</label>
                                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                                    @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <button class="btn btn-success">Crear</button> --}}
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