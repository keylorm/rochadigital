<div id="main">
	<div class="w-container">
		
		<div id="busqueda-actividad-codigo-form" class="formulario-centrado">
			<h2>Búsqueda de actividad por código</h2>
			<hr/>
			<?php echo form_open('/fotografias/buscar-actividad-codigo'); ?>
			<?php
				echo "<div class='error_msg'>";
				if (isset($error_message)) {
					echo $error_message;
				}
				echo validation_errors();
				echo "</div>";
			?>
			<!--<label>Código de actividad:</label>-->
			<input type="text" name="codigo" id="codigo" placeholder="Código de actividad"/><br /><br />
			
			<input type="submit" value=" Buscar " name="submit"/><br />
			
			<?php echo form_close(); ?>
		</div>
		
	</div>
</div>