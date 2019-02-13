@extends('layouts.admin.app')

@section('title', 'Dashboard | ')

@section('content')
<section class="content-header">
      <h1>
        Admin List 
        <small>All User</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Users</li>
      </ol>
    </section>
<section class="content">

<div class="alert alert-success" style="display:none" id="message">

</div>

  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Data Users</h3>
          <ul class="nav navbar-right panel_toolbox">
               @if(access('user','create') == true)
             <li><a class='create-modal' href="#"><div class='pull-right'><button type='button' class='btn btn-primary btn-md'>Create New Role</button></div></a></li>
            @endif
            </ul>
        </div>
        <!-- /.box-header -->
        <div class="box-body">

         <table class="table table-borderless" id="users">
        <thead>
          <tr>
            <th class="text-center">Full Name</th>
            <th class="text-center">Email</th>
            <th class="text-center">Roles</th> 
            <th class="text-center">Status</th> 
            <th class="text-center">Actions</th>

          </tr>
        </thead>
        <tbody id="item">
        @foreach($users as $item)
        <tr class="item{{$item->id}}">
          <td>{{$item->name}}</td>
          <td>{{$item->email}}</td>
          <td>{{$item->role}}</td>
          <td>{{$item->status}}</td>
          <td><button class="edit-modal btn btn-info"
              data-info="{{$item->id}},{{$item->name}},{{$item->email}},{{$item->role}},{{$item->status}}">
              <span class="glyphicon glyphicon-edit"></span> Edit
            </button>
            <button class="delete-modal btn btn-danger"
              data-info="{{$item->id}},{{$item->name}},{{$item->email}},{{$item->role}},{{$item->status}}">
              <span class="glyphicon glyphicon-trash"></span> Delete
            </button></td>
        </tr>
        @endforeach
        </tbody>
      </table>
        </div>
        <!-- /.box-body -->
      </div>
    </div>
  </div>
  <div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"></h4>

        </div>
        <div class="modal-body">
          <form class="form-horizontal" role="form">
            <div class="form-group">
              <label class="control-label col-sm-2" for="id">ID</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="fid" disabled>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="fname">Full Name</label>
              <div class="col-sm-10">
                <input type="name" data-validation="length required" data-validation-length="min8" class="form-control" id="fname">
              </div>
            </div>
            <p class="fname_error error text-center alert alert-danger hidden"></p>
            <div class="form-group">
              <label class="control-label col-sm-2" for="email">Email</label>
              <div class="col-sm-10">
                <input type="email" data-validation="email required" class="form-control" id="email">
              </div>
            </div>
            <p class="fname_error error text-center alert alert-danger hidden"></p>
            <div class="form-group">
              <label class="control-label col-sm-2" for="password">Password</label>
              <div class="col-sm-10">
                <input type="password" data-validation="required" class="form-control" id="password">
              </div>
            </div>
             <p class="fname_error error text-center alert alert-danger hidden"></p>
            <div class="form-group">
              <label class="control-label col-sm-2" for="role">Role</label>
              <div class="col-sm-10">
               <select name="role_id"  id="role" class="form-control">
                    @foreach( $roles as $key => $role )
                      <option value="{{ $key }}">{{ $role }}</option>
                    @endforeach;
                  </select>
              </div>
            </div>
            <p class="email_error error text-center alert alert-danger hidden"></p>
            <div class="form-group">
              <label class="control-label col-sm-2" for="roles">Status</label>
              <div class="col-sm-10">
                <select class="form-control" id="status" name="status">
                  <option value="" disabled selected>Choose your option</option>
                  <option value="1">Active</option>
                  <option value="0">Inactive</option>
                </select>
              </div>
            </div>
          </form>
          <div class="deleteContent">
            Are you Sure you want to delete <span class="dname"></span> ? <span
              class="hidden did"></span>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn actionBtn" data-dismiss="modal">
              <span id="footer_action_button" class='glyphicon'> </span>
            </button>
            <button type="button" class="btn btn-warning" data-dismiss="modal">
              <span class='glyphicon glyphicon-remove'></span> Close
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection


@push('scripts')
<script type="text/javascript">
 $(document).ready(function() {
    $('#users').DataTable();
} );
  </script>

  <script>
    $(document).on('click', '.create-modal', function() {
        $('#footer_action_button').text(" Create");
        $('#footer_action_button').addClass('glyphicon-check');
        $('#footer_action_button').removeClass('glyphicon-trash');
        $('.actionBtn').addClass('btn-success');
        $('.actionBtn').removeClass('btn-danger');
        $('.actionBtn').removeClass('delete');
        $('.actionBtn').addClass('create');
        $('.modal-title').text('Create');
        $('.deleteContent').hide();
        $('.form-horizontal').show();
        var stuff = '';
        fillmodalData(stuff)
        $('#myModal').modal('show');
    });
    $(document).on('click', '.edit-modal', function() {
        $('#footer_action_button').text(" Update");
        $('#footer_action_button').addClass('glyphicon-check');
        $('#footer_action_button').removeClass('glyphicon-trash');
        $('.actionBtn').addClass('btn-success');
        $('.actionBtn').removeClass('btn-danger');
        $('.actionBtn').removeClass('delete');
        $('.actionBtn').addClass('edit');
        $('.modal-title').text('Edit');
        $('.deleteContent').hide();
        $('.form-horizontal').show();
        var stuff = $(this).data('info').split(',');
        fillmodalData(stuff)
        $('#myModal').modal('show');
    });
    $(document).on('click', '.delete-modal', function() {
        $('#footer_action_button').text(" Delete");
        $('#footer_action_button').removeClass('glyphicon-check');
        $('#footer_action_button').addClass('glyphicon-trash');
        $('.actionBtn').removeClass('btn-success');
        $('.actionBtn').addClass('btn-danger');
        $('.actionBtn').removeClass('edit');
        $('.actionBtn').addClass('delete');
        $('.modal-title').text('Delete');
        $('.deleteContent').show();
        $('.form-horizontal').hide();
        var stuff = $(this).data('info').split(',');
        $('.did').text(stuff[0]);
        $('.dname').html(stuff[1] +" "+stuff[2]);
        $('#myModal').modal('show');
    });

function fillmodalData(details){
    $('#fid').val(details[0]);
    $('#fname').val(details[1]);
    $('#email').val(details[2]);
    $('#role').val(details[3]);
    $('#status').val(details[4]);
}
    $('.modal-footer').on('click', '.create', function() {
        $.ajax({
            type: 'post',
            url: '/user/store',
            data: {
                 '_token': $('input[name=_token]').val(),
                'id': $("#fid").val(),
                'fname': $('#fname').val(),
                'password' : $('#password').val(),
                'email': $('#email').val(),
                'role': $('#role').val(),
                'status': $('#status').val(),
            },
            success: function(data) {
              if (data.errors){
                  $('#myModal').modal('show');
                    if(data.errors.fname) {
                      $('.fname_error').removeClass('hidden');
                        $('.fname_error').text("First name can't be empty !");
                    }
                    if(data.errors.email) {
                      $('.email_error').removeClass('hidden');
                        $('.email_error').text("Email must be a valid one !");
                    }
                }
               else {
                 $('.error').addClass('hidden');
                  $('#item').append('</tr>'+ +"<tr id='item' class='item" + data['user'].id + "'>" +
                        data['user'].id + "</td><td>" + data['user'].name +
                        "</td><td>"  + data['user'].email + "</td><td>" +
                         data['role_user'].name + "</td><td>" +
                         data['status_user'] +"</td><td>" + "<button class='edit-modal btn btn-info' data-info='"+ 
                         data['user'].id+","+
                         data['user'].name+","+
                         data['user'].email+","+
                         data['role'].role_id+","+
                         data['status_user']+"'><span class='glyphicon glyphicon-edit'></span> Edit</button> <button class='delete-modal btn btn-danger' data-info='" + 
                         data['user'].id+","+
                         data['user'].name+","+
                         data['user'].email+","+
                         data['role_user'].name+","+
                         data['status_user']+"' ><span class='glyphicon glyphicon-trash'></span> Delete</button></td></tr>");
                      $("#message").removeAttr("style");
                      $("#message").html(data['message']);
                      setTimeout(function(){ 
                        $("#message").fadeOut();
                      }, 2000);



              }
             }
        });
    });
    $('.modal-footer').on('click', '.edit', function() {

        $.ajax({
            type: 'post',
            url: '/user/update',
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $("#fid").val(),
                'fname': $('#fname').val(),
                'email': $('#email').val(),
                'password' : $('#password').val(),
                'role': $('#role').val(),
                'status': $('#status').val(),
            },
            success: function(data) {
              if (data.errors){
                  $('#myModal').modal('show');
                    if(data.errors.fname) {
                      $('.fname_error').removeClass('hidden');
                        $('.fname_error').text("First name can't be empty !");
                    }
                    if(data.errors.email) {
                      $('.email_error').removeClass('hidden');
                        $('.email_error').text("Email must be a valid one !");
                    }
                }
               else {
                console.log(data['status_user'])
                 $('.error').addClass('hidden');
                  $('.item' + data['user'].id).replaceWith("<tr class='item" + data['user'].id + "'>" +
                        data['user'].id + "</td><td>" + data['user'].name +
                        "</td><td>"  + data['user'].email + "</td><td>" +
                         data['role_user'].name + "</td><td>" +
                         data['status_user'] +"</td><td>" + "<button class='edit-modal btn btn-info' data-info='"+ 
                         data['user'].id+","+
                         data['user'].name+","+
                         data['user'].email+","+
                         data['role'].role_id+","+
                         data['status_user']+"'><span class='glyphicon glyphicon-edit'></span> Edit</button> <button class='delete-modal btn btn-danger' data-info='" + 
                         data['user'].id+","+
                         data['user'].name+","+
                         data['user'].email+","+
                         data['role_user'].name+","+
                         data['status_user']+"' ><span class='glyphicon glyphicon-trash'></span> Delete</button></td></tr>");
                      $("#message").removeAttr("style");
                      $("#message").html(data['message']);
                      setTimeout(function(){ 
                        $("#message").fadeOut();
                      }, 2000);
                    
               }}
        });
    });
    $('.modal-footer').on('click', '.delete', function() {
        $.ajax({
            type: 'post',
            url: '/user/destroy',
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $('.did').text()
            },
            success: function(data) {
                $('.item' + $('.did').text()).remove();
            }
        });
    });
</script>
@include('admin.forms.delete-modal')
@endpush

