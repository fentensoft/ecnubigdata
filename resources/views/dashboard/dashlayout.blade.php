@extends('master')

@section('styles')
    <link href="css/sb-admin.css" rel="stylesheet">
@endsection

@section('body')
    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-fixed-top" role="navigation" style="background-color: #2C3E50;">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Bigdata</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> {{Auth::user()->username}} <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="{{route('admin')}}"><i class="fa fa-fw fa-gear"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="{{route('logout')}}"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li @if(Route::is('dashboard'))class="active"@endif>
                        <a href="{{route('dashboard')}}"><i class="glyphicon glyphicon-info-sign"></i> Information</a>
                    </li>
                    @if(Auth::user()->class == 4)
                    <li @if(Route::is('admin'))class="active"@endif>
                        <a href="{{route('admin')}}"><i class="glyphicon glyphicon-cog"></i> Admin</a>
                    </li>
                    @endif
                    <li><a href="http://{{config('app.jupyterhub_host')}}/" target="_blank"><i class="glyphicon glyphicon-record"></i> Jupyter</a></li>
                    <li><a href="http://{{config('app.rstudio_host')}}" target="_blank" rel="noreferrer"><i class="glyphicon glyphicon-record"></i> Rstudio</a></li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">
            <div class="container-fluid">
                @yield('frame')
            </div>
        </div>
    </div>
@endsection