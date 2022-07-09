<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ config('app.name') }} | @yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- Favicon icon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('dattaable/assets/images/favicon.ico') }}">
    <!-- fontawesome icon -->
    <link rel="stylesheet" href="{{ asset('dattaable/assets/fonts/fontawesome/css/fontawesome-all.min.css') }}">
    <!-- animation css -->
    <link rel="stylesheet" href="{{ asset('dattaable/assets/plugins/animation/css/animate.min.css') }}">
    <!-- vendor css -->
    <link rel="stylesheet" href="{{ asset('dattaable/assets/css/style.css') }}">

    <!-- Principal Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

</head>
    <body>
        <!-- [ Pre-loader ] start -->
        <div class="loader-bg">
            <div class="loader-track">
                <div class="loader-fill"></div>
            </div>
        </div>
        <!-- [ Pre-loader ] End -->
        <!-- [ navigation menu ] start -->
        <nav class="pcoded-navbar">
            <div class="navbar-wrapper">
                <div class="navbar-brand header-logo">
                    <a href="/" class="b-brand">
                        <span class="b-title">{{ config('app.name') }}</span>
                    </a>
                    <a class="mobile-menu" id="mobile-collapse" href="javascript:"><span></span></a>
                </div>
                <div class="navbar-content scroll-div">
                    <ul class="nav pcoded-inner-navbar">
                        <li class="nav-item pcoded-menu-caption">
                            <label>Dashboard</label>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('home') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext">Panel de control</span></a>
                        </li>
                        @if(Auth::user()->roles()->get()->first()->id == 1)
                            @include('layouts.admin_menu')
                        @elseif(Auth::user()->roles()->get()->first()->id == 2)
                            @include('layouts.menu')
                        @elseif(Auth::user()->roles()->get()->first()->id == 3)
                            @include('layouts.menu_provider')
						@elseif(Auth::user()->roles()->get()->first()->id == 4)
                            @include('layouts.menu_agent')
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
        <!-- [ navigation menu ] end -->

        <!-- [ Header ] start -->
        <header class="navbar pcoded-header navbar-expand-lg navbar-light">
            <div class="m-header">
                <a class="mobile-menu" id="mobile-collapse1" href="javascript:"><span></span></a>
                <a href="/" class="b-brand">
                    <span class="b-title">{{ config('app.name') }}</span>
                </a>
            </div>
            <a class="mobile-menu" id="mobile-header" href="javascript:">
                <i class="feather icon-more-horizontal"></i>
            </a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav mr-auto"></ul>
                <ul class="navbar-nav ml-auto">
                    @if(session()->get('impersonted_by'))
                    <li>
                        <div class="dropdown">
                            <a class="text-white" href="{{ route('change.user.stop') }}"><i class="feather icon-airplay"></i> Volver al administrador</a>                            
                        </div>
                    </li>
                    @endif
                    <li>
                        <div class="dropdown drp-user">
                            <a href="javascript:" class="dropdown-toggle" data-toggle="dropdown" style="font-size: 15px">
                                <i class="icon feather icon-user"></i> {{ substr(Auth::user()->name.' '.Auth::user()->lastname, 0, 22) }}
                            </a>
                            <div class="dropdown-menu dropdown-menu-right profile-notification">
                                <div class="pro-head">
                                    <img src="{{ asset('img/profile_images/user.png') }}" class="profile-image" alt="User-Profile-Image">
                                    <span>{{ __('roles.'.Auth::user()->roles()->get()->first()->name) }}</span>
                                    <a href="{{ route('user.index') }}" class="dud-logout" title="Logout">
                                        <i class="feather icon-settings"></i>
                                    </a>
                                </div>
                                <ul class="pro-body">
                                    <li><a href="{{ route('user.index') }}" class="dropdown-item"><i class="feather icon-user"></i> Mi perfil</a></li>
                                    <li>
                                        <a href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="dropdown-item"><i class="feather icon-log-out"></i> Cerrar sesión</a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
											@csrf
										</form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </header>
        <!-- [ Header ] end -->

        <!-- [ Main Content ] start -->
        <div class="pcoded-main-container">
            @yield('content')
        </div>
        <!-- [ Main Content ] end -->

        <!-- Modal -->
        <div class="modal fade" id="modalApp" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header" style="background: linear-gradient(182deg,#5b6377,#3f4c67)!important;">
                    <h5 class="modal-title text-white" id="modalTitle"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="modalBody"></div>
                <div class="modal-footer" id="modalFooter"></div>
                </div>
            </div>
        </div>
        <!-- Modal Large -->
        <div class="modal fade" id="modalAppLg" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                <div class="modal-header" style="background: linear-gradient(182deg,#5b6377,#3f4c67)!important;">
                    <h5 class="modal-title text-white" id="modalTitleLg"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="modalBodyLg"></div>
                <div class="modal-footer" id="modalFooterLg"></div>
                </div>
            </div>
        </div>
        <!-- Modal Extra Large -->
        <div class="modal fade" id="modalAppXl" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                <div class="modal-header" style="background: linear-gradient(182deg,#5b6377,#3f4c67)!important;">
                    <h5 class="modal-title text-white h4" id="modalTitleXl"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="modalBodyXl"></div>
                <div class="modal-footer" id="modalFooterXl"></div>
                </div>
            </div>
        </div>

        <!--   Core JS Files   -->
	    <script src="{{ asset('dattaable/assets/plugins/jquery/js/jquery.3.2.1.min.js') }}"></script>

        <!-- Required Js -->
        <script src="{{ asset('dattaable/assets/js/vendor-all.min.js') }}"></script>
        <script src="{{ asset('dattaable/assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('dattaable/assets/js/pcoded.min.js') }}"></script>

        <!-- Datatables -->
	    <script src="{{ asset('dattaable/assets/plugins/datatables/datatables.min.js') }}"></script>

        <!-- Principal Scripts -->
        <script src="{{ mix('js/app.js') }}"></script>
        <script src="{{ mix('js/bundle.private.js') }}"></script>

        @include('layouts.alerts')
        @yield('scripts')

    </body>
</html>
