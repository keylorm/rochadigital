
<div id="main" class="my-4">
	<div class="container">
		<div id="registar-estado-form">
			<h2>Estados</h2>
			<hr/>
			<a class="btn btn-success" href="/admin/taxonomia/estado-solicitud/crear">Registrar Estado</a>
			<div class="my-3">
				<?php 
					if (isset($result)){ ?>

						<table border="1" width="100%" cellpadding="5" class="table table-bordered table-hover">
							<tr>
								<th>Nombre</th><th>Acciones</th>
							</trim(str)>
							<?php 
								foreach($result as $key=>$value){ ?>
									<tr>
										<td><?=$value->nombre;?></td>
										<td align="center"><a class="btn btn-sm btn-primary" href="/admin/taxonomia/estado-solicitud/editar/<?=$value->id;?>">Editar</a> | <a class="btn btn-sm btn-danger" href="/admin/taxonomia/estado-solicitud/eliminar/<?=$value->id;?>" onClick="return confirm('Seguro que desea eliminar este estado?');">Eliminar</a></td>
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