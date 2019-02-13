@extends('layouts.admin.app')
@section('title', 'Dashboard | ')
@section('content')
<section class="content-header">
  <h1>
    Mahasiswa
    <small></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Mahasiswa</li>
  </ol>
</section>
<section class="content">
  @include('admin.partials.errors')
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-primary">
            
        <div class="box-header with-border">
          <h3 class="box-title">Mahasiswa </h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <div class="box-body">

        <form action="@yield('url', '/mahasiswa/store')" method="post">
         {{csrf_field()}}
          @section('editMethod')
            @show
          <div class="form-group">
              <label class="control-label" for="first-name">Nama <span class="required">*</span></label>
              <input type="text" data-validation="required" name="nama" class="form-control" placeholder="Name" value="@yield('nama')">
          </div>

          <div class="ln_solid"></div>
          <div class="form-group">
            <div class="col-md-6 col-sm-6 col-xs-12">
              <button type="submit" id="checkBtn" class="btn btn-primary">Submit</button>
              <a href="/mahasiswa" class="btn btn-danger">Back</a>
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
  @include('admin.mahasiswa.scripts')
@endpush
