<?php   require_once '../../assets/template/header.php'; ?>
<?php   require_once '../../assets/template/menu.php'; ?>
<div class="container">

<form class="form-horizontal" action="<?php echo URL;?>controlers/sala/sala.php" method="post"  id="sala"> 
<input type="hidden" name="op" value="cadastrar">


<!-- Form Name -->
<legend>Cadastro de Sala</legend>

<!-- Text input-->

<div class="form-group">
  <label class="col-md-4 control-label">Nome</label>  
  <div class="col-md-4 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input  name="nome" placeholder="Nome" class="form-control nome"  type="text">
    </div>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label">Capacidade</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
  <input name="capacidade" placeholder="Capacidade" class="form-control capacidade"  type="text">
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

