
<div id="main" class="my-4">
	<div class="container">
		<div id="registar-institucion-form">
			<h2>Categorias</h2>
			<hr/>
			<a class="btn btn-success" href="/admin/taxonomia/categoria/crear">Registrar Categoria</a>
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
										
										<td align="center"><a class="btn btn-sm btn-primary" href="/admin/taxonomia/categoria/editar/<?=$value->id;?>">Editar</a> | <a class="btn btn-sm btn-danger" href="/admin/taxonomia/categoria/eliminar/<?=$value->id;?>" onClick="return confirm('Seguro que desea eliminar esta Categoria?');">Eliminar</a></td>
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