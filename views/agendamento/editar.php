<?php   require_once '../../assets/template/header.php'; ?>
<?php   require_once '../../assets/template/menu.php'; ?>
<?php   require_once '../../controlers/agendamento/agendamento.php';?>
<?php
    $horas = horas();
    $salas = salas();
    $agendamento = pesquisa($_GET['id']);
?>

<div class="container">

<form class="form-horizontal" action="<?php echo URL;?>controlers/agendamento/agendamento.php" method="post"  id="agendamento_form"> 
<input type="hidden" name="op" value="editar">
<input type="hidden" name="id_usuario" value="<?php echo $_SESSION['login']['id'];?>">
<input type="hidden" name="id" value="<?php echo $agendamento['id'];?>">

<!-- Form Name -->
<legend>Agendar reserva</legend>

<div class="form-group"> 
  <label class="col-md-4 control-label">Sala</label>
    <div class="col-md-4 selectContainer">
    <div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
    <select name="id_sala" class="form-control selectpicker" >
      <?php
          foreach ($salas as $s) { ?>
          <option value="<?php echo $s['id'];?>" <?php if($s['id']==$agendamento['id_sala']){echo "selected";}?>><?php echo $s['nome'];?></option>
         <?php }
      ?>
    </select>
  </div>
</div>
</div>

<div class="form-group"> 
  <label class="col-md-4 control-label">Hora</label>
    <div class="col-md-4 selectContainer">
    <div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
    <select name="hora" class="form-control selectpicker" >
      <?php
          foreach ($horas as $h) { ?>
          <option value="<?php echo $h['id'];?>" <?php if($h['id']==$agendamento['horario']){echo "selected";}?>><?php echo $h['hora'];?></option>
         <?php }
      ?>
    </select>
  </div>
</div>
</div>


<!-- Text input-->

<div class="form-group">
  <label class="col-md-4 control-label">Data</label>  
  <div class="col-md-4 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input  name="data" placeholder="Data" class="form-control form_datetime"  type="text" value="<?php echo $agendamento['data'];?>">
    </div>
  </div>
</div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label"></label>
  <div class="col-md-4">
    <button type="submit" class="btn btn-warning" >Salvar <span class="glyphicon"></span></button>
  </div>
</div>


</form>
</div><!-- /.container -->
<?php   require_once '../../assets/template/footer.php'; ?>

