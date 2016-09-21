
<div id="main">
	<div class="w-container">
		<div id="registar-institucion-form">
			<h2>Instituciones</h2>
			<hr/>
			<a href="/admin/taxonomia/institucion/crear">Registrar Institucion</a>
			<?php 
				if (isset($result)){ ?>

					<table  border="1" width="100%" cellpadding="5">
						<tr>
							<th>Nombre</th><th>Acciones</th>
						</trim(str)>
						<?php 
							foreach($result as $key=>$value){ ?>
								<tr>
									<td><?=$value->nombre;?></td>
									<td align="center"><a href="/admin/taxonomia/institucion/editar/<?=$value->id;?>">Editar</a> | <a href="/admin/taxonomia/institucion/eliminar/<?=$value->id;?>" onClick="return confirm('Seguro que desea eliminar esta institucion?');">Eliminar</a></td>
								</tr>
						<?php } ?>
					</table>
					<?php //exit(var_export($result));
				}
			?>
			
		</div>
	</div>
</div>