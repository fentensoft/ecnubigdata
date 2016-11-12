@extends('dashlayout')

@section('title')
    Videos
@endsection

@section('frame')
    <ol class="breadcrumb">
        <li>Bigdata</li>
        <li><a href="{{route('videos')}}">Videos</a></li>
        @if(isset($tag))
            <li>{{$tag}}</li>
        @endif
    </ol>
    <table class="table table-hover">
        <thead>
        <tr>
            <th width="25%">Thumbnails</th>
            <th width="25%">Title</th>
            <th width="50%">Description</th>
        </tr>
        </thead>
        <tbody>
        @foreach($videos as $video)
        <tr>
            <td><div class="thumbnail"><a href="{{route('watchvid', $video->id)}}"><img src="http://img.youtube.com/vi/{{$video->vidid}}/sddefault.jpg" alt=""></a></div></td>
            <td>{{$video->title}}
                <p>
                    <a href="{{route('videos_tag', $video->cate->catename)}}"><span class="label label-info">{{$video->cate->catename}}</span></a>
                    @if(Auth::user()->class >= 3)
                        @if($video->published)
                            <a href="{{route('videos_tag', 'Published')}}"><span class="label label-success">Published</span></a>
                        @else
                            <a href="{{route('videos_tag', 'Unpublished')}}"><span class="label label-danger">Unpublished</span></a>
                        @endif
                    @endif
                </p></td>
            <td>{{$video->description}}</td>
        </tr>
        @endforeach
        </tbody>
    </table>
    <div align="center">{{$videos->links()}}</div>
@endsection