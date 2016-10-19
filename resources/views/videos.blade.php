@extends('dashlayout')

@section('title')
    Videos
@endsection

@section('frame')
    <div class="row">
        @foreach($videos as $video)
        <div class="col-md-4">
            <div class="thumbnail">
                <a href="{{route('watchvid', $video->id)}}"><img src="http://img.youtube.com/vi/{{$video->vidid}}/sddefault.jpg" alt=""></a>
                <div class="caption">
                    <h4>{{$video->title}}</h4>
                    <p>{{$video->description}}</p>
                </div>
            </div>
        </div>
        @endforeach

    </div>
    {{$videos->links()}}
@endsection