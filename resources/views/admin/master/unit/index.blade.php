@extends('layouts.admin.app')

@section('title', 'Dashboard | ')

@section('content')
<section class="content-header">
      <h1>
        Unit Management
        <small>All Unit</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Unit</li>
      </ol>
    </section>
<section class="content">
  @include('admin.partials.message')
  @include('admin.master.unit.create')
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <!-- /.box-header -->
        <div class="box-body">

          <table id="unit" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>Name</th>
              <th>Description</th>
              <th>Created At</th>
              <th>Updated At</th>
              <th>Action</th>
            </tr>
            </thead>
            <tfoot>
            <tr>
              <th>Name</th>
              <th>Description</th>
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
    var data = $( '#unit' ).DataTable({
      processing: true,
      serverSide: true,
      ajax: "{!! route( 'master.unit.getdata' ) !!}",
      columns: [
      { data: 'name', name: 'name'},
      { data: 'description', name: 'description'},
      { data: 'created_at', name: 'created_at'},
      { data: 'updated_at', name: 'updated_at'},
      { data: 'action', name: 'action', class: 'text-center', searchable: false, orderable: false }
      ]
    });
  });
</script>
@include('admin.forms.delete-modal')
@include('admin.master.unit.modal')
@include('admin.master.unit.scripts')
@endpush
