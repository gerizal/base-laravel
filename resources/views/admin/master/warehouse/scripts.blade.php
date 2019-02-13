<script type="text/javascript">
  $.validate({
   
  });
  $(document).ready(function(){
        $("#modal-edit").on("show.bs.modal", function (event) {
            var idx = $(event.relatedTarget).data('id');
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : "GET",
                url : "{{url('/warehouse/edit')}}"+"/"+ idx,
                success : function(data){
                $(".hasil-data").html(data);//menampilkan data ke dalam modal
                $("#myWarehouse").attr('action',"{{url('/warehouse/update')}}"+"/"+ idx);
                }
            });
         });
    });
</script>