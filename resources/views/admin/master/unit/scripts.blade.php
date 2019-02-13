<script type="text/javascript">
  $.validate({
   
  });
  $(document).ready(function(){
        $("#modal-edit").on("show.bs.modal", function (event) {
            var idx = $(event.relatedTarget).data('id');
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : "GET",
                url : "{{url('/unit/edit')}}"+"/"+ idx,
                success : function(data){
                $(".hasil-data").html(data);//menampilkan data ke dalam modal
                $("#myUnit").attr('action',"{{url('/unit/update')}}"+"/"+ idx);
                }
            });
         });
    });
</script>