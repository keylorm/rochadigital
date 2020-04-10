<?php


	if (!isset($this->session->userdata['logged_in'])) {
		
		header("location: admin/login");
	}
?>
<div id="main" class="my-4">
	<div class="container">
		<div id="registar-ano-form">
			<h2>
				<?php if($tipo_form=="editar"){ ?>
					Editar Año
				<?php }else{ ?>
					Registro de Años<?php 
					} ?>
					
			</h2>
			<hr/>
			<?php
			echo "<div class='error_msg'>";
			echo validation_errors();
			echo "</div>";
			if($tipo_form=="editar"){
				echo form_open('/admin/taxonomia/ano/editar/'.$result[0]->id);
			}else{
				echo form_open('/admin/taxonomia/ano/crear');
			}
			echo form_label('Año : ');
			echo"<br/>";

			if($tipo_form=="editar"){
				echo form_input('ano', $result[0]->ano);
			}else{
				echo form_input('ano');
			}

			echo "<div class='error_msg'>";
			if (isset($message_display)) {
				echo $message_display;
			}
			echo "</div>";
			
			echo"<br/>";
			echo"<br/>";

			if($tipo_form=="editar"){
				echo form_submit('submit', 'Guardar Año', array('class' => 'btn btn-primary'));
			}else{
				echo form_submit('submit', 'Registrar Año', array('class' => 'btn btn-primary'));
			}

			echo form_close();
			?>
			
		</div>
	</div>
</div>