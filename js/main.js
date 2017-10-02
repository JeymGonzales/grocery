$(document).ready(function(){
    $(document).on('submit', '#product-frm', function(){

        elem = $(this);

        var myData = new FormData($("#product-frm")[0]);

        if(method == 'update') {
            url = window.location.href;
        } else {
            url = baseurl+'/'+module;
        }

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('#_token').val()
            }
        })


        $.ajax({
            url         : url,
            data        : myData,
            contentType : false,
            processData : false,
            type        : 'POST',
              success: function(data){
                alert('Data Successfully Savedd');
              },

              error: function(data) {
                var errors = data.responseJSON;
                 $.each( errors, function( key, value ) {
                    idName = key;
                    $('[name='+idName+']').parent().append('<div class="err" style="color:tomato">'+value+'*</div>');
                });
              }
        });

        return false;
    });

});