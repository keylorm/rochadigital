<div id="main">
	<div class="w-container">
		<div id="listado-actividades">
			<h2>Categorias</h2>
			<hr/>
			<a href="/admin/contenido/actividad/crear">Registrar Actividad</a>


			<?php 

			require_once 'filtro_actividades.php';
				if (isset($result)){ 


					?>

					<table border="1" width="100%" cellpadding="5">
						<tr>
							<th>Nombre</th><th>Estado</th><th>Fecha de Registro</th><th>Acciones</th>
						</trim(str)>
						<?php 
							$estados = array();
							if(isset($result_estado)){
								foreach ($result_estado as $value) {
									$estados[$value->id] = $value->nombre;
								}
							}
							foreach($result as $key=>$value){ ?>
								<tr>
									<td><a href="/admin/contenido/actividad/editar/<?=$value->id;?>"><?=$value->nombre;?></a></td>
									<td align="center"><?php if($value->id_estado!=null){ echo $estados[$value->id_estado]; } ?></td>
									<td align="center"><?=$value->fecha_registro;?></td>
									<td align="center"><a href="/admin/contenido/actividad/editar/<?=$value->id;?>">Editar</a> | <a href="/admin/contenido/actividad/eliminar/<?=$value->id;?>" onClick="return confirm('Seguro que desea eliminar esta Actividad?');">Eliminar</a></td>
								</tr>
						<?php } ?>
					</table>
					<?php //exit(var_export($result));
				}
			?>
			
		</div>
	</div>
</div>