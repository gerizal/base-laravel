@extends('layouts.admin.app')

@section('title', 'Dashboard | ')

@section('content')
<section class="content-header">
  <h1>
    {{substr(Route::currentRoutename(),9)}} Customer
    <small></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Role</li>
  </ol>
</section>
<section class="content">
  @include('admin.partials.errors')
  <div class="row">
    <div class="col-xs-12">
      <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_1" data-toggle="tab">Data Order</a></li>
              <li><a href="#tab_2" data-toggle="tab">Customer Order</a></li>
            
            </ul>

        <div class="tab-content">
           <div class="tab-pane active" id="tab_1">
        <!-- /.box-header -->
        <!-- form start -->

        <form class="form-horizontal" >
         {{csrf_field()}}
          @section('editMethod')
            @show
            <div class="form-group">
            <div class="col-md-5"> 
              <label class="control-label" for="first-name">Nomor Order <span class="required">*</span></label>
              <input type="text" data-validation="required" name="name" class="form-control" placeholder="Name" value="D1XX91">
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-5"> 
              <label class="control-label" for="first-name">Name <span class="required">*</span></label>
              <input type="text" data-validation="required" name="name" class="form-control" placeholder="Name" value="Wage Rizal Solichin">
            </div>
          </div>
           <div class="form-group">
            <div class="col-md-5"> 
              <label for="name">Email<span class="required">*</span></label>
              <input type="text" name="name" data-validation="required" required="required"  class="form-control" placeholder="Name" value="rizal@email.com">
            </div>
          </div>

          <div class="form-group">
            <div class="col-md-5"> 
              <label for="name">Alamat<span class="required">*</span></label>
              <input type="text" name="name" data-validation="required" required="required"  class="form-control" placeholder="Name" value="Jln Margaaasih No XX">
            </div>
          </div>
            <div class="form-group">
            <div class="col-md-5"> 
              <label for="name">Alamat Pengiriman<span class="required">*</span></label>
              <input type="text" name="name" data-validation="required" required="required"  class="form-control" placeholder="Name" value="Jln Margaaasih No XX">
            </div>
          </div>

          <div class="ln_solid"></div>
          <div class="form-group">
             <div class="col-md-12"> 
              <a href="#tab_2" data-toggle="tab" style="float: right" id="btn2" class="btn btn-primary">Selanjutnya</a>
            </div>
          </div>
        </form>
         
        </div>
         <div class="tab-pane" id="tab_2">
        <div class="box-body">
         <form id="form" class="form-horizontal" >
         {{csrf_field()}}
          @section('editMethod')
            @show

          <div class="form-group">
            <div class="col-md-12"> 
               <div class="col-md-2"> 
              <label class="control-label" for="first-name">Kode Produk <span class="required">*</span></label>
              <input type="text" data-validation="required" name="name" class="form-control" placeholder="Name" value="Hp Samsung">
              </div>
               <div class="col-md-3"> 
              <label class="control-label" for="first-name">Nama Produk <span class="required">*</span></label>
              <input type="text" data-validation="required" name="name" class="form-control" placeholder="Name" value="Hp Samsung">
              </div>
                 <div class="col-md-2"> 
              <label for="name">Harga Satuan<span class="required">*</span></label>
              <input type="text" disabled name="name" data-validation="required" required="required"  class="form-control" placeholder="Name" value="Rp. 50.000">
            </div>
               <div class="col-md-1"> 
              <label for="name">Jumlah<span class="required">*</span></label>
              <input type="number" name="name" data-validation="required" required="required"  class="form-control" placeholder="Name" value="2">
            </div>
              <div class="col-md-2"> 
              <label for="name">Total<span class="required">*</span></label>
              <input type="text" name="name" data-validation="required" required="required"  class="form-control" placeholder="Name" value="Rp. 100.000">

            </div>
            </div>
          </div>

    

         
        </form>
          <div class="ln_solid"></div>
          <div class="form-group">
             <div class="col-md-12"> 
              <a  style="float: right" id="btn3" class="btn btn-warning">Selesai</a>
            </div>
      </div>
    </div>
              </div>
              <!-- /.tab-pane -->
              
    </div>
              </div>

      </div>
      
    </div>
  </div>
</div>
</section>

@endsection


@push('scripts')
  @include('admin.retorder.scripts')
@endpush
