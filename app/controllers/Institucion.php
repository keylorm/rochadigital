<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Institucion extends CI_Controller {

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

      // Check for user login process
    public function index() {
      if(isset($this->session->userdata['logged_in'])){
        $nombre_tabla="institucion_actividad";
        $result = $this->general->listado_taxonomias($nombre_tabla);
        if($result != false){
          $data['result'] = $result;
          
        }
        $data['titulo'] = 'Instituciones - Admin';
        $data['meta_desc'] = '';
        $data['meta_keywords'] = '';
        $data['vista']  = 'admin/taxonomias/instituciones/listado_instituciones';
        
        $this->load->view('index', $data);
      }else{
          
          $data['titulo'] = 'Log in - Admin';
            $data['meta_desc'] = '';
            $data['meta_keywords'] = '';
            $data['vista']  = 'admin/login';
            
            $this->load->view('index', $data);
      }
       

        
    }

 	public function registrar_institucion_form()
	{
    if(isset($this->session->userdata['logged_in'])){
      if($this->input->post()){
        // Check validation for user input in SignUp form
          $this->form_validation->set_rules('nombre', 'Nombre', 'trim|required');
          if ($this->form_validation->run() == FALSE) {
              $data['titulo'] = 'Registrar Institucion - Admin';
              $data['meta_desc'] = '';
              $data['meta_keywords'] = '';
              $data['tipo_form'] = "registrar";
              $data['vista']  = 'admin/taxonomias/instituciones/registrar_institucion_form';
              
              $this->load->view('index', $data);
          } else {
              $data = array(
              'nombre' => $this->input->post('nombre'),
              );
              $nombre_tabla='institucion_actividad';
              $result = $this->general->registrar_taxonomia($nombre_tabla, $data);
              if ($result == TRUE) {
                  $data['message_display'] = '¡ Institución Registrada con éxito !';                 
              } else {
                  $data['message_display'] = 'Institucion ya existente';
              }
              $data['titulo'] = 'Registrar Institucion - Admin';
              $data['meta_desc'] = '';
              $data['meta_keywords'] = '';
              $data['tipo_form'] = "registrar";
              $data['vista']  = 'admin/taxonomias/instituciones/registrar_institucion_form';
              $this->load->view('index', $data);
          }

      }else{
        $data['titulo'] = 'Registrar Institucion - Admin';
        $data['meta_desc'] = '';
        $data['meta_keywords'] = '';
        $data['tipo_form'] = "registrar";
        $data['vista']  = 'admin/taxonomias/instituciones/registrar_institucion_form';
        
        $this->load->view('index', $data);
      }
  		
    }else{
            
        $data['titulo'] = 'Log in - Admin';
        $data['meta_desc'] = '';
        $data['meta_keywords'] = '';
        $data['vista']  = 'admin/login';
        
        $this->load->view('index', $data);
    }
	}

  public function editar_institucion_form(){
    $id = $this->uri->segment(5);

    if(isset($this->session->userdata['logged_in'])){
        $nombre_tabla = 'institucion_actividad';

        if($this->input->post()){
          $data = array(
              'nombre' => $this->input->post('nombre'),
              );
          $result = $this->general->editar_taxonomia($nombre_tabla, $id, $data);
          if ($result == TRUE) {
              $data['message_display'] = '¡ Institución Actualizada con éxito !';
              
          }else{
              $data['message_display'] = '¡ Error al actualizar la institucion !';
          }

        }


        $result = $this->general->consultar_taxonomia($nombre_tabla, $id);

        if($result!=false){
          $data['result'] = $result;
          $data['tipo_form'] = "editar";
          $data['titulo'] = 'Editar Institucion - Admin';
          $data['meta_desc'] = '';
          $data['meta_keywords'] = '';
          $data['vista']  = 'admin/taxonomias/instituciones/registrar_institucion_form';
        }else{
          redirect(base_url('/admin/taxonomia/institucion'));
        }

      
    }else{
      $data['titulo'] = 'Log in - Admin';
      $data['meta_desc'] = '';
      $data['meta_keywords'] = '';
      $data['vista']  = 'admin/login';
    }
    $this->load->view('index', $data);
  }

  public function eliminar_taxonomia(){
    $id = $this->uri->segment(5);
    $nombre_tabla = 'institucion_actividad';
    $result = $this->general->eliminar_taxonomia($nombre_tabla, $id);
    
    redirect(base_url('/admin/taxonomia/institucion'));

  }





}
?>