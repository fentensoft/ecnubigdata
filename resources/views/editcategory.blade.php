@extends('dashlayout')

@section('title')
    Edit category
@endsection

@section('frame')
    <table class="table table-hover">
        <thead>
        <tr>
            <th width="50%">Category</th>
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
        function add() {
            bootbox.prompt({size:'small', title:'Add new category', callback:function(result) {
                if (result.length > 32) {
                    new PNotify({
                        title: 'Input error',
                        text: 'Category name should not be greater than 32 characters.',
                        type: 'error',
                        buttons: {
                            sticker: false,
                        }
                    });
                } else {
                    $.post('{{route('postaddcategory')}}', {'_token': '{{csrf_token()}}', 'catename': result}, function(data) {
                        if (data.type == 'info') {
                            location.reload();
                        }
                    });
                }
            }});
        }
        function del(id) {
            bootbox.confirm('Do you really want to delete this category?<br/>Videos belong to it will be moved to "Default" category.', function(result) {
                if (result) {
                    $.post('{{route('postdelcategory')}}', {'_token': '{{csrf_token()}}', 'id': id}, function(data) {
                        if (data.type == 'info') {
                            location.reload();
                        }
                    });
                }
            });
        }
        function edit(id, val) {
            bootbox.prompt({size:'small', title:'Edit category name', value: val, callback:function(result) {
                if (result) {
                    if (result.length > 32) {
                        new PNotify({
                            title: 'Input error',
                            text: 'Category name should not be greater than 32 characters.',
                            type: 'error',
                            buttons: {
                                sticker: false,
                            }
                        });
                    } else {
                        $.post('{{route('posteditcategory')}}', {'_token': '{{csrf_token()}}', 'id': id, 'catename': result}, function(data) {
                            new PNotify({
                                title: 'Edit category',
                                text: data.text,
                                type: data.type,
                                buttons: {
                                    sticker: false,
                                }
                            });
                            if (data.type == 'info') {
                                $('td#' + id).text(result);
                            }
                        });
                    }
                }
            }});
        }
    </script>
@endsection