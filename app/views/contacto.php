<div id="main" class="my-4">
	<div class="container">
		
		<div class="contacto-container">
			<h1>Contáctenos</h1>
			
			<hr/>

			<div class="w-row">
						
				<div class="w-col w-col-7">
					<div class="formulario">
						<?php
						
			echo form_open(base_url().'contactenos');
			
			

			echo "<div class='error_msg'>";
			if (isset($message_display)) {
				echo "<div class='alert ".$message_type."'>";
				echo $message_display;
				echo "</div>";
			}
			echo validation_errors();
			echo "</div>";

			echo"<br/>";

			$data_nombre = array(
			        'name'          => 'nombre',
        			'id'            => 'nombre',
        			'maxlength'     => '255',
			        'placeholder'         => 'Nombre'
			);
			echo form_input($data_nombre);
			
			echo"<br/>";
			echo"<br/>";

			$data_correo = array(
			        'name'          => 'correo',
        			'id'            => 'correo',
        			'maxlength'     => '150',
			        'placeholder'         => 'Correo electrónico'
			);
			echo form_input($data_correo);
			
			echo"<br/>";
			echo"<br/>";

			$data_telefono = array(
			        'name'          => 'telefono',
        			'id'            => 'telefono',
        			'maxlength'     => '50',
			        'placeholder'         => 'Teléfono'
			);
			echo form_input($data_telefono);

			echo"<br/>";
			echo"<br/>";

			$data_asunto = array(
			        'name'          => 'asunto',
        			'id'            => 'asunto',
        			'maxlength'     => '255',
			        'placeholder'         => 'Asunto'
			);
			echo form_input($data_asunto);

			echo"<br/>";
			echo"<br/>";

			$data_mensaje = array(
			        'name'          => 'mensaje',
        			'id'            => 'mensaje',
        			'maxlength'     => '500',
			        'placeholder'         => 'Mensaje'
			);
			echo form_textarea($data_mensaje);
			echo"<br/>";
			echo"<br/>";
			
			echo form_submit('submit', 'Enviar');
			

			echo form_close();
			

			?>
					</div>
				</div>

				<div class="w-col w-col-5">
					<div class="info-contacto">
						<h2>Información de Contacto</h2>
						<p><strong>Correos: </strong><br /><a href="mailto:info@rochadigital.co.cr">info@rochadigital.co.cr</a>
						<a href="mailto:rochadigital12@gmail.com">rochadigital12@gmail.com</a><br />
						<br /><br />
						<strong>Teléfonos: </strong><br /><a href="tel:+50688300706">+506 8830 0706</a>
						<a href="tel:+50689516801">+506 8951 6801</a><br />
						</p>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>