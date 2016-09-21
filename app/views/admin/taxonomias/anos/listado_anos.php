
<div id="main">
	<div class="w-container">
		<div id="registar-ano-form">
			<h2>Años</h2>
			<hr/>
			<a href="/admin/taxonomia/ano/crear">Registrar Años</a>
			<?php 
				if (isset($result)){ ?>

					<table border="1" width="100%" cellpadding="5">
						<tr>
							<th>Año</th><th>Acciones</th>
						</trim(str)>
						<?php 
							foreach($result as $key=>$value){ ?>
								<tr>
									<td><?=$value->ano;?></td>
									<td align="center"><a href="/admin/taxonomia/ano/editar/<?=$value->id;?>">Editar</a> | <a href="/admin/taxonomia/ano/eliminar/<?=$value->id;?>" onClick="return confirm('Seguro que desea eliminar este año?');">Eliminar</a></td>
								</tr>
						<?php } ?>
					</table>
					<?php //exit(var_export($result));
				}
			?>
			
		</div>
	</div>
</div>