setTimeout(function(){
    $('.alert_success').slideUp(1000);
},5000);

setTimeout(function(){
    $('.alert_error').slideUp(1000);
},10000);


$(document).ready(function (){   
    $(document).on("click","#softDelete",function(){
        var deleteId = $(this).data('id');
        $(".modal_body #modal_id").val(deleteId);
     });
});


