<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contacto extends CI_Controller {

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
      $this->load->helper('url');	
      $this->load->library('email');
    }
 	public function index()
	{

		if($this->input->post()){
	        	// Check validation for user input in SignUp form
		          $this->form_validation->set_rules('nombre', 'Nombre', 'trim|required');
		          $this->form_validation->set_rules('telefono', 'Teléfono', 'trim|required');
		          
		          if ($this->form_validation->run() == TRUE) {

		              $data_form = array(
		              'nombre' => $this->input->post('nombre'),
		              'correo' => $this->input->post('correo'),
		              'telefono' => $this->input->post('telefono'),
		              'asunto' => $this->input->post('asunto'),
		              'mensaje' => $this->input->post('mensaje')
		              );

		             
		              $nombre_tabla='contacto';
		              $result = $this->general->registrar_contacto($nombre_tabla, $data_form);
		              if ($result != FALSE) {
		                  $data['message_display'] = '¡Muchas gracias! Hemos recibido su información y pronto nos pondremos en contacto con usted.';
		                  $data['message_type'] = 'alert-success';
		                  $this->general->enviar_correo_contacto($result, $data_form);                 
		              } else {
		                  $data['message_display'] = 'Ocurrio un error enviando su información. Por favor escríbanos directamente al correo info@rochadigital.co.cr o llámenos a los teléfonos 8830 0706 ó 8951 6801.';
		                  $data['message_type'] = 'alert-warning';
		              }
		           
		          }
	        }


			$data['titulo'] = 'Contactenos';
			$data['meta_desc'] = '';
			$data['meta_keywords'] = '';
			$data['vista']  = 'contacto';
			
		
		$this->load->view('index', $data);
	}
}
