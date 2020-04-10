<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Actividad extends CI_Controller {

	private $upload_path = "./uploads/tmp";
	private $images_path = "./uploads/images";
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
      $this->load->helper('url');
      $this->load->library('image_lib');
    }


    public function index() {
	      if(isset($this->session->userdata['logged_in'])){
	      

	        $nombre_tabla_estado = 'estado_actividad';
	        $result_estado = $this->general->listado_taxonomias($nombre_tabla_estado);
	        if($result_estado != false){
	          $data['result_estado'] = $result_estado;
	          
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
	        
	        $condicion ="";
	        if($this->input->get()){

	        	if($this->input->get('institucion')){
	        		if($condicion!=""){
	        			$condicion .= " and ";
	        		}
	        		$condicion .= "id_institucion = ".$this->input->get('institucion');
	        	}
	        	if($this->input->get('estado')){
	        		if($condicion!=""){
	        			$condicion .= " and ";
	        		}
	        		$condicion .= "id_estado = ".$this->input->get('estado');
	        	}
	        	if($this->input->get('categoria')){
	        		if($condicion!=""){
	        			$condicion .= " and ";
	        		}
	        		$condicion .= "id_categoria = ".$this->input->get('categoria');
	        	}
	        	if($this->input->get('ano')){
	        		if($condicion!=""){
	        			$condicion .= " and ";
	        		}
	        		$condicion .= "id_ano = ".$this->input->get('ano');
	        	}
	        	if($this->input->get('nombre')){
	        		if($condicion!=""){
	        			$condicion .= " and ";
	        		}
	        		$condicion .= "nombre LIKE '%".$this->input->get('nombre')."%'";
	        	}
	        	if($this->input->get('codigo')){
	        		if($condicion!=""){
	        			$condicion .= " and ";
	        		}
	        		$condicion .= "codigo LIKE '%".$this->input->get('codigo')."%'";
	        	}

	        }
	        



	        $nombre_tabla="actividad";
	        $result = $this->general->listado_contenido($nombre_tabla, $condicion);
	        if($result != false){
	          $data['result'] = $result;
	          
	        }

	        $data['titulo'] = 'Actividades - Admin';
	        $data['meta_desc'] = '';
	        $data['meta_keywords'] = '';
	        $data['vista']  = 'admin/contenido/actividades/listado_actividades';
	        
	        
	      }else{
	          
	        $data['titulo'] = 'Log in - Admin';
            $data['meta_desc'] = '';
            $data['meta_keywords'] = '';
            $data['vista']  = 'admin/login';
	            
	            
	      }
       	  $this->load->view('index', $data);

        
    }



    public function actividad_form(){
    	if(isset($this->session->userdata['logged_in'])){
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
	        $nombre_tabla_estado = 'estado_actividad';
	        $result_estado = $this->general->listado_taxonomias($nombre_tabla_estado);
	        if($result_estado != false){
	          $data['result_estado'] = $result_estado;
	          
	        }
	        $nombre_tabla_ano = 'ano_actividad';
	        $result_ano = $this->general->listado_taxonomias($nombre_tabla_ano);
	        if($result_ano != false){
	          $data['result_ano'] = $result_ano;
	          
	        }

	        if($this->input->post()){
	        	// Check validation for user input in SignUp form
		          $this->form_validation->set_rules('nombre', 'Nombre', 'trim|required');
		          $this->form_validation->set_rules('codigo', 'Código', 'trim|required');
		          if ($this->form_validation->run() == TRUE) {

		              $data_form = array(
		              'nombre' => $this->input->post('nombre'),
		              'codigo' => $this->input->post('codigo')
		              );

		              if($this->input->post('estado')!=0){
		              	$data_form['id_estado'] = $this->input->post('estado');
		              }else{
		              	$data_form['id_estado'] = null;
		              }
		              if($this->input->post('categoria')!=0){
		              	$data_form['id_categoria'] = $this->input->post('categoria');
		              }else{
		              	$data_form['id_categoria'] = null;
		              }
		              if($this->input->post('ano')!=0){
		              	$data_form['id_ano'] = $this->input->post('ano');
		              }else{
		              	$data_form['id_ano'] = null;
		              }
		              if($this->input->post('institucion')!=0){
		              	$data_form['id_institucion'] = $this->input->post('institucion');
		              }else{
		              	$data_form['id_institucion'] = null;
		              }
		              $nombre_tabla='actividad';
		              $result = $this->general->registrar_contenido($nombre_tabla, $data_form);
		              if ($result == TRUE) {
		                  $data['message_display'] = '¡ Actividad Registrada con éxito !';                 
		              } else {
		                  $data['message_display'] = 'Actividad ya existente con ese nombre o codigo';
		              }
		           
		          }
		          redirect(base_url('/admin/contenido/actividad'));
	        }else{
	        	$data['titulo'] = 'Crear Actividad';
	            $data['meta_desc'] = '';
	            $data['meta_keywords'] = '';
	            $data['tipo_form'] = 'registrar';
	            $data['vista']  = 'admin/contenido/actividades/actividad_form';
	        }
	        
    	}else{
    		$data['titulo'] = 'Log in - Admin';
            $data['meta_desc'] = '';
            $data['meta_keywords'] = '';
            $data['vista']  = 'admin/login';
            
    	}
    	$this->load->view('index', $data);
    }

    public function editar_actividad_form(){
	    $id = $this->uri->segment(5);

	    if(isset($this->session->userdata['logged_in'])){
	        $nombre_tabla = 'actividad';


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
	        $nombre_tabla_estado = 'estado_actividad';
	        $result_estado = $this->general->listado_taxonomias($nombre_tabla_estado);
	        if($result_estado != false){
	          $data['result_estado'] = $result_estado;
	          
	        }
	        $nombre_tabla_ano = 'ano_actividad';
	        $result_ano = $this->general->listado_taxonomias($nombre_tabla_ano);
	        if($result_ano != false){
	          $data['result_ano'] = $result_ano;
	          
	        }


	        if($this->input->post()){
	          $data_form = array(
	              'nombre' => $this->input->post('nombre'),
		          'codigo' => $this->input->post('codigo'),
	              );

	          if($this->input->post('estado')!=0){
		              	$data_form['id_estado'] = $this->input->post('estado');
		              }else{
		              	$data_form['id_estado'] = null;
		              }
		              if($this->input->post('categoria')!=0){
		              	$data_form['id_categoria'] = $this->input->post('categoria');
		              }else{
		              	$data_form['id_categoria'] = null;
		              }
		              if($this->input->post('ano')!=0){
		              	$data_form['id_ano'] = $this->input->post('ano');
		              }else{
		              	$data_form['id_ano'] = null;
		              }
		              if($this->input->post('institucion')!=0){
		              	$data_form['id_institucion'] = $this->input->post('institucion');
		              }else{
		              	$data_form['id_institucion'] = null;
		              }
	          $result = $this->general->editar_contenido($nombre_tabla, $id, $data_form);
	          if ($result == TRUE) {
	              $data['message_display'] = '¡ Actividad Actualizada con éxito !';
	              
	          }


	          $this->load->helper("file");
			  $files = get_filenames($this->upload_path.'/'.$id);

			  if(!empty($files)){
			  	foreach ($files as &$file) {
			  		$data_fotografia = array(
			  			'id_actividad' => $id,
			  			'filename' => $file, 
			  			'path' => $this->images_path.'/'.$id
			  		);

			  		

			  		//exit(var_export($data_fotografia));
			  		$result_fotografia = $this->general->registrar_fotografia('fotografia', $data_fotografia);
			  		if(!is_dir($this->images_path.'/'.$id)){
			  			mkdir($this->images_path.'/'.$id);
			  			mkdir($this->images_path.'/'.$id.'/thumbs');
			  		}
			  		
			  		copy($this->upload_path.'/'.$id.'/'.$file, $this->images_path.'/'.$id.'/'.$file);
			  		unlink($this->upload_path.'/'.$id.'/'.$file);

			  		if(!is_dir($this->images_path.'/'.$id.'/thumbs')){
			  			mkdir($this->images_path.'/'.$id.'/thumbs');
			  		}

			  		$config_image['image_library'] = 'gd2';
					$config_image['source_image'] = $this->images_path.'/'.$id.'/'.$file;
					$config_image['new_image'] = $this->images_path.'/'.$id.'/thumbs';
					$config_image['create_thumb'] = TRUE;
					$config_image['thumb_marker'] = '_thumb_pequeno';
					$config_image['maintain_ratio'] = FALSE;
					$config_image['width']         = 150;
					$config_image['height']       = 150;

					$this->image_lib->initialize($config_image);

					$this->image_lib->resize();


					$config_image2['image_library'] = 'gd2';
					$config_image2['source_image'] = $this->images_path.'/'.$id.'/'.$file;					
					$config_image2['new_image'] = $this->images_path.'/'.$id.'/thumbs';
					$config_image2['create_thumb'] = TRUE;
					$config_image2['thumb_marker'] = '_thumb_mediano';
					$config_image2['maintain_ratio'] = TRUE;
					$config_image2['width']         = 400;
					$config_image2['height']       = 400;

					$this->image_lib->initialize($config_image2);

					$this->image_lib->resize();
			  		
			  		$data['message_display'] = '¡ Actividad Actualizada con éxito !';

			  	}
			  	rmdir($this->upload_path.'/'.$id);
			  }

	        }


	        $result = $this->general->consultar_contenido($nombre_tabla, $id);

	        if($result!=false){
	          $data['result'] = $result;
	          $data['tipo_form'] = "editar";
	          $data['titulo'] = 'Editar Actividad - Admin';
	          $data['meta_desc'] = '';
	          $data['meta_keywords'] = '';
	          $data['vista']  = 'admin/contenido/actividades/actividad_form';

	        }else{
	          redirect(base_url('/admin/contenido/actividad'));
	        }

	      
	    }else{
	      $data['titulo'] = 'Log in - Admin';
	      $data['meta_desc'] = '';
	      $data['meta_keywords'] = '';
	      $data['vista']  = 'admin/login';
	    }
	    $this->load->view('index', $data);
    }

  public function eliminar_actividad(){
    $id = $this->uri->segment(5);
    $nombre_tabla = 'actividad';
    $result = $this->general->eliminar_contenido($nombre_tabla, $id);


    /*Elimina fotografias*/
    $this->load->helper("file");
    $files = $this->general->consultar_fotografias('fotografia', $id);

			if(!empty($files)){
				// we need name and size for dropzone mockfile
				foreach ($files as $file) {

					$this->general->eliminar_fotografia('fotografia', $id, $file->filename);

					if(file_exists($this->upload_path . "/" .$id.'/'. $file->filename)){
						unlink($this->upload_path . "/" .$id.'/' . $file->filename);


						$files_folder = get_filenames($this->upload_path.'/'.$id);
						if(empty($files_folder)){
							rmdir($this->upload_path.'/'.$id);
						}
					}else if (file_exists($this->images_path . "/" .$id.'/'. $file->filename)){
						
						unlink($this->images_path . "/" .$id.'/' . $file->filename);

						//elimina thumbs
						if(file_exists($this->images_path . "/" .$id.'/thumbs/'. substr($file->filename, 0, strlen($file->filename)-4).'_thumb_pequeno'.substr($file->filename, -4))){
							unlink($this->images_path . "/" .$id.'/thumbs/'. substr($file->filename, 0, strlen($file->filename)-4).'_thumb_pequeno'.substr($file->filename, -4));
						}

						if(file_exists($this->images_path . "/" .$id.'/thumbs/'. substr($file->filename, 0, strlen($file->filename)-4).'_thumb_mediano'.substr($file->filename, -4))){
							unlink($this->images_path . "/" .$id.'/thumbs/'. substr($file->filename, 0, strlen($file->filename)-4).'_thumb_mediano'.substr($file->filename, -4));
						}

						$files_folder_thumb = get_filenames($this->images_path.'/'.$id.'/thumbs');
						if(empty($files_folder_thumb)){
							rmdir($this->images_path.'/'.$id.'/thumbs');
						}

						$files_folder = get_filenames($this->images_path.'/'.$id);
						if(empty($files_folder)){
							rmdir($this->images_path.'/'.$id);
						}
					}
				}
			}


    
    redirect(base_url('/admin/contenido/actividad'));
	
  }

    public function upload()
	{
		$id = $this->uri->segment(3);
		if ( ! empty($_FILES)) 
		{
			if($id!=null){
				if(!is_dir($this->upload_path.'/'.$id)){
					mkdir($this->upload_path.'/'.$id);
				}
				$config["upload_path"]   = $this->upload_path.'/'.$id;
				$config["allowed_types"] = "gif|jpg|png";
				$this->load->library('upload', $config);

				if ( ! $this->upload->do_upload("file")) {
					echo "failed to upload file(s)";
				}	
				
			}
		}
	}

	public function remove()
	{
		$id = $this->uri->segment(3);
		if($id!=null){
			$file = $this->input->post("file");
			if ($file) {
				if(file_exists($this->upload_path . "/" .$id.'/'. $file)){
					unlink($this->upload_path . "/" .$id.'/' . $file);
				}else if (file_exists($this->images_path . "/" .$id.'/'. $file)){
					$this->load->helper("file");
					$this->general->eliminar_fotografia('fotografia', $id, $file);
					unlink($this->images_path . "/" .$id.'/' . $file);

					//elimina thumbs
					if(file_exists($this->images_path . "/" .$id.'/thumbs/'. substr($file, 0, strlen($file)-4).'_thumb_pequeno'.substr($file, -4))){
						unlink($this->images_path . "/" .$id.'/thumbs/'. substr($file, 0, strlen($file)-4).'_thumb_pequeno'.substr($file, -4));
					}

					if(file_exists($this->images_path . "/" .$id.'/thumbs/'. substr($file, 0, strlen($file)-4).'_thumb_mediano'.substr($file, -4))){
						unlink($this->images_path . "/" .$id.'/thumbs/'. substr($file, 0, strlen($file)-4).'_thumb_mediano'.substr($file, -4));
					}

					$files_folder_thumb = get_filenames($this->images_path.'/'.$id.'/thumbs');
					if(empty($files_folder_thumb)){
						rmdir($this->images_path.'/'.$id.'/thumbs');
					}

					$files_folder = get_filenames($this->images_path.'/'.$id);
					if(empty($files_folder)){
						rmdir($this->images_path.'/'.$id);
					}
				}
				
			}
		}
	}

	public function list_files()
	{
		$id = $this->uri->segment(3);
		if($id!=null){
			$this->load->helper("file");
			

			$files = $this->general->consultar_fotografias('fotografia', $id);

			if(!empty($files)){
				// we need name and size for dropzone mockfile
				foreach ($files as &$file) {
					$file = array(
						'name' => $file->filename,
						'size' => filesize($this->images_path . "/" .$id.'/'. $file->filename),
					);
				}

			}else{
			  $files2 = get_filenames($this->upload_path.'/'.$id);

			  if(!empty($files2)){

			  	foreach ($files2 as &$file2) {
					unlink($this->upload_path . "/" .$id.'/' . $file2);
				}
			  	rmdir($this->upload_path.'/'.$id);
			  }
			}	
			header("Content-type: text/json");
			header("Content-type: application/json");
			echo json_encode($files);
			
		}
	}

}



?>