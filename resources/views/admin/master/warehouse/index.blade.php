@extends('layouts.admin.app')

@section('title', 'Dashboard | ')

@section('content')
<section class="content-header">
      <h1>
        Warehouse Management
        <small>All Warehouse</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Warehouse</li>
      </ol>
    </section>
<section class="content">
  @include('admin.partials.message')
  @include('admin.master.warehouse.create')
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <!-- /.box-header -->
        <div class="box-body">

          <table id="warehouse" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>Name</th>
              <th>Location</th>
              <th>Created At</th>
              <th>Updated At</th>
              <th>Action</th>
            </tr>
            </thead>
            <tfoot>
            <tr>
              <th>Name</th>
              <th>Location</th>
              <th>Created At</th>
              <th>Updated At</th>
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
<script type="text/javascript">
  jQuery( document ).ready(function() {
    var data = $( '#warehouse' ).DataTable({
      processing: true,
      serverSide: true,
      ajax: "{!! route( 'master.warehouse.getdata' ) !!}",
      columns: [
      { data: 'name', name: 'name'},
      { data: 'location', name: 'location'},
      { data: 'created_at', name: 'created_at'},
      { data: 'updated_at', name: 'updated_at'},
      { data: 'action', name: 'action', class: 'text-center', searchable: false, orderable: false }
      ]
    });
  });
</script>
@include('admin.forms.delete-modal')
@include('admin.master.warehouse.modal')
@include('admin.master.warehouse.scripts')
@endpush
