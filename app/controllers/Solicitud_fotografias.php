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
    }


 	public function index()
	{
		
		if($this->input->post()){
			$this->form_validation->set_rules('codigo', 'Codigo', 'trim|required');
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
	            	$data['error_message'] = 'El codigo ingresado no coincide con ninguna actividad registrada o la actividad aun no tiene las fotografias listas';
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
            	$data['error_message'] = 'No se encuentra una actividad con el codigo ingresado. Intente ingresar el codigo nuevamente';
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

				$_SESSION['pedido'][$contador+1]=$pedido;
		

				

				echo json_encode($this->session->userdata('pedido'));
			}
			
			
		
		}
	}


	public function formulario()
	{
		
		if($this->input->post()){
			/*$this->form_validation->set_rules('codigo', 'Codigo', 'trim|required');
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
	            	$data['error_message'] = 'El codigo ingresado no coincide con ninguna actividad registrada o la actividad aun no tiene las fotografias listas';
	            }*/
	            $data['titulo'] = 'Información de contacto';
				$data['meta_desc'] = '';
				$data['meta_keywords'] = '';
				$data['vista']  = 'formulario_solicitud_fotografias';
	              
	          

	      }else{
	        $data['titulo'] = 'Información de contacto';
			$data['meta_desc'] = '';
			$data['meta_keywords'] = '';
			$data['vista']  = 'formulario_solicitud_fotografias';
	        
	       
	      }
		
		
		
		$this->load->view('index', $data);
	}



}
?>