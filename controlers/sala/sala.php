<?php

	if($_POST){
		switch ($_POST['op']) {
			case 'cadastrar':
					cadastrar($_POST);
				break;
			case 'editar':
					editar($_POST);
				break;

		}	
	}

	if(isset($_GET)){
		if(isset($_GET['op'])){
			excluir($_GET['id']);
		}
	}

	function conecta(){
		require_once '../../config/conexao.php';
	}

	function desconecta(){
		mysqli_close($GLOBALS['CON']);
	}
	

	function cadastrar($dados){

		$nome  			= $dados['nome'];
		$capacidade   	= $dados['capacidade'];

		$sql = "INSERT INTO sala (nome, capacidade) VALUES('".$nome."',".$capacidade.")";
		
		conecta();
		mysqli_query($GLOBALS['CON'], $sql) or die (mysqli_error());

		if(mysqli_affected_rows($GLOBALS['CON']) > 0 ){
			header('Location: ../../sala/sucesso');
		}else{
			header('Location: ../../sala/falha');
		}

		desconecta();
	}

	function editar($dados){
		$nome  		  = $dados['nome'];
		$capacidade   = $dados['capacidade'];
		$id			  = $dados['id'];

		$sql = "UPDATE sala SET nome = '".$nome."', capacidade = ".$capacidade." WHERE id = ".$id;


		conecta();
		mysqli_query($GLOBALS['CON'], $sql) or die (mysqli_error());

		if(mysqli_affected_rows($GLOBALS['CON']) > 0 ){
			header('Location: ../../sala/editado');
		}else{
			header('Location: ../../sala/falhaeditar');
		}

		desconecta();

	}

	function excluir($id){
		$sql = "DELETE FROM sala WHERE id = ".$id;
		conecta();
		mysqli_query($GLOBALS['CON'], $sql) or die (mysqli_error());

		if(mysqli_affected_rows($GLOBALS['CON']) > 0 ){
			header('Location: ../../sala/excluido');
		}else{
			header('Location: ../../sala/falhaexcluir');
		}

		desconecta();

	}




	function listar(){
		$sql = "SELECT id, nome, capacidade FROM sala ORDER BY id DESC";
		
		conecta();
		$result = mysqli_query($GLOBALS['CON'], $sql) or die (mysqli_error());

		$sala = array();

		if(mysqli_affected_rows($GLOBALS['CON']) > 0 ){
			while ($row = mysqli_fetch_array($result)) {
				array_push($sala, array(
					'id'			=>$row['id'], 
					'nome'			=>$row['nome'], 
					'capacidade'	=>$row['capacidade']
				));
			}
		}
		return $sala;
		desconecta();
	}

	function pesquisa($id){

		$sql = "SELECT id, nome, capacidade FROM sala WHERE id = ".$id;
		
		conecta();
		$result = mysqli_query($GLOBALS['CON'], $sql) or die (mysqli_error());

		$sala = array();

		if(mysqli_affected_rows($GLOBALS['CON']) > 0 ){
			$row = mysqli_fetch_array($result);
				$sala = array(
					'id'			=>$row['id'], 
					'nome'			=>$row['nome'], 
					'capacidade'	=>$row['capacidade']
				);
			}
		return $sala;
		desconecta();
		}
?>