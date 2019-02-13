@extends('layouts.admin.app')

@section('title', 'Dashboard | ')

@section('content')
<section class="content-header">
      <h1>
        Roles Management
        <small>All Role</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Roles</li>
      </ol>
    </section>
<section class="content">

  @include('admin.partials.message')

  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Data Role</h3>
          <ul class="nav navbar-right panel_toolbox">
            @if(access('role','create') == true)
              <li><a href="{{ route('role.create')}}"><div class='pull-right'><button type='button' class='btn btn-primary btn-md'>Create New Role</button></div></a></li>
            @endif
            </ul>
        </div>
        <!-- /.box-header -->
        <div class="box-body">

          <table id="roles" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>Name</th>
              <th>Action</th>
            </tr>
            </thead>
            <tfoot>
            <tr>
              <th>Name</th>
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
    var data = $( '#roles' ).DataTable({
      processing: true,
      serverSide: true,
      ajax: "{!! route( 'role.getdata' ) !!}",
      columns: [
      { data: 'name', name: 'name'},
      { data: 'action', name: 'action', class: 'text-center', searchable: false, orderable: false }
      ]
    });
  });
</script>
@include('admin.forms.delete-modal')
@endpush
