    <div class="form-group">
        <div class="col-md-6">
        <label>Name</label>
        <input type="text" data-validation="required" required="required" class="form-control" name="display_name" value="{{$module->display_name}}" autofocus>
        </div>
    </div>
    <div class="form-group row">
    <div class="col-md-6">
        <label>Link</label>
         <input type="text" data-validation="required" required="required" class="form-control" name="name" value="{{substr($module->name,0,-11)}}" autofocus>
    </div>
    <div class="col-md-6">
        <label>Icon</label>
        <input type="text" data-validation="required" id="icon-modal" required="required" class="form-control" name="icon" value="{{$module->icon}}" autofocus>
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-9">
          <label for="icons">Choose Icon</label>
            <div class="icons-modal" style="overflow-y: scroll; height:200px;" >
         </div>
        </div>
    </div>

<!-- jQuery 3 -->
