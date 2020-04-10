<?php


	if (!isset($this->session->userdata['logged_in'])) {
		
		header("location: admin/login");
	}
?>
<div id="main">
	<div class="w-container">
		<div id="detalle-solicitud">
			<h2>
				
					Detalle de Solicitud #<?=$result[0]->idSolicitud;?>
				
					
			</h2>
			<hr/>
			<?php
					echo "<div class='error_msg'>";
					
					if (isset($message_display)) {
						echo "<div class='alert ".$message_type."'>";
						echo $message_display;
						echo "</div>";
					}
					echo validation_errors();
					echo "</div>";
					echo"<br/>";
					?>
			<div class="w-row">

				<div class="w-col w-col-5">

					<p><strong>Nombre del Solicitante:		</strong><?=$result[0]->nombreSolicitud." ".$result[0]->apellidosSolicitud;?></p> <br />
					<p><strong>Teléfono del Solicitante:		</strong><?=$result[0]->telefonoSolicitud?></p> <br />
					<!--<p><strong>Celular del Solicitante:		</strong><?=$result[0]->celularSolicitud;?></p> <br />-->
					<p><strong>Correo del Solicitante:		</strong><?=$result[0]->correoSolicitud;?></p> <br />
					<p><strong>Dirección del Solicitante:		</strong><?=$result[0]->direccionSolicitud;?></p> <br />
					<p><strong>Fecha de Solicitud:		</strong><?=$result[0]->fechaSolicitud;?></p> <br />
					<p><strong>Actividad:		</strong><a href="/admin/contenido/actividad/editar/<?=$result[0]->idactividadSolicitud;?>"><?=$result[0]->nombreActividad;?></a></p> <br />
					<?php
					
					
					echo form_open(base_url().'admin/solicitud/detalle/'.$result[0]->idSolicitud);
					
					

					
					echo form_label('Estado: ');
					echo"<br/>";
					if(isset($result_estado)){
						//exit(var_export($result_instituciones));
						$options = array();
						
						
						if($result[0]->estadoSolicitud!= null){
							$selected = $result[0]->estadoSolicitud;
						}
						
						foreach ($result_estado as  $value) {
							$options[$value->id] = $value->nombre;
						}

						echo form_dropdown('estado', $options,$selected);
					}
					echo"<br/>";
					echo"<br/>";
					echo form_label('Precio: ');
					echo"<br/>";

					$data_precio_field = array(
									        'name'          => 'precio',
									        'id'            => 'precio',
									       						        
									        'type'			=> 'number'
									);

									

					if($result[0]->precioSolicitud!=null){
						$data_precio_field['value'] = $result[0]->precioSolicitud;
					}

					echo form_input($data_precio_field);
					echo"<br/>";
					echo"<br/>";
					echo form_label('Observaciones: ');
					echo"<br/>";

					if($result[0]->observacionesSolicitud!=null){
						echo form_textarea('observaciones', $result[0]->observacionesSolicitud);
					}else{
						echo form_textarea('observaciones');
					}
					
					
					echo"<br/>";
					echo"<br/>";
					echo"<br/>";
					echo"<br/>";
					
					echo form_submit('submit', 'Actualizar Solicitud');
					

					echo form_close();
					

					?>
				</div>
				<div class="w-col w-col-7">
					
					<div class="listado">
						<?php if (isset($result_fotografias)){ 
							//var_export($fotografias);
							$contador=0;
							foreach($result_fotografias as $fotografia){
								$contador++; ?>
							<div class="w-row fotografia-detalle-container fotografia-detalle-container-<?=$contador?>">
								<div class="w-col w-col-4 fotografia fotografia-<?=$contador?>">
									<a href="/uploads/images/<?=$result[0]->idactividadSolicitud.'/'.$fotografia->filenameFotografia;?>" class = "colorbox" ><img class="fotografia-img" data-fotografia-id="<?=$fotografia->idFotografia;?>" src="/uploads/images/<?=$result[0]->idactividadSolicitud;?>/thumbs/<?=substr($fotografia->filenameFotografia, 0, strlen($fotografia->filenameFotografia)-4).'_thumb_pequeno'.substr($fotografia->filenameFotografia, -4);?>"/>	</a>						
									
								</div>
								<div class="w-col w-col-8 fotografia-detalle-solicitud">
										<p><strong>Nombre del archivo:		</strong><?=$fotografia->filenameFotografia;?></p> 
										<p><strong>Tamaño:		</strong><?=$fotografia->nombreTamano;?></p> 
										<p><strong>Cantidad:		</strong><?=$fotografia->cantidadSolicitud;?></p> 
										<?php if($fotografia->indicacionesSolicitud != null){ ?>
											<p><strong>Indicaciones:		</strong><?=$fotografia->indicacionesSolicitud;?></p> 
										<?php } ?>
										
								</div>
							</div>
						<?php }
						} ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

