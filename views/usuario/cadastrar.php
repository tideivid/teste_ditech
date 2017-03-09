<?php   require_once '../../assets/template/header.php'; ?>
<?php   require_once '../../assets/template/menu.php'; ?>
<div class="container">

<form class="form-horizontal" action="<?php echo URL;?>controlers/usuario/usuario.php" method="post"  id="form_cadastro">
<input type="hidden" name="op" value="cadastrar">

<!-- Form Name -->
<legend>Cadastro de Usuário</legend>

<!-- Text input-->

<div class="form-group">
  <label class="col-md-4 control-label">Nome</label>  
  <div class="col-md-4 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input  name="nome" placeholder="Nome" class="form-control"  type="text">
    </div>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label">E-Mail</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
  <input name="email" placeholder="E-Mail" class="form-control"  type="text">
    </div>
  </div>
</div>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label">Senha</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
  <input name="senha" placeholder="******" class="form-control"  type="password">
    </div>
  </div>
</div>

<!-- Select Basic -->
   
<div class="form-group"> 
  <label class="col-md-4 control-label">Tipo</label>
    <div class="col-md-4 selectContainer">
    <div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
    <select name="tipo" class="form-control selectpicker" >
      <option value="1">Admin</option>
      <option value="0" selected>Comun</option>

    </select>
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
</div>
    </div><!-- /.container -->
<?php   require_once '../../assets/template/footer.php'; ?>

