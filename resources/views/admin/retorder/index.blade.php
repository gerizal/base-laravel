@extends('layouts.admin.app')

@section('title', 'Dashboard | ')

@section('content')
<section class="content-header">
      <h1>
        Return Order 
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Return Order</li>
      </ol>
    </section>
<section class="content">

  @include('admin.partials.message')

  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Data Customer Order</h3>
          <ul class="nav navbar-right panel_toolbox">
            @if(access('order','create') == true)
              <li><a href="{{ route('retorder.create')}}"><div class='pull-right'><button type='button' class='btn btn-primary btn-md'>Create New Return</button></div></a></li>
            @endif
            </ul>
        </div>
        <!-- /.box-header -->
        <div class="box-body">

          <table id="roles" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>No Retur</th>
              <th>No Order</th>
              <th>Nama Customer</th>
              <th>Nama Barang</th>
              <th>Jumlah Retur</th>
              <th>Status</th> 
              <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @if (session()->has('message'))
              <tr>
              <td>RD1XX91</td>
              <td>D1XX91</td>
              <td>rizal</td>
              <td>Hp Samsung</td>
              <td>2</td>
              <td>
              @if (session()->has('confirm'))
              Confirmed
              @elseif(session()->has('fail'))
              Canceled
              @else
              Waiting
              @endif</td>
              <td>
                 @if(access('order','create') == true)
                 <a href="{{ route('retorder.konfirmasi')}}" class="btn btn-warning">Konfirmasi Pemesanan</a>
                @endif
              </td>
            </tr>
            @endif
            </tbody>
            <tfoot>
            <tr>
              <th>No Retur</th>
              <th>No Order</th>
              <th>Nama Customer</th>
              <th>Nama Barang</th>
              <th>Jumlah Retur</th>
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
@endpush
