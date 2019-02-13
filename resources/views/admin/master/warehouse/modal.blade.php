<div id="modal-edit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-pegawai">
    <div class="modal-content">
   
     <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title">EDIT DATA WAREHOUSE</h4>
     </div>
    
    <form id="myWarehouse" method="post">
     {{csrf_field()}}
     <div class="modal-body">
       <div class="hasil-data"></div>
     </div>
   
     <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-close"></i>CLOSE</button>
      <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i>UPDATE</button>
     </div>
    </form>
   
    </div>
   </div>
  </div>