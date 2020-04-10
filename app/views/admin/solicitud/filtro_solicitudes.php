
<form action="<?=base_url().'admin/solicitud/listado-solicitudes/'?>" method="get">
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
		<?=form_label('Apellidos : ', 'apellidos');?>
		<br/>
		<?php 
		$data_apellidos = [
			'name' => 'apellidos',
			'id' => 'apellidos',
			'class' => 'form-control'
		];

		if($this->input->get('apellidos')){
			$data_apellidos['value'] = $this->input->get('apellidos');
		} 

		echo form_input($data_apellidos);
		?>
	</div>
	<div class="col-12 col-md-4 col-lg-3">
		<?=form_label('Actividad : ', 'actividad_nombre');?>
		<br/>
		<?php 
		$data_actividad_nombre = [
			'name' => 'actividad_nombre',
			'id' => 'actividad_nombre',
			'class' => 'form-control'
		];

		if($this->input->get('actividad_nombre')){
			$data_actividad_nombre['value'] = $this->input->get('actividad_nombre');
		} 

		echo form_input($data_actividad_nombre);
		?>
	</div>
	<?php
		if(isset($result_instituciones)){ ?>
		<div class="col-12 col-md-4 col-lg-3">
			<?=form_label('Institucion : ', 'institucion');?>
			<br/>
			<?php 
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


			echo form_dropdown('institucion', $options, $selected, $attr_inst); ?>
		</div>
		
	<?php } ?>
	<?php if(isset($result_ano)){ ?>
		<div class="col-12 col-md-4 col-lg-3">
			<?=form_label('Ano : ', 'ano');?>
			<br/>
			<?php
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

			echo form_dropdown('ano', $options, $selected, $attr_ano); ?>
		</div>
	<?php } ?>
	<?php if(isset($result_categoria)){ ?>
		<div class="col-12 col-md-4 col-lg-3">
			<?=form_label('Categoria : ', 'categoria'); ?>
			<br/>
			<?php
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
			?>
		</div>
	<?php } ?>
	
	<?php if(isset($result_estado_solicitud)){ ?>
		<div class="col-12 col-md-4 col-lg-3">
			<?=form_label('Estado de solicitud: ', 'estado'); ?>
			<br/>
			<?php
			$options = array();
			$options[0] = "- Todos -";
			$selected = 0;
			if($this->input->get('estado')){
				
				$selected = $this->input->get('estado');
				
			}
			foreach ($result_estado_solicitud as  $value) {
				$options[$value->id] = $value->nombre;
			}

			$attr_estado = array(
							'class' => 'form-control',
							'id' => 'estado'
						);

			echo form_dropdown('estado', $options,$selected, $attr_estado); ?>
		</div>
	<?php } ?>
	
	<div class="col-12 col-md-4 col-lg-3">
		<br />
		<?php 
			echo form_submit('submit', 'Filtrar', array('class' => 'btn btn-primary'));
			form_close();
		?>
	</div>
</div>