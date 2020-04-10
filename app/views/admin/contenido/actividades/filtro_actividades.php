
<div class="my-5">
	<form action="<?=base_url().'admin/contenido/actividad/'?>" method="get">
	<?php  //echo form_open(base_url().'admin/contenido/actividad/'); ?>
	<div class="row">
		<div class="col-12 col-md-4 col-lg-3">
			<?=form_label('Nombre : ', 'nombre');?>
			<br/>
			<?php 
			$data_name = [
				'name' => 'nombre',
				'id' => 'nombre',
				'class' => 'form-control'
			];

			if($this->input->get('nombre')){
				$data_name['value'] = $this->input->get('nombre');
			} 
			
			echo form_input($data_name);
			?>
		</div>
		<div class="col-12 col-md-4 col-lg-3">
			<?=form_label('Código : ', 'codigo');?>
			<br/>

			<?php 
			$data_codigo = [
				'name' => 'codigo',
				'id' => 'codigo',
				'class' => 'form-control'
			];

			if($this->input->get('codigo')){
				$data_codigo['value'] = $this->input->get('codigo');
			} 
			
			echo form_input($data_codigo);?>
		</div>
		<div class="col-12 col-md-4 col-lg-3">
			<?php if(isset($result_instituciones)){
				//exit(var_export($result_instituciones));
				echo form_label('Institucion : ', 'institucion');
				echo"<br/>";
				$options = array();
				$options[0] = "- Todos -";
				$selected = 0;
				if($this->input->get('institucion')){
					
					$selected = $this->input->get('institucion');
					
				}
				foreach ($result_instituciones as  $value) {
					$options[$value->id] = $value->nombre;
				}

				$attr_inst = array(
					'class' => 'form-control',
					'id' => 'institucion'
				);

				echo form_dropdown('institucion', $options, $selected, $attr_inst);
			}?>
		</div>
		<div class="col-12 col-md-4 col-lg-3">
			<?php 
				
				if(isset($result_ano)){
					//exit(var_export($result_instituciones));
					echo form_label('Ano : ', 'ano');
					echo"<br/>";
					$options = array();
					$options[0] = "- Todos -";
					$selected = 0;
					if($this->input->get('ano')){
						
						$selected = $this->input->get('ano');
						
					}
					foreach ($result_ano as  $value) {
						$options[$value->id] = $value->ano;
					}

					$attr_ano = array(
						'class' => 'form-control',
						'id' => 'ano'
					);

					echo form_dropdown('ano', $options, $selected, $attr_ano);
				}
			?>
		</div>
		<div class="col-12 col-md-4 col-lg-3">
			<?php 
				if(isset($result_categoria)){
					//exit(var_export($result_instituciones));
					echo form_label('Categoria : ', 'categoria');
					echo"<br/>";
					$options = array();
					$options[0] = "- Todos -";
					$selected = 0;
					if($this->input->get('categoria')){
						
						$selected = $this->input->get('categoria');
						
					}

					foreach ($result_categoria as  $value) {
						$options[$value->id] = $value->nombre;
					}

					$attr_cat = array(
						'class' => 'form-control',
						'id' => 'categoria'
					);

					echo form_dropdown('categoria', $options, $selected, $attr_cat);
				}

			?>
		</div>
		<div class="col-12 col-md-4 col-lg-3">
			<?php 
					
				if(isset($result_estado)){
					//exit(var_export($result_instituciones));
					echo form_label('Estado : ', 'estado');
					echo"<br/>";
					$options = array();
					$options[0] = "- Todos -";
					$selected = 0;
					if($this->input->get('estado')){
						
						$selected = $this->input->get('estado');
						
					}
					foreach ($result_estado as  $value) {
						$options[$value->id] = $value->nombre;
					}

					$attr_estado = array(
						'class' => 'form-control',
						'id' => 'estado'
					);

					echo form_dropdown('estado', $options,$selected, $attr_estado);
				}

			?>
		</div>
		<div class="col-12 col-md-4 col-lg-3">
			<br />
			<?php
				echo form_submit('submit', 'Filtrar', array('class' => 'btn btn-primary'));
				echo form_close();
			?>
		</div>
	</div>

</div>
