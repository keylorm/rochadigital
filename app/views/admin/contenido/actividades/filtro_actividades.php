
<form action="<?=base_url().'admin/contenido/actividad/'?>" method="get">
<?php  //echo form_open(base_url().'admin/contenido/actividad/'); 

echo "<br />";
echo "<br />";
echo form_label('Nombre : ');
echo"<br/>";
if($this->input->post('nombre')){
	echo form_input('nombre',$this->input->get('nombre'));
}else{
	echo form_input('nombre');
}

echo "<br />";
echo "<br />";
echo form_label('Código : ');
echo"<br/>";

if($this->input->get('codigo')){
	echo form_input('codigo',$this->input->get('codigo'));
}else{
	echo form_input('codigo');
}
echo"<br/>"; 

echo"<br/>";
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
echo"<br/>";
echo"<br/>";

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
echo"<br/>";
echo"<br/>";

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
echo"<br/>";
echo"<br/>";

if(isset($result_estado)){
	//exit(var_export($result_instituciones));
	echo form_label('Estado : ');
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

	echo form_dropdown('estado', $options,$selected);
}

echo form_submit('submit', 'Filtrar');
echo form_close();
echo"<br/>";
echo"<br/>";
?>