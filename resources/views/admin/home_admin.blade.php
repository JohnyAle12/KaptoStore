@extends('layouts.admin')

@section('title', 'Panel de inicio')

@section('content')
<input type="hidden" name="_token" value="{{csrf_token()}}" id="token">
<div class="pcoded-wrapper">
    <div class="pcoded-content">
        <div class="pcoded-inner-content">
            <div class="page-header-title">
                <h2 class="m-b-10">Panel de inicio</h2>
            </div>
            <!-- [ breadcrumb ] start -->
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="feather icon-home"></i></a></li>
                <li class="breadcrumb-item"><a href="#">Panel de inicio</a></li>
            </ul>
            <!-- [ breadcrumb ] end -->
            <div class="main-body">
                <div class="page-wrapper">
                    <!-- [ Main Content ] start -->
                    <div class="row">
                        <div class="col-xl-12 col-md-12 mb-3"></div>
                    </div>
                    <!-- [ Main Content ] end -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection