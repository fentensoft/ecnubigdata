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
                    <h5><b>{{$video->title}}</b></h5>
                    <p>
                        <span class="label label-info">{{$video->cate->catename}}</span>
                        @if(Auth::user()->class >= 3)
                            @if($video->published)
                                <span class="label label-success">Published</span>
                            @else
                                <span class="label label-danger">Unpublished</span>
                            @endif
                        @endif
                    </p>
                    <p>{{str_limit($video->description, $limit = 45, $end = '...')}}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div align="center">{{$videos->links()}}</div>
@endsection