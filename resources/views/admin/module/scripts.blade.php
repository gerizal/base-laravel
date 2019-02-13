<script type="text/javascript">
    $(document).ready(function(){
        $("#modal-edit").on("show.bs.modal", function (event) {
            var idx = $(event.relatedTarget).data('id');
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : "GET",
                url : "{{url('/module/edit')}}"+"/"+ idx,
                success : function(data){
                $(".hasil-data").html(data);//menampilkan data ke dalam modal
                $("#myModule").attr('action',"{{url('/module/update')}}"+"/"+ idx);
                $.ajax({
                    url: "{{url('/module/getIcon')}}",
                    type: 'GET',
                    dataType: 'json',
                })
                .done(function(data) {
                    html = '';
                    $.each(data, function(index, val) {
                        html += '<a><i id="icon" class="fa '+val.name+'"></i></a>'
                    });
                    $('#modal-edit .icons-modal').append(html)
                    $('#modal-edit .icons-modal').on('click','i',function () {
                        var iconElement = $(this).attr('class');
                        $('#modal-edit #icon-modal').val(iconElement);
                    });
                })
                }
            });
         });
        $('.icons').on('click','i',function () {
            var iconElement = $(this).attr('class');
            $('input[name=icon]').val(iconElement);
        });
        $("body").on("click","#add-more",function(){ 
            var dom = $(`<div class="form-module form-group">
            <div class="col-md-12">
              Name : <input type="text" name="submodule_name[]">
              Link : <input type="text" name="submodule_link[]">
              <span id="action">
                <a id="add-more" class="btn btn-primary">+</a>
                <a class='btn btn-danger remove'>-</a>
              </span>
            </div>
            </div>`);

            $('#form-module-container').append(dom);
        });

        $("body").on("click",".remove",function(){ 
            $(this).parents(".form-module").remove();
        });
        $('#sub_module').change(function(event) {
            if($(this).val() == 1){
               $('.form-module').attr('style','display:block');
            }
            else{
               $('.form-module').attr('style','display:none');
            }
        });
        $.validate({
           
        });
        $.ajax({
            url: "{{url('/module/getIcon')}}",
            type: 'GET',
            dataType: 'json',
        })
        .done(function(data) {
            html = '';
            $.each(data, function(index, val) {
                html += '<a><i id="icon" class="fa '+val.name+'"></i></a>'
            });
            $('.icons').append(html)
        })
        
    });
</script>