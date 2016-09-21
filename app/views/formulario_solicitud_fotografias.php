<div id="main">
	<div class="w-container">
		
		<div id="formulario-solicitud-fotografias">
			<h2>Información de contacto</h2>
			<hr/>
			<?php echo form_open('/fotografias/formulario'); ?>
			<?php
				echo "<div class='error_msg'>";
				if (isset($error_message)) {
					echo $error_message;
				}
				echo validation_errors();
				echo "</div>";
			?>
			<label>Nombre:</label>
			<input type="text" name="nombre" id="nombre" placeholder=""/><br /><br />

			<label>Apellidos:</label>
			<input type="text" name="apellidos" id="apellidos" placeholder=""/><br /><br />

			<label>Teléfono:</label>
			<input type="text" name="telefono" id="telefono" placeholder=""/><br /><br />

			<label>Celular:</label>
			<input type="text" name="celular" id="celular" placeholder=""/><br /><br />

			<label>Correo electrónico:</label>
			<input type="text" name="correo" id="correo" placeholder=""/><br /><br />

			<label>Dirección:</label>
			<input type="text" name="direccion" id="direccion" placeholder=""/><br /><br />
			
			<input type="submit" value=" Solicitar Fotografías " name="submit"/><br />
			
			<?php echo form_close(); ?>
		</div>
		<div class="controles">
			<div class="atras-container">
				<a href="/fotografias/listado-fotografias">Atrás</a>
			</div>
			
		</div>
		
	</div>
</div>