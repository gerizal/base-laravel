<div id="active-modal" class="modal fade in">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Data Confirmation</h4>
            </div>
            <div class="modal-body">
                <p>Are you sure want to confirm this data?</p>
            </div>
            <div class="modal-footer">
                    <a id="active-modal-cancel" href="#" class="btn btn-dark waves-effect waves-light" data-dismiss="modal">Cancel</a>
                    <form id="active" action="" method="post" style="display: inline" >
                      {{csrf_field()}}
                      {{method_field('POST')}}  
                      <button class="btn btn-primary">Confirm</button>
                    </form>
            </div>
        </div>
    </div>
</div>
<script>
    jQuery(document).ready(function() {

         jQuery(document).on('click', '#activeModal', function(e) {
            var url = jQuery(this).attr('data-href');
            $('#active').attr('action', url );
            $('#import').attr( 'method', 'active' );
            $('#active-modal').modal('show');
            e.preventDefault();
        });
    });
</script>
