<?php   require_once '../../assets/template/header.php'; ?>
<?php   require_once '../../assets/template/menu.php'; ?>
<?php   require_once '../../controlers/sala/sala.php';?>
<?php
    $sala = pesquisa($_GET['id']);
?>
<div class="container">

<form class="form-horizontal" action="<?php echo URL;?>controlers/sala/sala.php" method="post"  id="sala"> 
<input type="hidden" name="op" value="editar">
<input type="hidden" name="id" value="<?php echo $sala['id']?>">


<!-- Form Name -->
<legend>Editar Sala <?php echo $sala['nome'];?></legend>

<!-- Text input-->

<div class="form-group">
  <label class="col-md-4 control-label">Nome</label>  
  <div class="col-md-4 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input  name="nome" placeholder="Nome" class="form-control nome"  type="text" value="<?php echo $sala['nome'];?>">
    </div>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label">Capacidade</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
  <input name="capacidade" placeholder="Capacidade" class="form-control capacidade"  type="text" value="<?php echo $sala['capacidade'];?>">
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

