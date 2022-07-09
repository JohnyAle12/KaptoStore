@extends('layouts.admin')

@section('title', 'Panel de control')

@section('content')
<input type="hidden" name="_token" value="{{csrf_token()}}" id="token">
<div class="pcoded-wrapper">
    <div class="pcoded-content">
        <div class="pcoded-inner-content">
            <div class="page-header-title">
                <h2 class="m-b-10">Panel de control</h2>
            </div>
            <!-- [ breadcrumb ] start -->
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="feather icon-home"></i></a></li>
                <li class="breadcrumb-item"><a href="#">Panel de control</a></li>
            </ul>
            <!-- [ breadcrumb ] end -->
            <div class="main-body">
                <div class="page-wrapper">
                    <!-- [ Main Content ] start -->
                    <div class="row">
                        <div class="col-xl-12 col-md-12 mb-3">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Solicitudes de retiro</h5>
                                </div>
                                <div class="card-body">
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