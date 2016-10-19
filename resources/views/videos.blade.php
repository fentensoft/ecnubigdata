@extends('dashlayout')

@section('title')
    Videos
@endsection

@section('frame')
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
                    <span class="label label-info">{{$video->cate->catename}}</span>
                    @if(Auth::user()->class >= 3)
                        @if($video->published)
                            <span class="label label-success">Published</span>
                        @else
                            <span class="label label-danger">Unpublished</span>
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