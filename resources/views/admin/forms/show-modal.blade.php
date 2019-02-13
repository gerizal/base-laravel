<div id="show-modal" class="modal fade in">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Image</h4>
            </div>
            <div class="modal-body">
                <img src="" id="ImageId" name="ImageId" style="width: 100%;height: auto;">
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        $('#show-modal').on('show.bs.modal', function (e) {
            var images_id = $(e.relatedTarget).data('id');
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'GET',
                url : '{{url("image/preview")}}',
                success : function(){
                $('.fetched-data').html();
                }
            });
         });
    });
    $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
