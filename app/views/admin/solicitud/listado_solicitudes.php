<div id="main">
	<div class="w-container">
		<div id="listado-solicitudes">
			<h2>Solicitudes</h2>
			<hr/>
			


			<?php 

			require_once 'filtro_solicitudes.php';
				if (isset($result)){ 
					//var_export($result);

					?>

					<table border="1" width="100%" cellpadding="5">
						<tr>
							<th>ID</th><th>Nombre de solicitante</th><th>Actividad</th><th>Código de Actividad</th><th>Estado</th><th>Precio</th><th>Fecha de Registro</th><th>Acciones</th>
						</trim(str)>
						<?php 
							$estados = array();
							if(isset($result_estado_solicitud)){
								foreach ($result_estado_solicitud as $value) {
									$estados[$value->id] = $value->nombre;
								}
							}
							
							foreach($result as $key=>$value){ ?>
								<tr>
<td><a href="/admin/solicitud/detalle/<?=$value->idSolicitud;?>"><?=$value->idSolicitud;?></a></td>
									<td><a href="/admin/solicitud/detalle/<?=$value->idSolicitud;?>"><?=$value->nombreSolicitud." ".$value->apellidosSolicitud;?></a></td>
									<td align="center"><a href="/admin/contenido/actividad/editar/<?=$value->idactividadSolicitud;?>"><?=$value->nombreActividad;?></a></td>
									<td align="center"><a href="/admin/contenido/actividad/editar/<?=$value->idactividadSolicitud;?>"><?=$value->codigoActividad;?></a></td>
									<td align="center"><?php if($value->estadoSolicitud!=null){ echo $estados[$value->estadoSolicitud]; } ?></td>
									<td align="center"><?php if($value->precioSolicitud!=null){ echo '₡ '.$value->precioSolicitud; } ?></td>
									<td align="center"><?=$value->fechaSolicitud;?></td>
									<td align="center"><a href="/admin/solicitud/detalle/<?=$value->idSolicitud;?>">Editar</a></td>
								</tr>
						<?php } ?>
					</table>
					<?php //exit(var_export($result));
				}
			?>
			
		</div>
	</div>
</div>