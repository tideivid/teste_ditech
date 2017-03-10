<?php   require_once '../../assets/template/header.php'; ?>
<?php   require_once '../../assets/template/menu.php'; ?>
<?php   require_once '../../assets/template/mensagens.php';?>
<?php   require_once '../../controlers/agendamento/agendamento.php';?>
<div class="container">

  <?php
    $lista = listar();
  ?>


  <h2>Agendamentos</h2>
              
  <table class="table table-hover" id="table_usuario">
    <thead>
      <tr>
        <th>ID</th>
        <th>Usuario</th>
        <th>Sala</th>
        <th>Horario</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <?php
        foreach ($lista as $l) {?>
          <tr> 
            <td><?php echo $l['id'];?></td>
            <td><?php echo $l['usuario'];?></td>
            <td><?php echo $l['sala'];?></td>
            <td><?php echo $l['hora'];?></td>
            <td>
              <?php
                if($_SESSION['login']['id'] == $l['id_usuario']){
              ?>
              <a href="<?php echo URL;?>agendamento/editar/<?php echo $l['id'];?>">
                <span class="btn btn-warning">Editar</span>
              </a>
              <a href="<?php echo URL;?>agendamento/excluir/<?php echo $l['id'];?>" class="btn btn-danger">
                <span >Excluir</span>
              </a>
              <?php }?>
            </td>
          </tr>          
        <?}?>
    </tbody>
  </table>
</div>
<?php   require_once '../../assets/template/footer.php'; ?>
