@extends('layouts.admin.app')

@section('title', 'Dashboard | ')

@section('content')
<section class="content-header">
      <h1>
        Mahasiswa Management
        <small>All Role</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Mahasiswa</li>
      </ol>
    </section>
<section class="content">

  @include('admin.partials.message')

  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Data Mahasiswa</h3>
          <ul class="nav navbar-right panel_toolbox">
            @if(access('mahasiswa','create') == true)
              <li><a href="{{ route('mahasiswa.create')}}"><div class='pull-right'><button type='button' class='btn btn-primary btn-md'>Create New Mahasiswa</button></div></a></li>
            @endif
            </ul>
        </div>
        <!-- /.box-header -->
        <div class="box-body">

          <table id="mahasiswa" class="table table-bordered table-striped">
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
@include('admin.mahasiswa.scripts')

<script type="text/javascript">
    var data = $( '#mahasiswa' ).DataTable({
      processing: true,
      serverSide: true,
      ajax: "{!! route( 'mahasiswa.getdata' ) !!}",
      columns: [
      { data: 'nama', name: 'nama'},
      { data: 'action', name: 'action', class: 'text-center', searchable: false, orderable: false }
      ]
    });
</script>
@include('admin.forms.delete-modal')
@endpush
