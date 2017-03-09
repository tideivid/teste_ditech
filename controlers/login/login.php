<?php

	
	function conecta(){
		require_once '../../config/conexao.php';
	}

	function desconecta(){
		mysqli_close($GLOBALS['CON']);
	}
	


	function login($dados){
		
	}

?>