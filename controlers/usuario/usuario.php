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

		$nome  = $dados['nome'];
		$email = $dados['email'];
		$senha = sha1($dados['senha']);
		$tipo  = $dados['tipo'];


		$sql = "INSERT INTO usuario (nome, email, senha, tipo) VALUES('".$nome."','".$email."','".$senha."','".$tipo."')";
		
		conecta();
		mysqli_query($GLOBALS['CON'], $sql) or die (mysqli_error());

		if(mysqli_affected_rows($GLOBALS['CON']) > 0 ){
			header('Location: ../../usuario/sucesso');
		}else{
			header('Location: ../../usuario/falha');
		}

		desconecta();
	}

	function editar($dados){
		$nome  = $dados['nome'];
		$email = $dados['email'];
		if(isset($dados['senha'])){
			$senha = sha1($dados['senha']);	
		}
		$tipo  = $dados['tipo'];
		$id	   = $dados['id'];

		$sql = "UPDATE usuario SET nome = '".$nome."', email = '".$email."'";
		if(isset($senha)){
			$sql .= ", senha = '".$senha."'";
		}
		$sql .= ", tipo = '".$tipo."' WHERE id =".$id;

		conecta();
		mysqli_query($GLOBALS['CON'], $sql) or die (mysqli_error());

		if(mysqli_affected_rows($GLOBALS['CON']) > 0 ){
			header('Location: ../../usuario/editado');
		}else{
			header('Location: ../../usuario/falhaeditar');
		}

		desconecta();

	}

	function excluir($id){
		$sql = "DELETE FROM usuario WHERE id = ".$id;
		conecta();
		mysqli_query($GLOBALS['CON'], $sql) or die (mysqli_error());

		if(mysqli_affected_rows($GLOBALS['CON']) > 0 ){
			header('Location: ../../usuario/excluido');
		}else{
			header('Location: ../../usuario/falhaexcluir');
		}

		desconecta();

	}




	function listar(){
		$sql = "SELECT id, nome, email, tipo FROM usuario ORDER BY id DESC";
		
		conecta();
		$result = mysqli_query($GLOBALS['CON'], $sql) or die (mysqli_error());

		$usuario = array();

		if(mysqli_affected_rows($GLOBALS['CON']) > 0 ){
			while ($row = mysqli_fetch_array($result)) {
				array_push($usuario, array(
					'id'	=>$row['id'], 
					'nome'	=>$row['nome'], 
					'email'	=>$row['email'], 
					'tipo'	=>$row['tipo']
				));
			}
		}
		return $usuario;
		desconecta();
	}

	function pesquisa($id){

		$sql = "SELECT id, nome, email, tipo FROM usuario WHERE id = ".$id;
		
		conecta();
		$result = mysqli_query($GLOBALS['CON'], $sql) or die (mysqli_error());

		$usuario = array();

		if(mysqli_affected_rows($GLOBALS['CON']) > 0 ){
			$row = mysqli_fetch_array($result);
				$usuario = array(
					'id'	=>$row['id'], 
					'nome'	=>$row['nome'], 
					'email'	=>$row['email'], 
					'tipo'	=>$row['tipo']
				);
			}
		return $usuario;
		desconecta();
		}
?>