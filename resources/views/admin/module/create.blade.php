  @include('admin.partials.errors')
<form action="@yield('url', '/module/store')" class="form-horizontal" method="post">
 {{csrf_field()}}
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-primary">
        <div class="box-body">
          @section('editMethod')
            @show
          <div class="form-group">
              <div class="col-md-4">
              <label class="control-label" for="name">Name <span class="required">*</span></label>
              <input type="text" data-validation="required" name="display_name" class="form-control" placeholder="production">
              </div>
          </div>
           <div class="form-group">
              <div class="col-md-4">
              <label class="control-label" for="name">Icon</label>
              <input type="text" placeholder="Choose the Icon"  name="icon" class="form-control">
            </div>
          </div>
           <div class="form-group">
            <div class="col-md-9">
              <label for="icons">Choose Icon</label>
                <div class="icons" style="overflow-y: scroll; height:200px;" >
             </div>
            </div>
          </div>
           <div class="form-group">
              <div class="col-md-4">
              <label class="control-label" for="name">Link <span class="required">*</span></label>
              <input type="text" data-validation="required" name="name" class="form-control" placeholder="production">
              </div>
          </div>
           <div class="form-group">
              <div class="col-md-4">
              <label class="control-label" for="name">Sub Module <span class="required">*</span></label>
              <select class="form-control" id="sub_module" name="submenu">
                <option value="0">Deactive</option>
                <option value="1">Active</option>
              </select>
              </div>
          </div>

           <div class="form-module form-group" style="display:none">
            <div class="col-md-12">
              Name : <input type="text" name="submodule_name[]">
              Link : <input type="text" name="submodule_link[]">
              <span id="action">
                <a id="add-more" class="btn btn-primary">+</a>
              </span>
            </div>
          </div>
          <div id="form-module-container"></div>

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
