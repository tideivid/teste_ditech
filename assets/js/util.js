  $(document).ready(function() {

    $('#success_message, #erro_message').slideUp(2000);
    $('#table_usuario').DataTable();
    $('#table_usuario_info, #table_usuario_length').remove();
    $(".form_datetime").datetimepicker({
        format: "dd/mm/yyyy",
         minView: 2, 
         autoclose: true
    });

	 $('.btn-danger').click(function() {
	  var confirm1 = confirm('Confirmar exclusão?\nAção irreversivel');
	  if (confirm1) {
	    return true;
	  } else {
	    return false;
	  }  
	});

	 $("#usuario").submit(function(){
	 	var msg = 'Campos obrigatórios.\n';
	 	if($('.nome').val() ==''){
	 		msg += 'Nome.\n';	
	 	}

	 	if($('.email').val() ==''){
	 		msg += 'Email.\n';	
	 	}

	 	if($('.senha').val() ==''){
	 		msg += 'Senha.\n';	
	 	}

	 	if(msg != 'Campos obrigatórios.\n'){
	 		alert(msg)
	 		return false;
	 	}else{
	 		return true;
	 	}

	 });

	 $("#sala").submit(function(){
	 	var msg = 'Campos obrigatórios.\n';
	 	if($('.nome').val() ==''){
	 		msg += 'Nome.\n';	
	 	}

	 	if($('.capacidade').val() ==''){
	 		msg += 'Capacidade.\n';	
	 	}

	 	if(msg != 'Campos obrigatórios.\n'){
	 		alert(msg)
	 		return false;
	 	}else{
	 		return true;
	 	}

	 });

	$("#agendamento").submit(function(){
	 	var msg = 'Campos obrigatórios.\n';
	 	if($('.data').val() ==''){
	 		msg += 'Data.';	
	 	}

	 	if(msg != 'Campos obrigatórios.\n'){
	 		alert(msg)
	 		return false;
	 	}else{
	 		return true;
	 	}

	});

	$("#login").submit(function(){
	 	var msg = 'Campos obrigatórios.\n';
	 	if($('.email').val() ==''){
	 		msg += 'Email.';	
	 	}
	 	if($('.senha').val() ==''){
	 		msg += 'Senha.';	
	 	}

	 	if(msg != 'Campos obrigatórios.\n'){
	 		alert(msg)
	 		return false;
	 	}else{
	 		return true;
	 	}

	});


});

