@extends('layouts.admin.app')

@section('title', 'Dashboard | ')

@section('content')
<section class="content-header">
  <h1>
    {{substr(Route::currentRoutename(),5)}} User
    <small></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Users</li>
  </ol>
</section>
<section class="content">

  @include('admin.partials.errors')
  
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-primary">
            
        <div class="box-header with-border">
          <h3 class="box-title">{{substr(Route::currentRoutename(),5)}} Users</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form class="form-horizontal" action="@yield('url', '/user/store')" method="post">
         {{csrf_field()}}
          @section('editMethod')
            @show
            <div class="box-body">
              <div class="form-group">
                <div class="col-md-5"> 
                  <label for="name">Full Name <span class="required">*</span></label>
                  <input type="text" name="name" data-validation="required" required="required"  class="form-control" placeholder="Name" value="@yield('name')">
                </div>
              </div>
              <div class="form-group">
                  <div class="col-md-4"> 
                    <label for="email">Email Address <span class="required">*</span> </label>
                    <input name="email" type="email" data-validation="email" class="form-control" id="email" placeholder="Enter email" value="@yield('email')" @yield('readonly', 'true')>
                  </div>
                </div>
              <div class="form-group">
                <div class="col-md-3">
                  <label for="password">Password <span class="required">*</span></label>
                  <input name="password" type="password" data-validation="length password" data-validation-length="min8" class="form-control" id="password" placeholder="Password" value="">
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-4">
                  <label for="role">Role</label>
                  <select name="role_id"  id="role_id" class="form-control">
                    @foreach( $roles as $key => $role )
                      <option value="{{ $key }}">{{ $role }}</option>
                    @endforeach;
                  </select>
                </div>
              </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{url('/user')}}" class="btn btn-danger">Back</a>
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
@endpush
