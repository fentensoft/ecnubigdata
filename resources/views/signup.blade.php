@extends('master')

@section('title')
    Signup
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-offset-2 col-md-8">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Sign Up</h3>
                    </div>
                    <div class="panel-body">
                        <form action="{{route("postsignup")}}" method="post" id="signup">
                            {{csrf_field()}}
                            <div class="input-group">
                                <input class="form-control" type="text" name="email" id="email" placeholder="Enter your email"></input>
                                <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                            </div>
                            <p></p>
                            <div class="input-group">
                                <input class="form-control" type="password" name="password" id="password" placeholder="Enter your password"></input>
                                <span class="input-group-addon"><i class="glyphicon glyphicon-asterisk"></i></span>
                            </div>
                            <p></p>
                            <div class="input-group">
                                <input class="form-control" type="text" name="realname" id="realname" placeholder="Enter your name"></input>
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            </div>
                            <p></p>
                            <div class="input-group">
                                <input class="form-control" type="text" name="location" id="location" placeholder="Enter your location"></input>
                                <span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span>
                            </div>
                            <p></p>
                            <p align="center"><a href="{{route("home")}}">I already have an account.</a></p>
                            <div align="center"><button type="submit" class="btn btn-primary">Register</button></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection