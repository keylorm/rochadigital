<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Solicitud_fotografias extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct()
    {
	    parent::__construct();
	    // Load form helper library
   		$this->load->helper('form');

   		// Load form validation library
   		$this->load->library('form_validation');

   		// Load session library
   		$this->load->library('session');

   		// Load database
   		$this->load->model('general');

      $this->load->helper('url_helper');
      $this->load->library('email');
    }


 	public function index()
	{
		if($this->input->get('codigo')){
			$codigo = $this->input->get('codigo');
			$data = array(
              'codigo' => $codigo,
            );

            if(isset($_SESSION['pedido'])){
			    unset($_SESSION['pedido']);
			}
            $nombre_tabla='actividad';
            $result = $this->general->consultar_codigo($nombre_tabla, $data);
            if ($result == TRUE) {
              	$this->session->set_userdata('codigo',$codigo);
                redirect(base_url('/fotografias/listado-fotografias/'));                
            } else {
            	$data['error_message'] = 'El código ingresado no coincide con ninguna actividad registrada o la actividad aun no tiene las fotografias listas';
            }
            $data['titulo'] = 'Búsqueda de actividad por código';
			$data['meta_desc'] = '';
			$data['meta_keywords'] = '';
			$data['vista']  = 'busqueda_actividad_codigo_form';

		}elseif($this->input->post()){
			$this->form_validation->set_rules('codigo', 'Código', 'trim|required');
	        if ($this->form_validation->run() == FALSE) {
	            $data['titulo'] = 'Búsqueda de actividad por código';
				$data['meta_desc'] = '';
				$data['meta_keywords'] = '';
				$data['vista']  = 'busqueda_actividad_codigo_form';
	              
	        } else {
	        	$codigo=$this->input->post('codigo');
	            $data = array(
	              'codigo' => $codigo,
	            );

	            if(isset($_SESSION['pedido'])){
				    unset($_SESSION['pedido']);
				}
	            $nombre_tabla='actividad';
	            $result = $this->general->consultar_codigo($nombre_tabla, $data);
	            if ($result == TRUE) {
	              	$this->session->set_userdata('codigo',$codigo);
	                redirect(base_url('/fotografias/listado-fotografias/'));                
	            } else {
	            	$data['error_message'] = 'El código ingresado no coincide con ninguna actividad registrada o la actividad aun no tiene las fotografias listas';
	            }
	            $data['titulo'] = 'Búsqueda de actividad por código';
				$data['meta_desc'] = '';
				$data['meta_keywords'] = '';
				$data['vista']  = 'busqueda_actividad_codigo_form';
	              
	          }

	      }else{
	        $data['titulo'] = 'Búsqueda de actividad por código';
			$data['meta_desc'] = '';
			$data['meta_keywords'] = '';
			$data['vista']  = 'busqueda_actividad_codigo_form';
	        
	       
	      }
		
		
		
		$this->load->view('index', $data);
	}


	public function listado_fotografias(){

		if($this->session->has_userdata('codigo')){

			$codigo = $this->session->userdata('codigo');

			$data = array(
              'codigo' => $codigo,
            );
            $nombre_tabla='actividad';
            $result = $this->general->consultar_actividad_por_codigo($nombre_tabla, $data);

            //exit(var_export($result));
            if ($result != FALSE) {
              	foreach ($result as $actividad) {
              		$id_actividad = $actividad->id;
              		$data['id_actividad'] = $id_actividad;
              		$data['nombre_actividad'] = $actividad->nombre;
              		$data['codigo_actividad'] = $actividad->codigo;

              		if(isset($_SESSION['pedido'])){
					    $data['pedido'] = $_SESSION['pedido'];
					}

					$_SESSION['id_actividad'] = $id_actividad;

              		$nombre_tabla_fotografia = 'fotografia';
              		$data2 = array(
		              'id_actividad' => $id_actividad,
		            );

		            $result_fotografias = $this->general->consultar_fotografias_actividad($nombre_tabla_fotografia, $data2);

		            if($result_fotografias!=false){
		            	$data['fotografias'] = $result_fotografias;
		            }

		            $nombre_tabla_tamanos = 'tamano_foto';
		            $result_tamanos = $this->general->listado_taxonomias($nombre_tabla_tamanos);
			        if($result_tamanos != false){
			          $data['result_tamanos'] = $result_tamanos;
			          
			        }
		            //exit(var_export($result_fotografias));
              	}
              	

            } else {
            	$data['error_message'] = 'No se encuentra una actividad con el código ingresado. Intente ingresar el código nuevamente';
            }
			$data['titulo'] = 'Listado de fotografias';
			$data['meta_desc'] = '';
			$data['meta_keywords'] = '';
			$data['vista']  = 'listado_fotografias';
			$this->load->view('index', $data);
		}else{
			redirect(base_url('/fotografias/buscar-actividad-codigo/'));
		}
	}

	public function obtener_detalle_fotografia(){
		if($this->input->post()){
			$nombre_tabla = 'fotografia';
			$data = array(
				'id' => $this->input->post('id_fotografia')
				);

			$result = $this->general->consultar_detalle_fotografia($nombre_tabla, $data);

			echo json_encode($result);
		
		}
	}

	public function add_photo_order(){
		if($this->input->post()){

			$nombre_tabla = 'fotografia';
			if($this->input->post('imageid')){
				$data = array(
				'id' => $this->input->post('imageid'),
				);



				$result = $this->general->consultar_detalle_fotografia($nombre_tabla, $data);
				
				$contador = 0; 
				$pedido = array(
						'imageid' => $this->input->post('imageid'),
						'activityid' => $this->input->post('activityid'),
						'cantidad' => $this->input->post('cantidad'),
						'tamano' => $this->input->post('tamano'),
						'indicaciones' => $this->input->post('indicaciones'),
					);

				$nombre_tabla_tamanos = 'tamano_foto';
	            $result_tamanos = $this->general->listado_taxonomias($nombre_tabla_tamanos);
		        if($result_tamanos != false){
		        	foreach ($result_tamanos as $value) {
		        		if($value->id==$this->input->post('tamano')){
		        			$pedido['tamano_string']=$value->nombre;
		        		}
		        		
		        	}
		          
		        }

				if($result!=false){
					foreach ($result as $key => $value) {
						$pedido['image_data'] = $value;
					}
				}

				if(!isset($_SESSION['pedido'])){
				    $_SESSION['pedido'] = array();
				}

				if(count($_SESSION['pedido'])>0){
					$contador = count($_SESSION['pedido']);

				}
				$pedido['sessionid']= $contador+1;

				$_SESSION['pedido'][$contador+1]=$pedido;
		

				

				echo json_encode($this->session->userdata('pedido'));
			}
			
			
		
		}
	}


		public function delete_photo_order(){
		if($this->input->post()){

			
			if($this->input->post('sessionid')){
				$sessionid =$this->input->post('sessionid');


				unset($_SESSION['pedido'][$sessionid]);

				
		

				

				echo json_encode(array('result' => true, 'sessionid'=>$sessionid));
				//echo json_encode($this->session->userdata('pedido'));
			}
			
			
		
		}
	}



	public function formulario()
	{
		//var_export($_SESSION);
		if($this->input->post()){
			$this->form_validation->set_rules('nombre', 'nombre', 'trim|required');
			$this->form_validation->set_rules('apellidos', 'apellidos', 'trim|required');
			$this->form_validation->set_rules('telefono', 'telefono', 'trim|required');
			$this->form_validation->set_rules('direccion', 'direccion', 'trim|required');
	        if ($this->form_validation->run() == FALSE) {
	            $data['titulo'] = 'Información de contacto';
				$data['meta_desc'] = '';
				$data['meta_keywords'] = '';
				$data['vista']  = 'formulario_solicitud_fotografias';
	              
	        } else {
	        	
	            $data_solicitud = array(
	            	'id_actividad' => $_SESSION['id_actividad'],
	              	'nombre' => $this->input->post('nombre'),
	              	'apellidos' => $this->input->post('apellidos'),
	              	'telefono' => $this->input->post('telefono'),
	              	//'celular' => $this->input->post('celular'),
	              	'correo' => $this->input->post('correo'),
	              	'direccion' => $this->input->post('direccion'),
	              	'estado' => 1,
	            );

	            
	            $nombre_tabla='solicitud';
	            $result = $this->general->registrar_solicitud($nombre_tabla, $data_solicitud);
	            $data['solicitud_exitosa'] = false;
	            if ($result != FALSE) {

	              	if (isset($_SESSION['pedido'])){
	              		foreach ($_SESSION['pedido'] as $key => $value) {
	              			$data2 = array(
	              					'id_solicitud' => $result,
	              					'id_fotografia' => $value['imageid'],
	              					'id_tamano' => $value['tamano'],
	              					'cantidad' => $value['cantidad'], 
	              					'indicaciones' => $value['indicaciones'], 
	              				);

	              			$result2 = $this->general->registrar_solicitud('detalle_solicitud', $data2);

	              			if($result2 != FALSE){
	              				$data['solicitud_exitosa'] = true;
	              				

	              			}
	              		}

	              		
	              	}


	              	if($data['solicitud_exitosa']==true){
	              		$data['id_solicitud'] = $result;
	              		$this->general->enviar_correo($result, $data_solicitud['nombre'], $data_solicitud['apellidos'], $data_solicitud['telefono'], $data_solicitud['correo']);
	              	}

	              	unset($_SESSION);


	            } else {
	            	$data['error_message'] = 'Hubo un error al ingresar la solicitud. Por favor escríbanos al correo grocha23@hotmail.com o llamenos al número 8830 0706';
	            }

	            $data['titulo'] = 'Información de contacto';
				$data['meta_desc'] = '';
				$data['meta_keywords'] = '';
				$data['vista']  = 'formulario_solicitud_fotografias';
	              
	          

	      	}
		}
	    else{
	    	//exit(var_export($_SESSION['pedido']));
	    	if(!empty($_SESSION['pedido'])){
	    		$data['titulo'] = 'Información de contacto';
				$data['meta_desc'] = '';
				$data['meta_keywords'] = '';
				$data['vista']  = 'formulario_solicitud_fotografias';
	    	}else{
	    		$this->session->set_flashdata('error_pedido', 'Debe añadir fotografias al pedido para solicitar la cotización.');
	    		redirect(base_url('/fotografias/listado-fotografias/'));
	    	}
	    
	        
	       
	    }
		
		
		
		$this->load->view('index', $data);
	}



	function solicitud_admin_index(){
		if(isset($this->session->userdata['logged_in'])){
	      

	        $nombre_tabla_estado = 'estado_solicitud';
	        $result_estado_solicitud = $this->general->listado_taxonomias($nombre_tabla_estado);
	        if($result_estado_solicitud != false){
	          $data['result_estado_solicitud'] = $result_estado_solicitud;
	          
	        } 
	        $nombre_tabla_institucion = 'institucion_actividad';
	        $result_instituciones = $this->general->listado_taxonomias($nombre_tabla_institucion);
	        if($result_instituciones != false){
	          $data['result_instituciones'] = $result_instituciones;
	          
	        }
	        $nombre_tabla_categoria = 'categoria_actividad';
	        $result_categoria = $this->general->listado_taxonomias($nombre_tabla_categoria);
	        if($result_categoria != false){
	          $data['result_categoria'] = $result_categoria;
	          
	        }
	        
	        $nombre_tabla_ano = 'ano_actividad';
	        $result_ano = $this->general->listado_taxonomias($nombre_tabla_ano);
	        if($result_ano != false){
	          $data['result_ano'] = $result_ano;
	          
	        }
	        
	        $condicion ="actividad.id = solicitud.id_actividad";
	        if($this->input->get()){

	        	if($this->input->get('institucion')){
	        		if($condicion!=""){
	        			$condicion .= " and ";
	        		}
	        		$condicion .= "actividad.id_institucion = ".$this->input->get('institucion');
	        	}
	        	if($this->input->get('estado')){
	        		if($condicion!=""){
	        			$condicion .= " and ";
	        		}
	        		$condicion .= "solicitud.estado = ".$this->input->get('estado');
	        	}
	        	if($this->input->get('categoria')){
	        		if($condicion!=""){
	        			$condicion .= " and ";
	        		}
	        		$condicion .= "actividad.id_categoria = ".$this->input->get('categoria');
	        	}
	        	if($this->input->get('ano')){
	        		if($condicion!=""){
	        			$condicion .= " and ";
	        		}
	        		$condicion .= "actividad.id_ano = ".$this->input->get('ano');
	        	}
	        	if($this->input->get('nombre')){
	        		if($condicion!=""){
	        			$condicion .= " and ";
	        		}
	        		$condicion .= "solicitud.nombre LIKE '%".$this->input->get('nombre')."%'";
	        	}
	        	if($this->input->get('apellidos')){
	        		if($condicion!=""){
	        			$condicion .= " and ";
	        		}
	        		$condicion .= "solicitud.apellidos LIKE '%".$this->input->get('apellidos')."%'";
	        	}

	        	if($this->input->get('actividad_nombre')){
	        		if($condicion!=""){
	        			$condicion .= " and ";
	        		}
	        		$condicion .= "actividad.nombre LIKE '%".$this->input->get('actividad_nombre')."%'";
	        	}

	        }
	        
	        $campos = "solicitud.id as idSolicitud, solicitud.nombre as nombreSolicitud, solicitud.apellidos as apellidosSolicitud, solicitud.id_actividad as idactividadSolicitud, solicitud.estado as estadoSolicitud, solicitud.fecha as fechaSolicitud, solicitud.precio as precioSolicitud, actividad.nombre as nombreActividad, actividad.codigo as codigoActividad";

	        $orderby = "solicitud.fecha";
	        $nombre_tabla="solicitud, actividad";
	        $result = $this->general->listado_solicitudes($nombre_tabla, $campos, $condicion, $orderby);
	        if($result != false){
	          $data['result'] = $result;
	          
	        }

	        $data['titulo'] = 'Actividades - Admin';
	        $data['meta_desc'] = '';
	        $data['meta_keywords'] = '';
	        $data['vista']  = 'admin/solicitud/listado_solicitudes';
	        
	        
	      }else{
	          
	        $data['titulo'] = 'Log in - Admin';
            $data['meta_desc'] = '';
            $data['meta_keywords'] = '';
            $data['vista']  = 'admin/login';
	            
	            
	      }
       	  $this->load->view('index', $data);
	}


	   public function solicitud_admin_detalle(){
	    $id = $this->uri->segment(4);

	    if(isset($this->session->userdata['logged_in'])){
	        
	        $nombre_tabla_editar = 'solicitud';

	        $nombre_tabla_institucion = 'institucion_actividad';
	        $result_instituciones = $this->general->listado_taxonomias($nombre_tabla_institucion);
	        if($result_instituciones != false){
	          $data['result_instituciones'] = $result_instituciones;
	          
	        }

	        $nombre_tabla_estado = 'estado_solicitud';
	        $result_estado = $this->general->listado_taxonomias($nombre_tabla_estado);
	        if($result_estado != false){
	          $data['result_estado'] = $result_estado;
	          
	        }



	        if($this->input->post()){
	          

	          if($this->input->post('estado')!=0){
              	$data_form['solicitud.estado'] = $this->input->post('estado');
              }else{
              	$data_form['solicitud.estado'] = null;
              }
               if($this->input->post('precio')!=""){
              	$data_form['solicitud.precio'] = $this->input->post('precio');
              }else{
              	$data_form['solicitud.precio'] = null;
              }
              if($this->input->post('observaciones')!=""){
              	$data_form['solicitud.observaciones'] = $this->input->post('observaciones');
              }else{
              	$data_form['solicitud.observaciones'] = null;
              }
		             
		             
	          $result = $this->general->editar_contenido($nombre_tabla_editar, $id, $data_form);
	          if ($result == TRUE) {
	              $data['message_display'] = '¡ Solicitud Actualizada con éxito !';
	              $data['message_type'] = 'alert-success';
	          }


	         

	        }
	        $nombre_tabla = 'solicitud, actividad';

	        //$campos = "solicitud.id as idSolicitud, solicitud.nombre as nombreSolicitud, solicitud.apellidos as apellidosSolicitud, solicitud.id_actividad as idactividadSolicitud, solicitud.telefono as telefonoSolicitud, solicitud.celular as celularSolicitud, solicitud.correo as correoSolicitud, solicitud.direccion as direccionSolicitud, solicitud.fecha as fechaSolicitud, solicitud.estado as estadoSolicitud, solicitud.observaciones as observacionesSolicitud, actividad.nombre as nombreActividad";


	        $campos = "solicitud.id as idSolicitud, solicitud.nombre as nombreSolicitud, solicitud.apellidos as apellidosSolicitud, solicitud.id_actividad as idactividadSolicitud, solicitud.telefono as telefonoSolicitud, solicitud.correo as correoSolicitud, solicitud.direccion as direccionSolicitud, solicitud.fecha as fechaSolicitud, solicitud.estado as estadoSolicitud, solicitud.precio as precioSolicitud, solicitud.observaciones as observacionesSolicitud, actividad.nombre as nombreActividad";
	        $condicion = "solicitud.id = ".$id." and actividad.id=solicitud.id_actividad";

	        $result = $this->general->consultar_solicitud($nombre_tabla, $campos, $condicion);

	        $nombre_tabla_fotografia = 'detalle_solicitud,fotografia,tamano_foto';
	        $campos_fotografia = 'detalle_solicitud.id as idDetalleSolicitud, fotografia.id as idFotografia, fotografia.filename as filenameFotografia, fotografia.path as pathFotografia, tamano_foto.nombre as nombreTamano, detalle_solicitud.cantidad as cantidadSolicitud, detalle_solicitud.indicaciones as indicacionesSolicitud';
	        $condicion_fotografia = 'detalle_solicitud.id_solicitud = '.$id.' and fotografia.id = detalle_solicitud.id_fotografia and tamano_foto.id = detalle_solicitud.id_tamano';
	        $result_fotografias = $this->general->consultar_solicitud($nombre_tabla_fotografia, $campos_fotografia, $condicion_fotografia);


	        if($result!=false){
	          $data['result'] = $result;
	          if($result_fotografias !=false) {
	          	$data['result_fotografias'] = $result_fotografias;
	          }
	          $data['tipo_form'] = "editar";
	          $data['titulo'] = 'Detalle de Solicitud - Admin';
	          $data['meta_desc'] = '';
	          $data['meta_keywords'] = '';
	          $data['vista']  = 'admin/solicitud/detalle_solicitud';

	        }else{
	          redirect(base_url('/admin/solicitud/listado-solicitudes'));
	        }

	      
	    }else{
	      $data['titulo'] = 'Log in - Admin';
	      $data['meta_desc'] = '';
	      $data['meta_keywords'] = '';
	      $data['vista']  = 'admin/login';
	    }
	    $this->load->view('index', $data);
    }


}

?>