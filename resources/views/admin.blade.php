@extends('dashlayout')

@section('title')
    Admin
@endsection

@section('frame')
    <table class="table table-hover">
        <thead>
        <tr>
            <th width="50%">User</th>
            <th width="50%">Operation</th>
        </tr>
        </thead>
        <tbody>
        @foreach(App\VideoCategory::all() as $cate)
            <tr>
                <td id="{{$cate->id}}">{{$cate->catename}}</td>
                <td>
                    @if($cate->id >1)
                        <button class="btn btn-success" type="button" onclick="edit({{$cate->id}}, '{{$cate->catename}}');">Edit</button>
                        <button class="btn btn-danger" type="button" onclick="del({{$cate->id}});">Delete</button>
                    @else
                        Default category cannot be modified.
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div align="right"><button class="btn btn-success" type="button" onclick="add();">New category</button></div>
    <script type="text/javascript">
        function getinfo(userid) {
            var dialog = bootbox.dialog({
                title: 'Edit user',
                message: '<p><i class="glyphicon glyphicon-refresh"></i> Loading...</p>'
            });
            dialog.init(function () {

            });
        }
    </script>
@endsection