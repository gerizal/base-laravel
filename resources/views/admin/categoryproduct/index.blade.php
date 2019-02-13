@extends('layouts.admin.app')

@section('title', 'Dashboard | ')

@section('content')
<section class="content-header">
      <h1>
        Kategori Produk
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Kategori Produk</li>
      </ol>
    </section>
<section class="content">

  @include('admin.partials.message')

  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Data Kategori Produk</h3>
          <ul class="nav navbar-right panel_toolbox">
            @if(access('order','create') == true)
              <li><a href="{{ route('categoryproduct.create')}}"><div class='pull-right'><button type='button' class='btn btn-primary btn-md'>Create New Category</button></div></a></li>
            @endif
            </ul>
        </div>
        <!-- /.box-header -->
        <div class="box-body">

          <table id="roles" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>Name Kategori</th>
              <th>Status</th> 
              <th>Action</th>
            </tr>
            </thead>
            <tbody>
              @if (session()->has('message'))
              <td>Gadjet</td>
              <td>Aktif</td>
              <td><button class="btn btn-primary">Edit</button> <button class="btn btn-danger">Delete</button></td>
              @endif
            </tbody>
            <tfoot>
            <tr>
            <th>Name Kategori</th>
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
@include('admin.forms.delete-modal')
@endpush
