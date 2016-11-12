@extends('master')

@section('title')
    Register a new account
@endsection

@section('body')
    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top navbar-dashboard">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="{{route("home")}}">Bigdata</a>
            </div>
        </div>
        <!-- /.container-fluid -->
    </nav>
    <br>
    <div class="container" style="padding-top: 50px;">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>Sign Up</h2>
                <hr class="star-primary">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <form action="{{route("postsignup")}}" method="post" id="signup">
                    {{csrf_field()}}
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Username</label>
                            <input class="form-control" type="text" name="username" id="username" placeholder="Enter a username">
                        </div>
                    </div>
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Email</label>
                            <input class="form-control" type="text" name="email" id="email" placeholder="Enter your email">
                        </div>
                    </div>
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Password</label>
                            <input class="form-control" type="password" name="password" id="password" placeholder="Enter your password">
                        </div>
                    </div>
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Location</label>
                            <input class="form-control" type="text" name="location" id="location" placeholder="Enter your location">
                        </div>
                    </div>
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Phone</label>
                            <input class="form-control" type="text" name="phone" id="phone" placeholder="Enter your phone number">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-xs-12" align="center">
                            <p align="center"><a href="{{route("signin")}}"><br>I already have an account.</a></p>
                            <div align="center"><button type="submit" class="btn btn-primary btn-lg">Register</button></div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
    <footer class="text-center">
        <div class="footer-below">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        Copyright &copy; Bigdata 2016
                    </div>
                </div>
            </div>
        </div>
    </footer>
@endsection

@section('scripts')
    @include('script')
@endsection