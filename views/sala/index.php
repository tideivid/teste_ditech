<?php   require_once '../../assets/template/header.php'; ?>
<?php   require_once '../../assets/template/menu.php'; ?>
<?php   require_once '../../assets/template/mensagens.php';?>
<?php   require_once '../../controlers/sala/sala.php';?>
<div class="container">

  <?php
    $lista = listar();
  ?>


  <h2>Salas</h2>
              
  <table class="table table-hover" id="table_usuario">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Capacidade</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <?php
        foreach ($lista as $l) {?>
          <tr> 
            <td><?php echo $l['id'];?></td>
            <td><?php echo $l['nome'];?></td>
            <td><?php echo $l['capacidade'];?></td>
            <td>
              <a href="../sala/editar/<?php echo $l['id'];?>">
                <span class="btn btn-warning">Editar</span>
              </a>
              <a href="../sala/excluir/<?php echo $l['id'];?>" class="btn btn-danger">
                <span >Excluir</span>
              </a>
            </td>
          </tr>          
        <?}?>
    </tbody>
  </table>
</div>
<?php   require_once '../../assets/template/footer.php'; ?>
