@extends('admin.layout.master')

@section('body')
    <body class="horizontal-layout horizontal-menu 2-columns   menu-expanded" data-open="click" data-menu="horizontal-menu" data-col="2-columns">
    <!-- fixed-top-->
    <nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-static-top navbar-light navbar-border navbar-brand-center">
        <div class="navbar-wrapper">
            <div class="navbar-header">
                <ul class="nav navbar-nav flex-row">
                    <li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu font-large-1"></i></a></li>
                    <li class="nav-item"><a class="navbar-brand" href="{{url('/admin/home')}}"><img class="brand-logo" alt="stack admin logo" src="{{asset('admin-asset/app-assets/images/logo/stack-logo.png')}}">
                            <h2 class="brand-text">Stack</h2></a></li>
                    <li class="nav-item d-md-none"><a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i class="fa fa-ellipsis-v"></i></a></li>
                </ul>
            </div>
            <div class="navbar-container container center-layout">
                <div class="collapse navbar-collapse" id="navbar-mobile">
                    <ul class="nav navbar-nav mr-auto float-left">
                        <li class="nav-item d-none d-md-block"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu"></i></a></li>

                        <li class="nav-item d-none d-md-block"><a class="nav-link nav-link-expand" href="#"><i class="ficon ft-maximize"></i></a></li>
                        <li class="nav-item nav-search"><a class="nav-link nav-link-search" href="#"><i class="ficon ft-search"></i></a>
                            <div class="search-input">
                                <form method="post" action="{{url('admin/search')}}">
                                    {{csrf_field()}}
                                    <input class="input" type="text" placeholder="Find Client...">
                                </form>
                            </div>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav float-right">

                        <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown"><span class="avatar avatar-online"><img src="{{asset('admin-asset/app-assets/images/portrait/small/avatar-s-1.png')}}" alt="avatar"><i></i></span><span class="user-name">Admin</span></a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="{{url('admin/logout')}}"><i class="ft-power"></i> Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <!-- ////////////////////////////////////////////////////////////////////////////-->
    <!-- Horizontal navigation-->
    <div class="header-navbar navbar-expand-sm navbar navbar-horizontal navbar-fixed navbar-light navbar-without-dd-arrow navbar-shadow menu-border" role="navigation" data-menu="menu-wrapper">
        <!-- Horizontal menu content-->
        <div class="navbar-container main-menu-content container center-layout" data-menu="menu-container">
            <!-- include ../../../includes/mixins-->
            <ul class="nav navbar-nav" id="main-menu-navigation" data-menu="menu-navigation">
                <li class="dropdown nav-item"><a class="nav-link" href="{{url('/admin/home')}}"><i class="ft-home"></i><span>Dashboard</span></a></li>
                <li class="dropdown nav-item"><a class="nav-link" href="{{url('/admin/clients')}}"><i class="ft-user"></i><span>Clients</span></a></li>
                <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown"><i class="ft-zap"></i><span>Ranks</span></a>
                    <ul class="dropdown-menu">

                        <li data-menu=""><a class="dropdown-item" href="{{url('admin/rank/1')}}" data-toggle="dropdown">Rank 1
                                <submenu class="name"></submenu></a>
                        </li>
                        <li class="dropdown-divider"></li>
                        <li data-menu=""><a class="dropdown-item" href="{{url('admin/rank/2')}}" data-toggle="dropdown">Rank 2
                                <submenu class="name"></submenu></a>
                        </li>
                        <li data-menu=""><a class="dropdown-item" href="{{url('admin/rank/3')}}" data-toggle="dropdown">Rank 3
                                <submenu class="name"></submenu></a>
                        </li>
                        <li data-menu=""><a class="dropdown-item" href="{{url('admin/rank/4')}}" data-toggle="dropdown">Rank 4
                                <submenu class="name"></submenu></a>
                        </li>
                        <li class="dropdown-divider"></li>
                        <li data-menu=""><a class="dropdown-item" href="{{url('admin/rank/5')}}" data-toggle="dropdown">Rank 5
                                <submenu class="name"></submenu></a>
                        </li>
                        <li data-menu=""><a class="dropdown-item" href="{{url('admin/rank/6')}}" data-toggle="dropdown">Rank 6
                                <submenu class="name"></submenu></a>
                        </li>
                        <li data-menu=""><a class="dropdown-item" href="{{url('admin/rank/7')}}" data-toggle="dropdown">Rank 7
                                <submenu class="name"></submenu></a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- /horizontal menu content-->
    </div>
    <!-- Horizontal navigation-->

    <div class="container app-content center-layout mt-2">
        @yield('content')
    </div>

    {{--<footer class="footer footer-static footer-light navbar-shadow">--}}
        {{--<p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2 container center-layout"><span class="float-md-left d-block d-md-inline-block">Copyright  &copy; 2018 , All rights reserved. </span><span class="float-md-right d-block d-md-inline-block d-none d-lg-block">Global Food Hub <i class="ft-heart pink"></i></span></p>--}}
    {{--</footer>--}}

@endsection