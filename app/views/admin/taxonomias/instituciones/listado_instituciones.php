
<div id="main" class="my-4">
	<div class="container">
		<div id="registar-institucion-form">
			<h2>Instituciones</h2>
			<hr/>
			<a class="btn btn-success" href="/admin/taxonomia/institucion/crear">Registrar Institucion</a>
			<?php 
				if (isset($result)){ ?>
					<div class="my-3">
						<table  border="1" width="100%" cellpadding="5" class="table table-bordered table-hover">
							<tr>
								<th>Nombre</th><th>Acciones</th>
							</trim(str)>
							<?php 
								foreach($result as $key=>$value){ ?>
									<tr>
										<td><?=$value->nombre;?></td>
										<td align="center"><a class="btn btn-sm btn-primary" href="/admin/taxonomia/institucion/editar/<?=$value->id;?>">Editar</a> | <a class="btn btn-sm btn-danger" href="/admin/taxonomia/institucion/eliminar/<?=$value->id;?>" onClick="return confirm('Seguro que desea eliminar esta institucion?');">Eliminar</a></td>
									</tr>
							<?php } ?>
						</table>
						<?php //exit(var_export($result)); ?>
					</div>
					
				<?php 
				}
			?>
			
		</div>
	</div>
</div>