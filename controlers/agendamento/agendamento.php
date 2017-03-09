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
    $sql = "SELECT a.id, u.nome as usuario, s.nome as sala, h.hora FROM agendamento a
      JOIN usuario u ON u.id = a.id_usuario
      join sala s ON s.id = a.id_sala
      join hora_reserva h ON h.id = a.horario";

    conecta();
    $result = mysqli_query($GLOBALS['CON'], $sql);

    $lista = array();

    if(mysqli_affected_rows($GLOBALS['CON']) > 0 ){
      while ($row = mysqli_fetch_array($result)) {
        array_push($lista, array(
          'id'       =>$row['id'], 
          'usuario'  =>$row['usuario'], 
          'sala'     =>$row['sala'], 
          'hora'     =>$row['hora']
        ));
      }
    }
    return $lista;
    desconecta();
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
          $sql= "INSERT INTO agendamento (id_usuario, id_sala, horario, data) VALUES('".$id_usuario."','".$id_sala."','".$horario."','".$data."')";
    mysqli_query($GLOBALS['CON'], $sql) or die (mysqli_error());

          if(mysqli_affected_rows($GLOBALS['CON']) > 0 ){
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



function editar($dados){
    $id          = $dados['id'];
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
          $sql= "UPDATE agendamento SET id_usuario = ".$id_usuario.", id_sala = ".$id_sala.", horario = ".$horario.", data = ".$data." WHERE id = ".$id;
            mysqli_query($GLOBALS['CON'], $sql) or die (mysqli_error($GLOBALS['CON']));

          if(mysqli_affected_rows($GLOBALS['CON']) > 0 ){
            header('Location: ../../agendamento/editado');
          }else{
            header('Location: ../../agendamento/falhaeditar');
          }

          desconecta();
      }else{
        header('Location: ../../agendamento/falhaeditar');
      }

    }else{
      header('Location: ../../agendamento/falhaeditar');
    }
}

function excluir($id){
    $sql = "DELETE FROM agendamento WHERE id = ".$id;
    conecta();
    mysqli_query($GLOBALS['CON'], $sql) or die (mysqli_error());

    if(mysqli_affected_rows($GLOBALS['CON']) > 0 ){
      header('Location: ../../agendamento/excluido');
    }else{
      header('Location: ../../agendamento/falhaexcluir');
    }

    desconecta();
}

function pesquisa($id){
    $sql = "SELECT id, id_usuario, id_sala, horario, data FROM agendamento WHERE id = ".$id;
    
    conecta();
    $result = mysqli_query($GLOBALS['CON'], $sql) or die (mysqli_error());

    $agendamento = array();

    if(mysqli_affected_rows($GLOBALS['CON']) > 0 ){
      $row = mysqli_fetch_array($result);
        $agendamento = array(
          'id'          =>$row['id'], 
          'id_usuario'  =>$row['id_usuario'], 
          'id_sala'     =>$row['id_sala'],
          'horario'     =>$row['horario'],
          'data'        =>$row['data']
        );
      }
    return $agendamento;
    desconecta();
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