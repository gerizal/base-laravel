@extends('layouts.admin.app')

@section('title', 'Dashboard | ')

@section('content')
<section class="content-header">
  <h1>
    {{substr(Route::currentRoutename(),8)}}
    <small></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Category Product</li>
  </ol>
</section>
<section class="content">
  @include('admin.partials.errors')
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-primary">
            
        <div class="box-header with-border">
          <h3 class="box-title">{{substr(Route::currentRoutename(),8)}}</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <div class="box-body">

        <form class="form-horizontal" action="@yield('url', '/categoryproduct/store')" method="post">
         {{csrf_field()}}
          @section('editMethod')
            @show
          <div class="form-group">
            <div class="col-md-5"> 
              <label class="control-label" for="first-name">Nama Kategori <span class="required">*</span></label>
              <input type="text" data-validation="required" name="name" class="form-control" placeholder="Name" value="Gadjet">
            </div>
          </div>
           <div class="form-group">
            <div class="col-md-5"> 
              <label for="name">Status<span class="required">*</span></label>
              <select name="name" class="form-control">
                <option>Aktif</option>
                <option>Tidak Aktif</option>
              </select>
            </div>
          </div>

          <div class="ln_solid"></div>
          <div class="form-group">
            <div class="col-md-6 col-sm-6 col-xs-12">
              <button type="submit" id="checkBtn" class="btn btn-primary">Submit</button>
              <a href="/categoryproduct" class="btn btn-danger">Back</a>
            </div>
          </div>
        </form>
         
        </div>

      </div>
      
    </div>
  </div>
</section>

@endsection


@push('scripts')
  @include('admin.categoryproduct.scripts')
@endpush
