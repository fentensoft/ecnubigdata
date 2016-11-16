@extends('dashboard.dashlayout')

@section('title')
    Admin
@endsection

@section('frame')
    <table class="table table-hover">
        <thead>
        <tr>
            <th width="10%">ID</th>
            <th width="25%">Username</th>
            <th width="40%">Email</th>
            <th width="25%">Detail</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->username}}</td>
                <td>{{$user->email}}</td>
                @if($user->id == 1)
                    <td>administrator cannot be edited.</td>
                @else
                    @if($user->jupyter && $user->rstudio)
                    <td><button type="button" class="btn btn-default btn-success" onclick="showdetail({{$user->id}});">Detail</button></td>
                    @else
                    <td><button type="button" class="btn btn-default btn-primary" onclick="showdetail({{$user->id}});">Detail</button></td>
                    @endif
                @endif
            </tr>
        @endforeach
        </tbody>
    </table>
    <div align="center">{{$users->links()}}</div>
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">User Detail</h4>
                </div>
                <div class="modal-body">
                    <div id="loading"><i class="fa fa-spinner fa-spin fa-2x fa-fw"></i>LOADING...</div>
                    <div id="user-detail">
                        <p>Username: <span id="username">ad</span></p>
                        <p>Email: <span id="email">ad</span></p>
                        <p>Location: <span id="location">ad</span></p>
                        <p>Rstudio status: <span id="rstudio">ad</span> <button id="rstudiobtn" type="button" class="btn btn-default btn-info" data-id="0" onclick="toggleRstudio(this);">Toggle</button></p>
                        <p>Jupyter status: <span id="jupyter">ad</span> <button id="jupyterbtn" type="button" class="btn btn-default btn-info" data-id="0" onclick="toggleJupyter(this);">Toggle</button></p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="delbtn" type="button" class="btn btn-default btn-danger" data-id="0" onclick="deluser(this);">Delete User</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @include('script')
    <script type="text/javascript">
        var deluser = function(sender) {
            bootbox.confirm("Are you really want to delete this user permanently?", function(result) {
                if(result) {
                    $("#loading").show();
                    $("#user-detail").hide();
                    $.get("admin/deleteuser/" + $(sender).attr("data-id"), function(data) {
                        location.reload();
                    });
                }
            });
        }
        var showdetail = function(id) {
            $("#loading").show();
            $("#user-detail").hide();
            $("#myModal").modal();
            $.getJSON("admin/getuserinfo/" + id, function(data) {
                $("#username").text(data.username);
                $("#email").text(data.email);
                $("#location").text(data.location);
                $("#rstudio").text((data.rstudio ? "Enabled" : "Disabled"));
                $("#jupyter").text((data.jupyter ? "Enabled" : "Disabled"));
                $("#rstudiobtn").attr("data-id", id);
                $("#jupyterbtn").attr("data-id", id);
                $("#delbtn").attr("data-id", id);
                $("#loading").hide();
                $("#user-detail").show();
            });
        }
        var toggleJupyter = function(sender) {
            $("#loading").show();
            $("#user-detail").hide();
            $.get("admin/togglejupyter/" + $(sender).attr("data-id"), function(data) {
                showdetail($(sender).attr("data-id"));
            });
        }
        var toggleRstudio = function(sender) {
            $("#loading").show();
            $("#user-detail").hide();
            $.get("admin/togglerstudio/" + $(sender).attr("data-id"), function(data) {
                showdetail($(sender).attr("data-id"));
            });
        }
    </script>
@endsection