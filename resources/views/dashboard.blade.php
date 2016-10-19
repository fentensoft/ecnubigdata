@extends('dashlayout')

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
                    Email: {{Auth::user()->email}}
                </div>
            </div>
        </div>
    </div>

@endsection