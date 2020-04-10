
<form action="<?=base_url().'admin/solicitud/listado-solicitudes/'?>" method="get">
<?php  //echo form_open(base_url().'admin/contenido/actividad/'); 

echo "<div class='w-row'>";
echo "<div class='w-col w-col-3'>";
echo form_label('Nombre : ');
echo"<br/>";
if($this->input->post('nombre')){
	echo form_input('nombre',$this->input->get('nombre'));
}else{
	echo form_input('nombre');
}
echo "</div>";
echo "<div class='w-col w-col-3'>";
echo form_label('Apellidos : ');
echo"<br/>";

if($this->input->get('apellidos')){
	echo form_input('apellidos',$this->input->get('apellidos'));
}else{
	echo form_input('apellidos');
}
echo "</div>";
echo "<div class='w-col w-col-3'>";
echo form_label('Actividad : ');
echo"<br/>";

if($this->input->get('actividad_nombre')){
	echo form_input('actividad_nombre',$this->input->get('actividad_nombre'));
}else{
	echo form_input('actividad_nombre');
}
echo "</div>";

echo "<div class='w-col w-col-3'>";
if(isset($result_instituciones)){
	//exit(var_export($result_instituciones));
	echo form_label('Institucion : ');
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

	echo form_dropdown('institucion', $options, $selected);
}
echo "</div>";
echo "</div>";
echo "<br />";
echo "<br />";
echo "<div class='w-row'>";
echo "<div class='w-col w-col-3'>";
if(isset($result_ano)){
	//exit(var_export($result_instituciones));
	echo form_label('Ano : ');
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

	echo form_dropdown('ano', $options, $selected);
}
echo "</div>";
echo "<div class='w-col w-col-3'>";

if(isset($result_categoria)){
	//exit(var_export($result_instituciones));
	echo form_label('Categoria : ');
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

	echo form_dropdown('categoria', $options, $selected);
}
echo "</div>";
echo "<div class='w-col w-col-3'>";
if(isset($result_estado_solicitud)){
	//exit(var_export($result_instituciones));
	echo form_label('Estado de solicitud: ');
	echo"<br/>";
	$options = array();
	$options[0] = "- Todos -";
	$selected = 0;
	if($this->input->get('estado')){
		
		$selected = $this->input->get('estado');
		
	}
	foreach ($result_estado_solicitud as  $value) {
		$options[$value->id] = $value->nombre;
	}

	echo form_dropdown('estado', $options,$selected);
}
echo "</div>";
echo "<div class='w-col w-col-3'>";
echo "<br />";
echo form_submit('submit', 'Filtrar');
echo "</div>";
echo "</div>";
echo form_close();
echo "<br />";
echo "<br />";
echo "<br />";
echo "<br />";
?>