@extends('master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <div class="well sidebar-nav">
                    <h4><i class="glyphicon glyphicon-dashboard"></i>
                        <small><b>DASHBOARD</b></small></h4>
                    <ul class="nav nav-pills nav-stacked">
                        <li @if(Route::is('dashboard'))class="active"@endif><a href="{{route('dashboard')}}"><i class="glyphicon glyphicon-info-sign"></i> Information</a></li>
                        <li @if(Route::is('videos'))class="active"@endif><a href="{{route('videos')}}"><i class="glyphicon glyphicon-play-circle"></i> Videos</a></li>
                        <li class="nav-divider"></li>
                        @if(Auth::user()->class >= 3)
                            <li><a href="{{route('submitvideo')}}"><i class="glyphicon glyphicon-cog"></i> Submit Video</a></li>
                        @endif
                        @if(Auth::user()->class == 4)
                            <li><a href="{{route('admin')}}"><i class="glyphicon glyphicon-cog"></i> Admin</a></li>
                        @endif
                        <li><a href="{{route('logout')}}"><i class="glyphicon glyphicon-log-out"></i> Logout</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-9">
                @if($errors->any())
                            @foreach($errors->all() as $error)
                                <div class="alert alert-info" role="alert">{{$error}}</div>
                            @endforeach
                @endif
                @yield('frame')
            </div>
        </div>
    </div>
@endsection