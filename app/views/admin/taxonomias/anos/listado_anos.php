
<div id="main" class="my-4">
	<div class="container">
		<div id="registar-ano-form">
			<h2>Años</h2>
			<hr/>
			<a class="btn btn-success" href="/admin/taxonomia/ano/crear">Registrar Años</a>

			<div class="my-3">
				<?php 
					if (isset($result)){ ?>

						<table border="1" width="100%" cellpadding="5" class="table table-bordered table-hover">
							<tr>
								<th>Año</th><th>Acciones</th>
							</trim(str)>
							<?php 
								foreach($result as $key=>$value){ ?>
									<tr>
										<td><?=$value->ano;?></td>
										<td align="center"><a class="btn btn-sm btn-primary" href="/admin/taxonomia/ano/editar/<?=$value->id;?>">Editar</a> | <a class="btn btn-sm btn-danger" href="/admin/taxonomia/ano/eliminar/<?=$value->id;?>" onClick="return confirm('Seguro que desea eliminar este año?');">Eliminar</a></td>
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