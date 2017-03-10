<?php   require_once '../../assets/template/header.php'; ?>
<?php   require_once '../../assets/template/menu.php'; ?>
<?php   require_once '../../assets/template/mensagens.php';?>
<?php   require_once '../../controlers/usuario/usuario.php';?>
<div class="container">

  <?php
    $lista = listar();
  ?>


  <h2>Usuários</h2>
              
  <table class="table table-hover" id="table_usuario">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Tipo</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <?php
        foreach ($lista as $l) {?>
          <tr> 
            <td><?php echo $l['id'];?></td>
            <td><?php echo $l['nome'];?></td>
            <td><?php if($l['tipo'] == 0){echo 'Comun';}else{echo "Admin";};?></td>
            <td>
              <a href="<?php echo URL;?>usuario/editar/<?php echo $l['id'];?>">
                <span class="btn btn-warning">Editar</span>
              </a>
              <a href="<?php echo URL;?>usuario/excluir/<?php echo $l['id'];?>" class="btn btn-danger">
                <span >Excluir</span>
              </a>
            </td>
          </tr>          
        <?}?>
    </tbody>
  </table>
</div>
<?php   require_once '../../assets/template/footer.php'; ?>
