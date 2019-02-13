@extends('layouts.admin.app')

@section('title', 'Dashboard | ')

@section('content')
<section class="content-header">
  <h1>
    {{substr(Route::currentRoutename(),5)}} Role
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
      <div class="box box-primary">
            
        <div class="box-header with-border">
          <h3 class="box-title">{{substr(Route::currentRoutename(),5)}} Role</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <div class="box-body">

        <form action="@yield('url', '/role/store')" method="post">
         {{csrf_field()}}
          @section('editMethod')
            @show
          <div class="form-group">
              <label class="control-label" for="first-name">Name <span class="required">*</span></label>
              <input type="text" data-validation="required" name="name" class="form-control" placeholder="Name" value="@yield('name')">
          </div>
          <div class="form-group">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Menu Lists</th>
                  <th class="non-user text-center">
                    <div class="checkbox checkbox-custom checkbox-primary" style="margin-top:0px !important;margin-bottom:0px !important;">
                      <label>
                        <input type="checkbox" onClick="toggle(this)" /> Select All<br/>
                      </label>
                    </div>
                  </th>
                </tr>
              </thead>
              <tbody>
              @php
                foreach($permissions as $data){
                   $ability_id[]  = $data->id;
                   $ability[]     = $data->name;      
                }
                $data_id=(array_chunk($ability_id,4));
                $data_ability=(array_chunk($ability,4));
                for($i=0; $i<count($data_id);$i++){
                  $label = $data_ability[$i][0];
                  $label_name = substr($label, strpos($label, "_") + 1);  
                  echo '<tr>';
                  echo '<td><b>'.ucfirst($label_name).'</b></td>';
                  for($j=0; $j<count($data_id[$i]);$j++){
                    $display = $data_ability[$i][$j];
                    $display_name =  explode("_", $display, 2);
                    if(isset($data_permission) && in_array($data_id[$i][$j],$data_permission)){
                      $checked = 'checked';
                    }
                    else{
                      $checked ='';
                    }
                    echo '<td>';
                    echo '<input id="permission" name="permission[]" '.$checked.' type="checkbox" value="'.$data_id[$i][$j].'">'.ucfirst($display_name[0]);
                    echo '</td>';
                  
                  }
                  echo '</tr>';

                }
                @endphp

              </tbody>
            </table>
          </div>

          <div class="ln_solid"></div>
          <div class="form-group">
            <div class="col-md-6 col-sm-6 col-xs-12">
              <button type="submit" id="checkBtn" class="btn btn-primary">Submit</button>
              <a href="/role" class="btn btn-danger">Back</a>
            </div>
          </div>
        </form>
          @push( 'scripts' )
         {{--  <script type="text/javascript">
            $( 'input[name=create-all]' ).on('click',function(){
              $(".create-box").prop('checked', $(this).prop('checked'));
              $(".create-box").each(function(n,v){
                if ($(this).prop('checked')){
                  $(this).val(1);
                  $(this).parent().find('span').removeClass('label-danger').addClass('label-success');
                  $(this).parent().find('span').html('Active');
                } else {
                  $(this).val(0);
                  $(this).parent().find('span').removeClass('label-success').addClass('label-danger');
                  $(this).parent().find('span').html('InActive');
                }
              });
            });

            $(document).on('change',".create-box",function(){
              var count_active = 0;
              var count_inactive = 0;
              var active = 0;
              var inactive = 0;
              var base = $(".create-box").length;
              var _this = $(this);
              if (_this.prop('checked')){
                _this.val(1);
                _this.parent().find('span').removeClass('label-danger').addClass('label-success');
                _this.parent().find('span').text('Active');

                if (_this.hasClass('parent')) {
                  var parent = _this.data('id');
                  $(".child-"+parent+"").each(function(){
                    $(this).parent().find('span').removeClass('label-danger').addClass('label-success');
                    $(this).parent().find('span').text('Active');
                    $(this).prop('checked',true);
                    $(this).val(1);
                  });
                }

              } else {
                _this.val(0);
                _this.parent().find('span').removeClass('label-success').addClass('label-danger');
                _this.parent().find('span').text('InActive');

                if (_this.hasClass('parent')) {
                  var parent = _this.data('id');
                  $(".child-"+parent+"").each(function(){
                    $(this).parent().find('span').removeClass('label-success').addClass('label-danger');
                    $(this).parent().find('span').text('InActive');
                    $(this).prop('checked',false);
                    $(this).val(0);
                  });
                }

              }

              $(".create-box").each(function(k){
                if ($(this).parent().find('span').text() == 'Active'){
                  active = k;
                }

                if($(this).parent().find('span').text() == 'InActive'){
                  inactive = k;
                }

              });

              if (inactive == 0) {
                $( 'input[name=create-all]' ).prop('checked',true);
              } else {
                $( 'input[name=create-all]' ).prop('checked',false);
              }

            });
          </script> --}}
          @endpush

        </div>

      </div>
      
    </div>
  </div>
</section>

@endsection


@push('scripts')
  @include('admin.roles.scripts')
@endpush
