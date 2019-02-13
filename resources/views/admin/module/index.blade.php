@extends('layouts.admin.app')

@section('title', 'Dashboard | ')

@section('content')
<section class="content-header">
      <h1>
        Module Management
        <small>All Module</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Module</li>
      </ol>
    </section>
<section class="content">
  @include('admin.partials.message')
  @include('admin.module.create')
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <!-- /.box-header -->
        <div class="box-body">
          <div class="table-responsive">
          <table id="module" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>Name</th>
              <th>Link</th>
              <th>Icon</th>
              <th>Created At</th>
              <th>Updated At</th>
              <th>Action</th>
            </tr>
            </thead>
            <tfoot>
            <tr>
              <th>Name</th>
              <th>Link</th>
              <th>Icon</th>
              <th>Created At</th>
              <th>Updated At</th>
              <th>Action</th>
            </tr>
            </tfoot>
          </table>
        </div>
        </div>
        <!-- /.box-body -->
      </div>
    </div>
  </div>
</section>
@endsection
@push('scripts')
<script type="text/javascript">
  jQuery( document ).ready(function() {
    var data = $( '#module' ).DataTable({
      processing: true,
      serverSide: true,
      ajax: "{!! route( 'module.getdata' ) !!}",
      columns: [
      { data: 'display_name', name: 'display_name'},
      { data: 'name', name: 'name',render :function ( data, type) {return data.slice(0,-11)}},
      { data: 'icon', name: 'icon'},
      { data: 'created_at', name: 'created_at'},
      { data: 'updated_at', name: 'updated_at'},
      { data: 'action', name: 'action', class: 'text-center', searchable: false, orderable: false }
      ]
    });
  });
</script>
@include('admin.forms.delete-modal')
@include('admin.module.modal')
@include('admin.module.scripts')
@endpush
