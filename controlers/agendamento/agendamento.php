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

  function listar(){

  }

  function cadastrar($dados){
    $id_usuario  = $dados['id_usuario'];
    $id_sala     = $dados['id_sala'];
    $horario     = $dados['hora'];
    $data        = $dados['data'];

    conecta();

    $vsql_agendamento = "SELECT id FROM agendamento WHERE horario = '".$horario."' AND data = ".$data." AND id_usuario = ".$id_usuario;
       mysqli_query($GLOBALS['CON'], $vsql_agendamento) or die (mysqli_error($GLOBALS['CON']));

    if(mysqli_affected_rows($GLOBALS['CON']) == 0 ){
    $vsql_sala = "SELECT id FROM agendamento WHERE horario = '".$horario."' AND id_sala = ".$id_sala." AND id_sala = ".$id_sala;
      mysqli_query($GLOBALS['CON'], $vsql_sala) or die (mysqli_error());
      
      if(mysqli_affected_rows($GLOBALS['CON']) == 0 ){
          echo "2";
          $sql= "INSERT INTO agendamento (id_usuario, id_sala, horario, data) VALUES('".$id_usuario."','".$id_sala."','".$horario."','".$data."')";
    mysqli_query($GLOBALS['CON'], $sql) or die (mysqli_error());

          if(mysqli_affected_rows($GLOBALS['CON']) > 0 ){
            echo "3";
            header('Location: ../../agendamento/sucesso');
          }else{
            header('Location: ../../agendamento/falha');
          }

          desconecta();
      }else{
        header('Location: ../../agendamento/falha');
      }

    }else{
      header('Location: ../../agendamento/falha');
    }
  }

function horas(){
  $sql = "SELECT id, hora FROM hora_reserva ORDER BY id ASC";
    
    conecta();
    $result = mysqli_query($GLOBALS['CON'], $sql);

    $hora = array();

    if(mysqli_affected_rows($GLOBALS['CON']) > 0 ){
      while ($row = mysqli_fetch_array($result)) {
        array_push($hora, array(
          'id'  =>$row['id'], 
          'hora'=>$row['hora']
        ));
      }
    }
    return $hora;
    desconecta();
}

function salas(){
  $sql = "SELECT id, nome FROM sala ORDER BY id ASC";
    
    conecta();
    $result = mysqli_query($GLOBALS['CON'], $sql);

    $sala = array();

    if(mysqli_affected_rows($GLOBALS['CON']) > 0 ){
      while ($row = mysqli_fetch_array($result)) {
        array_push($sala, array(
          'id'  =>$row['id'], 
          'nome'=>$row['nome']
        ));
      }
    }
    return $sala;
    desconecta();
}

?>