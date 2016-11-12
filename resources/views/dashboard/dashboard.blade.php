@extends('dashboard.dashlayout')

@section('title')
    Dashboard
@endsection

@section('frame')
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Your information</h3>
                </div>
                <div class="panel-body">
                    <p><h4>{{Auth::user()->username}}</h4></p>
                    <p>Email: {{Auth::user()->email}}</p>
                    <p>Location: {{Auth::user()->location}}</p>
                </div>
            </div>
        </div>
    </div>
@endsection