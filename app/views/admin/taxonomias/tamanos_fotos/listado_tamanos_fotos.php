
<div id="main">
	<div class="w-container">
		<div id="listado-tamanos-fotos">
			<h2>Tamaños de fotografías</h2>
			<hr/>
			<a href="/admin/taxonomia/tamanos-fotos/crear">Registrar Años</a>
			<?php 
				if (isset($result)){ ?>

					<table border="1" width="100%" cellpadding="5">
						<tr>
							<th>Tamaño</th><th>Acciones</th>
						</trim(str)>
						<?php 
							foreach($result as $key=>$value){ ?>
								<tr>
									<td><?=$value->nombre;?></td>
									<td align="center"><a href="/admin/taxonomia/tamanos-fotos/editar/<?=$value->id;?>">Editar</a> | <a href="/admin/taxonomia/tamanos-fotos/eliminar/<?=$value->id;?>" onClick="return confirm('¿Seguro que desea eliminar este tamaño?');">Eliminar</a></td>
								</tr>
						<?php } ?>
					</table>
					<?php //exit(var_export($result));
				}
			?>
			
		</div>
	</div>
</div>