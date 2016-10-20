@extends('master')

@section('title')
Bigdata
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-offset-2 col-md-8">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <h3 class="panel-title">Sign In</h3>
                    </div>
                    <div class="panel-body">
                        <form action="{{route("postsignin")}}" method="post" id="signin">
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
                            <p align="center"><a href="{{route("signup")}}">I want to sign up a new account.</a></p>
                            <div align="center"><button type="submit" class="btn btn-success">Login</button></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection