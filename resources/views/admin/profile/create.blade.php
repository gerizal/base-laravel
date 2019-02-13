@extends('layouts.admin.app')

@section('title', 'Dashboard | ')

@section('content')
<section class="content-header">
  <h1>
   profile
    <small></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Profile</li>
  </ol>
</section>
<section class="content">

  @include('admin.partials.message')
  
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-primary">
            
        <div class="box-header with-border">
        
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form class="form-horizontal" action="@yield('url', '/profile/store')" method="post" enctype="multipart/form-data">
         {{csrf_field()}}
          @section('editMethod')
            @show
            <div class="box-body">
              <div class="form-group">
                 <div class="col-md-5"> 
                  <img src="{{photo_user()}}" class="profile-user-img img-responsive img-circle" style="width:100px;height: 100px">
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-5"> 
                  <label for="name">Name <span class="required">*</span></label>
                  <input type="text" data-validation="required" id="name" name="name" class="form-control" placeholder="Name" value="@yield('name')">
                </div>
              </div>
              <div class="form-group">
                  <div class="col-md-5"> 
                    <label for="email">Email</label>
                    <input type="email" data-validation="email" class="form-control"  id="email" name="email" placeholder="Email" value="@yield('email')">
                  </div>
                </div>
              <div class="form-group">
                <div class="col-md-4">
                  <label for="password">Password</label>
                  <input type="password" data-validation="length password" data-validation-length="min8" class="form-control" id="password" name="password" value="">
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-3">
                  <label for="photo">Photo *</label>
                  <input type="file" class="upload-file" id="photo" name="photo">
                  <img src="" id="image_preview" width="200px" />
                </div>
              </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>

           </div>
        </form>
      </div>
      
    </div>
  </div>
</section>

@endsection


@push('scripts')
  @include('admin.users.scripts')
  @include('admin.profile.scripts')
@endpush
