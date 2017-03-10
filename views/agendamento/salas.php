<?php   require_once '../../assets/template/header.php'; ?>
<?php   require_once '../../assets/template/menu.php'; ?>
<?php   require_once '../../assets/template/mensagens.php';?>
<?php   require_once '../../controlers/agendamento/agendamento.php';?>
<div class="container">

  <?php
    $salas = salas();
  ?>


  <h2>Status das salas <?php echo date('d/m/Y');?></h2>
              
  <table class="table table-hover" id="table_usuario">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Capacidade</th>
        <th>Ocupado</th>
        <th>Livre</th>
      </tr>
    </thead>
    <tbody>
      <?php
        foreach ($salas as $s) {?>
          <tr> 
            <td><?php echo $s['id'];?></td>
            <td><?php echo $s['nome'];?></td>
            <td><?php echo $s['capacidade'];?></td>
            <td>
              <?php 
                $ocupado = ocupado($s['id']);
                echo $ocupado;
              ?>
          </td>
            <td>
               <?php 
                $livre = livre($s['id']);
                echo $livre;
              ?>
            </td>
          </tr>          
        <?}?>
    </tbody>
  </table>
</div>
<?php   require_once '../../assets/template/footer.php'; ?>
