  $(document).ready(function() {

    $('#success_message, #erro_message').slideUp(2000);
    $('#table_usuario').DataTable();
    $('#table_usuario_info, #table_usuario_length').remove();
    $(".form_datetime").datetimepicker({
        format: "dd/mm/yyyy",
         minView: 2, 
         autoclose: true
    });


});

