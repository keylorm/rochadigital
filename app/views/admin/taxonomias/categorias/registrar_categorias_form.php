<?php


	if (!isset($this->session->userdata['logged_in'])) {
		
		header("location: admin/login");
	}
?>
<div id="main">
	<div class="w-container">
		<div id="registar-categoria-form">
			<h2>
				<?php if($tipo_form=="editar"){ ?>
					Editar Categorias
				<?php }else{ ?>
					Registro de Categorias<?php 
					} ?>
					
			</h2>
			<hr/>
			<?php
			echo "<div class='error_msg'>";
			echo validation_errors();
			echo "</div>";
			if($tipo_form=="editar"){
				echo form_open('/admin/taxonomia/categoria/editar/'.$result[0]->id);
			}else{
				echo form_open('/admin/taxonomia/categoria/crear');
			}
			echo form_label('Nombre de la Categoria : ');
			echo"<br/>";

			if($tipo_form=="editar"){
				echo form_input('nombre', $result[0]->nombre);
			}else{
				echo form_input('nombre');
			}

			echo "<div class='error_msg'>";
			if (isset($message_display)) {
				echo $message_display;
			}
			echo "</div>";
			
			echo"<br/>";
			echo"<br/>";

			if($tipo_form=="editar"){
				echo form_submit('submit', 'Guardar Categoria');
			}else{
				echo form_submit('submit', 'Registrar Categoria');
			}

			echo form_close();
			?>
			
		</div>
	</div>
</div>