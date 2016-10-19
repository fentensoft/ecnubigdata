@extends('dashlayout')

@section('title')
    {{$video->first()->title}}
@endsection

@section('frame')
    <iframe src="https://www.youtube.com/embed/{{$video->first()->vidid}}" frameborder="0" allowfullscreen></iframe>
@endsection