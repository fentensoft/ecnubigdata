@extends('dashlayout')

@section('title')
    Submit Video
@endsection

@section('frame')
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Submit Video</h3>
            </div>
            <div class="panel-body">
                <form action="{{route("postsubmitvideo")}}" method="post">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="title">Video Title</label>
                        <input class="form-control" type="text" name="title" id="title"></input>
                    </div>
                    <div class="form-group">
                        <label for="description">Video description</label>
                        <textarea class="form-control" rows="3" id="description" name="description"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="vidid">Video ID</label>
                        <input class="form-control" type="text" name="vidid" id="vidid"></input>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
@endsection