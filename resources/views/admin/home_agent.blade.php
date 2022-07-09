@extends('layouts.admin')

@section('title', 'Panel de control')

@section('content')
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
                      <div id="home_content" class="col-xl-12 col-md-12 mb-3">
                        <div class="row">
                          
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