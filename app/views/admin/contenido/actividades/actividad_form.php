<?php


	if (!isset($this->session->userdata['logged_in'])) {
		
		header("location: admin/login");
	}
?>
<div id="main">
	<div class="w-container">
		<div id="registar-actividad-form">
			<h2>
				<?php if($tipo_form=="editar"){ ?>
					Editar actividad
				<?php }else{ ?>
					Registro de actividad nueva<?php 
					} ?>
					
			</h2>
			<hr/>
			<?php
			echo "<div class='error_msg'>";
			echo validation_errors();
			echo "</div>";
			if($tipo_form=="editar"){
				echo form_open(base_url().'admin/contenido/actividad/editar/'.$result[0]->id);
			}else{
				echo form_open(base_url().'admin/contenido/actividad/crear');
			}
			

			echo "<div class='error_msg'>";
			if (isset($message_display)) {
				echo $message_display;
			}
			echo "</div>";

			echo form_label('Nombre : ');
			echo"<br/>";

			if($tipo_form=="editar"){
				echo form_input('nombre', $result[0]->nombre);
			}else{
				echo form_input('nombre');
			}
			echo"<br/>";
			echo"<br/>";
			echo form_label('Código : ');
			echo"<br/>";

			if($tipo_form=="editar"){
				echo form_input('codigo', $result[0]->codigo);
			}else{
				echo form_input('codigo');
			}
			echo"<br/>"; 
			echo"<br/>";
			echo form_label('Institucion : ');
			echo"<br/>";
			if(isset($result_instituciones)){
				//exit(var_export($result_instituciones));
				$options = array();
				$options[0] = "- Seleccione un valor -";
				$selected = 0;
				if($tipo_form=="editar"){
					if($result[0]->id_institucion!= null){
						$selected = $result[0]->id_institucion;
					}
				}
				foreach ($result_instituciones as  $value) {
					$options[$value->id] = $value->nombre;
				}

				echo form_dropdown('institucion', $options, $selected);
			}
			echo"<br/>";
			echo"<br/>";
			echo form_label('Ano : ');
			echo"<br/>";
			if(isset($result_ano)){
				//exit(var_export($result_instituciones));
				$options = array();
				$options[0] = "- Seleccione un valor -";
				$selected = 0;
				if($tipo_form=="editar"){
					if($result[0]->id_ano!= null){
						$selected = $result[0]->id_ano;
					}
				}
				foreach ($result_ano as  $value) {
					$options[$value->id] = $value->ano;
				}

				echo form_dropdown('ano', $options, $selected);
			}
			echo"<br/>";
			echo"<br/>";
			echo form_label('Categoria : ');
			echo"<br/>";
			if(isset($result_categoria)){
				//exit(var_export($result_instituciones));
				$options = array();
				$options[0] = "- Seleccione un valor -";
				$selected = 0;
				if($tipo_form=="editar"){
					if($result[0]->id_categoria!= null){
						$selected = $result[0]->id_categoria;
					}
				}

				foreach ($result_categoria as  $value) {
					$options[$value->id] = $value->nombre;
				}

				echo form_dropdown('categoria', $options, $selected);
			}
			echo"<br/>";
			echo"<br/>";
			echo form_label('Estado : ');
			echo"<br/>";
			if(isset($result_estado)){
				//exit(var_export($result_instituciones));
				$options = array();
				$options[0] = "- Seleccione un valor -";
				$selected = 0;
				if($tipo_form=="editar"){
					if($result[0]->id_estado!= null){
						$selected = $result[0]->id_estado;
					}
				}
				foreach ($result_estado as  $value) {
					$options[$value->id] = $value->nombre;
				}

				echo form_dropdown('estado', $options,$selected);
			}
			echo"<br/>";
			echo"<br/>";
			if($tipo_form=="editar"){
				echo form_label('Fotografias : ');
				?>

				<div id="my-dropzone" class="dropzone">
					<div class="dz-message">
						<h3>Arrastre los archivos aqui</h3> o <strong>haga click</strong> para subir
					</div>
				</div>

			<?php
			}
			echo"<br/>";
			echo"<br/>";
			if($tipo_form=="editar"){
				echo form_submit('submit', 'Guardar Actividad');
			}else{
				echo form_submit('submit', 'Registrar Actividad');
			}

			echo form_close();
			

			?>
		</div>
	</div>
</div>

