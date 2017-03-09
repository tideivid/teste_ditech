<?php
	
	if($_POST){

	switch ($_POST['op']) {
		case 'cadastrar':
				cadastrar($_POST);
			break;
		case 'editar':
				editar($_POST);
			break;
		
		default:
			# code...
			break;
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
		$cpf   = $dados['cpf'];
		$email = $dados['email'];
		$senha = sha1($dados['senha']);
		$tipo  = $dados['tipo'];


		$sql = "INSERT INTO usuario (nome, cpf, email, senha, tipo) VALUES('".$nome."','".$cpf."','".$email."','".$senha."','".$tipo."')";
		
		conecta();
		mysqli_query($GLOBALS['CON'], $sql) or die (mysqli_error());

		if(mysqli_affected_rows($GLOBALS['CON']) > 0 ){
			header('Location: ../../usuario/sucesso');
		}else{
			header('Location: ../../usuario/falha');
		}

		desconecta();
	}


	function listar(){
		$sql = "SELECT id, nome, cpf, email, tipo FROM usuario ORDER BY id DESC";
		
		conecta();
		$result = mysqli_query($GLOBALS['CON'], $sql) or die (mysqli_error());

		$usuario = array();

		if(mysqli_affected_rows($GLOBALS['CON']) > 0 ){
			while ($row = mysqli_fetch_array($result)) {
				array_push($usuario, array(
					'id'	=>$row['id'], 
					'nome'	=>$row['nome'], 
					'cpf'	=>$row['cpf'], 
					'email'	=>$row['email'], 
					'tipo'	=>$row['tipo']
				));
			}
		}
		return $usuario;
		desconecta();
	}


	
?>