
<div id="main">
	<div class="w-container">
		<div id="registar-estado-form">
			<h2>Estados</h2>
			<hr/>
			<a href="/admin/taxonomia/estado-solicitud/crear">Registrar Estado</a>
			<?php 
				if (isset($result)){ ?>

					<table border="1" width="100%" cellpadding="5">
						<tr>
							<th>Nombre</th><th>Acciones</th>
						</trim(str)>
						<?php 
							foreach($result as $key=>$value){ ?>
								<tr>
									<td><?=$value->nombre;?></td>
									<td align="center"><a href="/admin/taxonomia/estado-solicitud/editar/<?=$value->id;?>">Editar</a> | <a href="/admin/taxonomia/estado-solicitud/eliminar/<?=$value->id;?>" onClick="return confirm('Seguro que desea eliminar este estado?');">Eliminar</a></td>
								</tr>
						<?php } ?>
					</table>
					<?php //exit(var_export($result));
				}
			?>
			
		</div>
	</div>
</div>