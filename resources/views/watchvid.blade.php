@extends('dashlayout')

@section('title')
    {{$video->first()->title}}
@endsection

@section('frame')
    @if(Auth::user()->class <= 2)
    <div class="row">
        <div class="col-md-8">
            <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{{$video->first()->vidid}}" frameborder="0" allowfullscreen></iframe>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel panel-warning">
                <div class="panel-heading">
                    <h3 class="panel-title">{{$video->first()->title}}</h3>
                    <span class="label label-info">{{$video->first()->cate->catename}}</span>
                </div>
                <div class="panel-body">
                    <p>{{$video->first()->description}}</p>
                    <p>Publisher: {{$video->first()->pub->realname}}</p>
                </div>
            </div>
        </div>
    </div>
    @else
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{{$video->first()->vidid}}" frameborder="0" allowfullscreen></iframe>
                </div>
            </div>
        </div>
        <p></p>
        <div class="panel panel-warning">
            <div class="panel-heading">
                <h3 class="panel-title">Edit Video Information</h3>
            </div>
            <div class="panel-body">
                <form action="{{route("editvideo")}}" method="post">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input class="form-control" type="text" name="title" id="title" value="{{$video->first()->title}}"></input>
                    </div>
                    <div class="form-group">
                        <label for="description">Video description</label>
                        <textarea class="form-control" rows="3" id="description" name="description">{{$video->first()->description}}</textarea>
                    </div>
                    <div class="form-group">
                        <p class="form-control-static"><b>Video ID</b> {{$video->first()->vidid}}</p>
                    </div>
                    <div class="form-group">
                        <p class="form-control-static"><b>Publisher</b> {{$video->first()->pub->realname}}</p>
                    </div>
                    <div class="form-group">
                        <label for="title" style="padding-right:10px;">Category</label>
                        <select name="category" id="category" class="selectpicker">
                            @foreach(App\VideoCategory::all() as $cate)
                                <option value="{{$cate->id}}" @if($cate->id == $video->first()->category) selected @endif>{{$cate->catename}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="published" style="padding-right:10px;">Status</label>
                        <input class="checkboxpicker" type="checkbox" name="published" id="published" title="Status" @if($video->first()->published) checked @endif></input>
                    </div>
                    <input type="hidden" name="id" value="{{$video->first()->id}}">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>

    @endif
@endsection