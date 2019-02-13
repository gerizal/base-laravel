<section class="content">
  @include('admin.partials.errors')

<form action="@yield('url', '/warehouse/store')" class="form-horizontal" method="post">
 {{csrf_field()}}
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-primary">
        <!-- form start -->
        <div class="box-body">

          @section('editMethod')
            @show
          <div class="form-group">
              <div class="col-md-4">
              <label class="control-label" for="name">Name <span class="required">*</span></label>
              <input type="text" data-validation="required" name="name" class="form-control" placeholder="warehouse A" value="@yield('name')">
              </div>
          </div>
           <div class="form-group">
                 <div class="col-md-4">
              <label class="control-label" for="name">Location <span class="required">*</span></label>
              <input type="text" data-validation="required" name="location" class="form-control" placeholder="gedung a lt 1" value="@yield('location')">
            </div>
          </div>
          <div class="ln_solid"></div>
        </div>
      </div>
    </div>
  </div>
   <div class="row">
    <div class="col-xs-12">
      <div class="box box-primary">
        <!-- form start -->
        <div class="box-body">
            <div align="right" class="col-md-12 col-sm-12 col-xs-12">
              <button type="submit" id="checkBtn" class="btn btn-primary">Submit</button>
            </div>
        </div>
      </div>
    </div>
  </div>
</form>
</section>
