
<div id="main" class="my-4">
	<div class="container">
		<div id="listado-tamanos-fotos">
			<h2>Tamaños de fotografías</h2>
			<hr/>
			<a class="btn btn-success" href="/admin/taxonomia/tamanos-fotos/crear">Registrar Años</a>
			<div class="my-3">
				<?php 
					if (isset($result)){ ?>

						<table border="1" width="100%" cellpadding="5" class="table table-bordered table-hover">
							<tr>
								<th>Tamaño</th><th>Acciones</th>
							</trim(str)>
							<?php 
								foreach($result as $key=>$value){ ?>
									<tr>
										<td><?=$value->nombre;?></td>
										<td align="center"><a class="btn btn-sm btn-primary" href="/admin/taxonomia/tamanos-fotos/editar/<?=$value->id;?>">Editar</a> | <a class="btn btn-sm btn-danger" href="/admin/taxonomia/tamanos-fotos/eliminar/<?=$value->id;?>" onClick="return confirm('¿Seguro que desea eliminar este tamaño?');">Eliminar</a></td>
									</tr>
							<?php } ?>
						</table>
						<?php //exit(var_export($result));
					}
				?>
			</div>
			
			
		</div>
	</div>
</div>