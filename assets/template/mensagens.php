<div class="container">
	<?php

		if(isset($_GET['cad'])){
			
			if($_GET['cad'] == 1){
		?>
			<!-- Success message -->
			<div class="alert alert-success" role="alert" id="success_message">
				<?php echo ucfirst($_GET['pg'])?> <i class="glyphicon glyphicon-thumbs-up"></i> 
				Cadastrado com sucesso.
			</div>
		<?php } ?>

		<?php
			if($_GET['cad'] == 0){
		?>
		<!-- Erro message -->
		<div class="alert alert-erro" role="alert" id="erro_message">
			Erro. <i class="glyphicon glyphicon-thumbs-up"></i> 
			Erro ao cadastrar <?php echo $_GET['pg'];?>. Tente novamente. 
	</div>
	<?php }
}
		if(isset($_GET['edit'])){
			
			if($_GET['edit'] == 1){
		?>
			<!-- Success message -->
			<div class="alert alert-success" role="alert" id="success_message">
				<?php echo ucfirst($_GET['pg'])?> <i class="glyphicon glyphicon-thumbs-up"></i> 
				Editado com sucesso.
			</div>
		<?php } ?>

		<?php
			if($_GET['edit'] == 0){
		?>
		<!-- Erro message -->
		<div class="alert alert-erro" role="alert" id="erro_message">
			Erro. <i class="glyphicon glyphicon-thumbs-up"></i> 
			Erro ao editar <?php echo $_GET['pg'];?>. Tente novamente. 
	</div>
	<?php } }
		if(isset($_GET['del'])){
			
			if($_GET['del'] == 1){
		?>
			<!-- Success message -->
			<div class="alert alert-success" role="alert" id="success_message">
				<?php echo ucfirst($_GET['pg'])?> <i class="glyphicon glyphicon-thumbs-up"></i> 
				Deletado com sucesso.
			</div>
		<?php } ?>

		<?php
			if($_GET['del'] == 0){
		?>
		<!-- Erro message -->
		<div class="alert alert-erro" role="alert" id="erro_message">
			Erro. <i class="glyphicon glyphicon-thumbs-up"></i> 
			Erro ao deletar <?php echo $_GET['pg'];?>. Tente novamente. 
	</div>
	<?php } }

	?>
</div>