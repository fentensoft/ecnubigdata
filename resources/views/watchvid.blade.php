@extends('dashlayout')

@section('title')
    {{$video->first()->title}}
@endsection

@section('frame')
    <div class="row">
        <div class="col-md-8">
            <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{{$video->first()->vidid}}" frameborder="0" allowfullscreen></iframe>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel panel-warning">
                <div class="panel-heading">
                    <h3 class="panel-title">{{$video->first()->title}} <span class="label label-info">{{$video->first()->cate->catename}}</span></h3>
                </div>
                <div class="panel-body">
                    <p>{{$video->first()->description}}</p>
                    <p>Publisher: {{$video->first()->pub->realname}}</p>
                </div>
            </div>
        </div>
    </div>
@endsection