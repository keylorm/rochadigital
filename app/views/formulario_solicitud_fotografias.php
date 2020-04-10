<div id="main" class="my-4">
	<div class="container">
		<div class="controles">
					<div class="atras-container">
						<a href="/fotografias/listado-fotografias">Atrás</a>
					</div>
					
				</div>
		<?php if(isset($solicitud_exitosa)){
			if($solicitud_exitosa == true){ ?>
				<h1>Solicitud Registrada con éxito</h1>
				<h2>El número de su solicitud es: <br /><?=$id_solicitud;?></h2>
			
						<a href="/fotografias/buscar-actividad-codigo">Buscar otro código</a>
					
			<?php } 
			}else{ ?>
				<div id="formulario-solicitud-fotografias" class="formulario-centrado">
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
					<!--<label>Nombre:</label>-->
					<input type="text" name="nombre" id="nombre" placeholder="Nombre"/><br /><br />

					<!--<label>Apellidos:</label>-->
					<input type="text" name="apellidos" id="apellidos" placeholder="Apellidos"/><br /><br />

					<!--<label>Teléfono:</label>-->
					<input type="text" name="telefono" id="telefono" placeholder="Teléfono"/><br /><br />

					<!--<label>Celular:</label>-->
					<!--<input type="text" name="celular" id="celular" placeholder="Celular"/><br /><br />--:

					<!--<label>Correo electrónico:</label>-->
					<input type="text" name="correo" id="correo" placeholder="Correo electrónico"/><br /><br />

					<!--<label>Dirección:</label>-->
					<input type="text" name="direccion" id="direccion" placeholder="Dirección"/><br /><br />
					
					<input type="submit" value=" Cotizar Fotografías " name="submit"/><br />
					
					<?php echo form_close(); ?>
				</div>
				
		<?php } ?>

		
	</div>
</div>