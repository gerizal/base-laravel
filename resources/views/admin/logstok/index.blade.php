@extends('layouts.admin.app')

@section('title', 'Dashboard | ')

@section('content')
<section class="content-header">
      <h1>
        Log Stok 
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Log Stok</li>
      </ol>
    </section>
<section class="content">

  @include('admin.partials.message')

  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Data Log Stok</h3>
          <ul class="nav navbar-right panel_toolbox">
          
            </ul>
        </div>
        <!-- /.box-header -->
        <div class="box-body">

          <table id="roles" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>Kode Produk</th>
              <th>Stok Awal</th>
              <th>Stok Perubahan</th>
              <th>Total Stok</th>
              <th>Status Log</th>  

            </tr>
            </thead>
            <tbody>
            <tr>
              <td>XSM501</td>
              <td>55</td>
              <td>5</td>
              <td>50</td>
              <td>Penjualan</td>
            </tr>
              <tr>
              <td>XSM501</td>
              <td>50</td>
              <td>12</td>
              <td>62</td>
              <td>Tambah Stok</td>
            </tr>
            </tbody>
            <tfoot>
            <tr>
               <th>Kode Produk</th>
              <th>Stok Awal</th>
              <th>Stok Perubahan</th>
              <th>Total Stok</th>
              <th>Status Log</th>  
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
