<?php


	if (!isset($this->session->userdata['logged_in'])) {
		
		header("location: admin/login");
	}
?>
<div id="main" class="my-4">
	<div class="container">
		<div id="registar-tamanos-foto-form">
			<h2>
				<?php if($tipo_form=="editar"){ ?>
					Editar Tamaño
				<?php }else{ ?>
					Registro de Tamaños<?php 
					} ?>
					
			</h2>
			<hr/>
			<?php
			echo "<div class='error_msg'>";
			echo validation_errors();
			echo "</div>";
			if($tipo_form=="editar"){
				echo form_open('/admin/taxonomia/tamanos-fotos/editar/'.$result[0]->id);
			}else{
				echo form_open('/admin/taxonomia/tamanos-fotos/crear');
			}
			echo form_label('Tamaño : ');
			echo"<br/>";

			if($tipo_form=="editar"){
				echo form_input('tamano', $result[0]->nombre);
			}else{
				echo form_input('tamano');
			}

			echo "<div class='error_msg'>";
			if (isset($message_display)) {
				echo $message_display;
			}
			echo "</div>";
			
			echo"<br/>";
			echo"<br/>";

			if($tipo_form=="editar"){
				echo form_submit('submit', 'Guardar Tamaño', array('class' => 'btn btn-primary'));
			}else{
				echo form_submit('submit', 'Registrar Tamaño', array('class' => 'btn btn-primary'));
			}

			echo form_close();
			?>
			
		</div>
	</div>
</div>