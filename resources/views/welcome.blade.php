@extends('master')

@section('title')
Bigdata
@endsection

@section('content')
    <div class="container">
    @if($errors->any())
        @foreach($errors->all() as $error)
            <div class="alert alert-info" role="alert">{{$error}}</div>
        @endforeach
    @endif
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Sign Up</h3>
                    </div>
                    <div class="panel-body">
                        <form action="{{route("signup")}}" method="post">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="email">Your E-Mail</label>
                                <input class="form-control" type="text" name="email" id="email"></input>
                            </div>
                            <div class="form-group">
                                <label for="password">Your password</label>
                                <input class="form-control" type="password" name="password" id="password"></input>
                            </div>
                            <div class="form-group">
                                <label for="realname">Your Real Name</label>
                                <input class="form-control" type="text" name="realname" id="realname"></input>
                            </div>
                            <div class="form-group">
                                <label for="location">Your Location</label>
                                <input class="form-control" type="text" name="location" id="location"></input>
                            </div>
                            <button type="submit" class="btn btn-primary">Register</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <h3 class="panel-title">Sign In</h3>
                    </div>
                    <div class="panel-body">
                        <form action="{{route("signin")}}" method="post">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="email">Your E-Mail</label>
                                <input class="form-control" type="text" name="email" id="email"></input>
                            </div>
                            <div class="form-group">
                                <label for="password">Your password</label>
                                <input class="form-control" type="password" name="password" id="password"></input>
                            </div>
                            <button type="submit" class="btn btn-primary">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection