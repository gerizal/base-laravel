@extends('layouts.admin.app')

@section('title', 'Dashboard | ')

@section('content')
<section class="content-header">
      <h1>
        Users Management
        <small>All User</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Users</li>
      </ol>
    </section>
<section class="content">

  @include('admin.partials.message')

  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Data Users</h3>
          <ul class="nav navbar-right panel_toolbox">
              <li><a href="{{ route('user.create') }}"><div class="pull-right"><button type="button" class="btn btn-primary btn-md">Create New User</button></div></a></li>
            </ul>
        </div>
        <!-- /.box-header -->
        <div class="box-body">

          <table id="users" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>Full Name</th>
              <th>Email</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
            </thead>
            
            <tfoot>
            <tr>
              <th>Full Name</th>
              <th>Email</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
            </tfoot>
          </table>
        </div>
        <!-- /.box-body -->
      </div>
    </div>
  </div>
</section>

@endsection


@push('scripts')
  @include('admin.users.scripts')
  <script type="text/javascript">
  jQuery( document ).ready(function() {
    var data = $( '#users' ).DataTable({
      processing: true,
      serverSide: true,
      ajax: "{!! route( 'user.getdata' ) !!}",
      columns: [
      { data: 'name', name: 'name'},
      { data: 'email', name: 'email'},
      // { data: 'role', name: 'role'},
      { data: 'status', name: 'status'},
      { data: 'action', name: 'action', class: 'text-center', searchable: false, orderable: false }
      ]
    });
  });
</script>
@include('admin.forms.delete-modal')
@endpush

