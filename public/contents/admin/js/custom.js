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

$(document).ready(function (){   
    $(document).on("click","#restore",function(){
        var restoreId = $(this).data('id');
        $(".modal_body #modal_id").val(restoreId);
    });
});

$(document).ready(function (){   
    $(document).on("click","#delete",function(){
        var deleteId = $(this).data('id');
        $(".modal_body #modal_id").val(deleteId);
     });
});

//Data table code
$(document).ready( function () {
    $('#myTable').DataTable();
} );

$('#alltableinfo').DataTable({
    "paging":false,
    "lengthChange":false,
    "searching":false,
    "ordering":false,
    "info":false,
    "autoWidth":false,
});

 $('#allTableDesc').DataTable({
    "paging":false,
    "lengthChange":false,
    "searching":true,
    "ordering":true,
    "order":[[0, "desc"]],
    "info":true,
    "autoWidth":false,
 });


$(function(){
 $('#date').datepicker({
    autoclose: true,
    format: 'yyyy-mm-dd',
    todayHighlight: true,
 });
 $('#startdate').datepicker({
    autoclose: true,
    format: 'yyyy-mm-dd',
    todayHighlight: true,
 });
});