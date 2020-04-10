<div id="main">
	<div class="w-container">
		
		<div id="listado-fotografias">
			<h1>Fotografías</h1>
			<?php if(isset($nombre_actividad)){ ?><h2><?=$nombre_actividad;?></h2><?php } ?>
			<hr/>
			
			<div class="w-row">
				<?php 
					if($this->session->flashdata('error_pedido')!=null){ ?>
					<div class="alert alert-warning">
					  <strong>¡Atención!</strong> <?=$this->session->flashdata('error_pedido');?>
					</div>
				<?php	
					}
				?>
				
				<div class="w-col w-col-8">
					<div class="listado">
						<?php if (isset($fotografias)){ 
							//var_export($fotografias);
							$contador=0;
							foreach($fotografias as $fotografia){
								$contador++; ?>
							<div class="fotografia fotografia-<?=$contador?>">
								<img class="fotografia-img" data-fotografia-id="<?=$fotografia->id;?>" src="/uploads/images/<?=$fotografia->id_actividad;?>/thumbs/<?=substr($fotografia->filename, 0, strlen($fotografia->filename)-4).'_thumb_pequeno'.substr($fotografia->filename, -4);?>"/>
							</div>
						<?php }
						} ?>
					</div>
				</div>
				<div class="w-col w-col-4">
					<div class="detalle-fotografia">
						<div class="detalle-fotografia-img">
							<div class="default-preview">
								<p>Vista previa</p>
							</div>
							<a href="" class = "colorbox" ><img src="" /></a>

						</div>
						<div class="detalle-fotografia-titulo">
							<p></p>
						</div>
						<div class="detalle-fotografia-order-form">
							<?php echo form_open('',array('id'=>'form-add-pedido', 'class'=> 'formulario-pedido')); 

							echo form_hidden('imageid', '');
							echo form_hidden('activityid', $id_actividad);
							?>
							<div class="w-row">
								<div class="w-col w-col-6">
									<label>Cantidad:</label><br />
									<?php $data_number_field = array(
									        'name'          => 'cantidad',
									        'id'            => 'cantidad',
									        'value'         => '1',							        
									        'type'			=> 'number'
									);

									echo form_input($data_number_field);
									?>
								</div>
								<div class="w-col w-col-6">
									<label>Tamaño:</label><br />
									<?php if(isset($result_tamanos)){
										//exit(var_export($result_instituciones));
										
										$options = array();
										
										foreach ($result_tamanos as  $value) {
											$options[$value->id] = $value->nombre;
										}

										echo form_dropdown('tamano', $options);
									}
									?>

								</div>
							</div>
							<br />
							<br />
				
							<label>Indicaciones especiales sobre la fotografía:</label><br />
							<?php 
								
								$data_indicaciones_field = array(
							        'name'          => 'indicaciones',
							        'id'            => 'indicaciones',
							        
								);
								
								

								echo form_textarea($data_indicaciones_field);
							
							?>
							<br />
							<br />
							<input type="submit" value=" Añadir al pedido " name="submit"/><br />
							
							<?php echo form_close(); ?>
						</div>
						
					</div>
				</div>


			</div>
			
				<div class="w-row">
					<div class="w-col w-col-12">
						<div class="carrito <?php if(!isset($pedido)){?> hidden <?php } ?>">
							<div class="controles">
								<div class="atras-container">
									<a href="/fotografias/buscar-actividad-codigo">Atrás</a>
								</div>
								<div class="siguiente-container">
									<a href="/fotografias/formulario">Siguiente</a>
								</div>
							</div>
							<h2>Pedido</h2>
							<div class="carrito-list">
								<?php
										if (isset($pedido)){
											//var_export($pedido);
											foreach ($pedido as $key => $value) {
												
												echo '<div class="carrito-list-item carrito-list-item-'.$key.'">';
												if (isset($value['image_data'])){ 
													
														?>
														<img class="fotografia-img" data-fotografia-id="<?=$value['image_data']->id;?>" src="/uploads/images/<?=$value['image_data']->id_actividad;?>/thumbs/<?=substr($value['image_data']->filename, 0, strlen($value['image_data']->filename)-4).'_thumb_pequeno'.substr($value['image_data']->filename, -4);?>"/>

														<div class="fotografia-detalle">

															<p>
																<span class="nombre-fotografia-carrito"><strong>Fotografía: </strong><?=substr($value['image_data']->filename, 0, strlen($value['image_data']->filename)-4);?><br /></span>
																<strong>Cantidad: </strong> <?=$value['cantidad'];?><br />
																
																<strong>Tamaño: </strong> <?=$value['tamano_string'];?><br /><br />

																<button  class="eliminar-foto-pedido" data-session-item-id="<?=$value['sessionid'];?>">Eliminar</button>
															</p>

														</div>
													
												<?php }
												
												echo '</div>';
											}
										}
									 ?>

								
							</div>
							<div class="controles">
								<div class="atras-container">
									<a href="/fotografias/buscar-actividad-codigo">Atrás</a>
								</div>
								<div class="siguiente-container">
									<a href="/fotografias/formulario">Siguiente</a>
								</div>
							</div>
						</div>
					</div>


				</div>
			
		</div>

		
	</div>
</div>