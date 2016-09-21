<?php
class General extends CI_Model {

        public function __construct()
        {
                $this->load->database();
 
        }


       // Read data using username and password
		public function login($data) {

			$condition = "username =" . "'" . $data['username'] . "' AND " . "password =" . "'" . $data['password'] . "'";
			$this->db->select('*');
			$this->db->from('usuario');
			$this->db->where($condition);
			$this->db->limit(1);
			$query = $this->db->get();

			if ($query->num_rows() == 1) {
				return true;
			} else {
				return false;
			}
		}


		// Read data from database to show data in admin page
		public function read_user_information($username) {

			$condition = "username =" . "'" . $username . "'";
			$this->db->select('*');
			$this->db->from('usuario');
			$this->db->where($condition);
			$this->db->limit(1);
			$query = $this->db->get();

			if ($query->num_rows() == 1) {
				return $query->result();
			} else {
				return false;
			}
		}

		// Inserta cualquier taxonomia de actividades en base de datos
		public function registrar_taxonomia($nombre_tabla, $data) {

			// Query to check whether username already exist or not
			$condition = "nombre =" . "'" . $data['nombre'] . "'";
			$this->db->select('*');
			$this->db->from($nombre_tabla);
			$this->db->where($condition);
			$this->db->limit(1);
			$query = $this->db->get();
			if ($query->num_rows() == 0) {
		
				// Query to insert data in database
				$this->db->insert($nombre_tabla, $data);
				if ($this->db->affected_rows() > 0) {
					return true;
				
				} else {
					return false;
				}
			}
		}

				// Inserta cualquier taxonomia de actividades en base de datos
		public function registrar_contenido($nombre_tabla, $data) {

			// Query to check whether username already exist or not
			$condition = "nombre =" . "'" . $data['nombre'] . "'";
			if($nombre_tabla=='actividad'){
				$condition .= "or codigo='" . $data['codigo'] . "'";
			}
			$this->db->select('*');
			$this->db->from($nombre_tabla);
			$this->db->where($condition);
			$this->db->limit(1);
			$query = $this->db->get();
			if ($query->num_rows() == 0) {
		
				// Query to insert data in database
				$this->db->insert($nombre_tabla, $data);
				if ($this->db->affected_rows() > 0) {
					return true;
				
				} else {
					return false;
				}
			}
		}

		// Inserta cualquier taxonomia de actividades en base de datos
		public function registrar_ano($nombre_tabla, $data) {

			// Query to check whether username already exist or not
			$condition = "ano =" . "'" . $data['ano'] . "'";
			$this->db->select('*');
			$this->db->from($nombre_tabla);
			$this->db->where($condition);
			$this->db->limit(1);
			$query = $this->db->get();
			if ($query->num_rows() == 0) {
		
				// Query to insert data in database
				$this->db->insert($nombre_tabla, $data);
				if ($this->db->affected_rows() > 0) {
					return true;
				
				} else {
					return false;
				}
			}
		}
		// Inserta cualquier taxonomia de actividades en base de datos
		public function listado_taxonomias($nombre_tabla) {

			// Query to check whether username already exist or not
			
			$this->db->select('*');
			$this->db->from($nombre_tabla);
			$query = $this->db->get();

			if ($query->num_rows() >= 1) {
				return $query->result();
			} else {
				return false;
			}
		}


		public function listado_contenido($nombre_tabla, $condicion) {

			// Query to check whether username already exist or not
			
			$this->db->select('*');
			$this->db->from($nombre_tabla);
			if($condicion!=""){
				$this->db->where($condicion);
			}
			$query = $this->db->get();

			if ($query->num_rows() >= 1) {
				return $query->result();
			} else {
				return false;
			}
		}

		public function consultar_taxonomia($nombre_tabla, $id) {

			// Query to check whether username already exist or not
			$condition = "id =" .$id;

			$this->db->select('*');
			$this->db->from($nombre_tabla);
			$this->db->where($condition);
			$query = $this->db->get();

			if ($query->num_rows() >= 1) {
				return $query->result();
			} else {
				return false;
			}
		}

		public function consultar_contenido($nombre_tabla, $id) {

			// Query to check whether username already exist or not
			$condition = "id =" .$id;

			$this->db->select('*');
			$this->db->from($nombre_tabla);
			$this->db->where($condition);
			$query = $this->db->get();

			if ($query->num_rows() >= 1) {
				return $query->result();
			} else {
				return false;
			}
		}

		public function editar_taxonomia($nombre_tabla, $id, $data) {

			// Query to check whether username already exist or not
			$condition = "id =" . $id;
			$this->db->where($condition);
			$this->db->update($nombre_tabla, $data);
			
			if ($this->db->affected_rows() > 0) {
				return true;
			
			} else {
				return false;
			}	
		}

		public function editar_contenido($nombre_tabla, $id, $data) {

			// Query to check whether username already exist or not
			$condition = "id =" . $id;
			$this->db->where($condition);
			$this->db->update($nombre_tabla, $data);
			
			if ($this->db->affected_rows() > 0) {
				return true;
			
			} else {
				return false;
			}	
		}

		public function eliminar_taxonomia($nombre_tabla, $id) {

			// Query to check whether username already exist or not
			$condition = "id =" . $id;
			$this->db->where($condition);
			$this->db->delete($nombre_tabla);
			
			if ($this->db->affected_rows() > 0) {
				return true;
			
			} else {
				return false;
			}	
		}

		public function eliminar_contenido($nombre_tabla, $id) {

			// Query to check whether username already exist or not
			$condition = "id =" . $id;
			$this->db->where($condition);
			$this->db->delete($nombre_tabla);
			
			if ($this->db->affected_rows() > 0) {
				return true;
			
			} else {
				return false;
			}	
		}

		public function registrar_fotografia($nombre_tabla,$data){
			// Query to check whether username already exist or not
			$condition = "id_actividad ='" . $data['id_actividad'] . "' and filename='".$data['filename']."'";
			$this->db->select('*');
			$this->db->from($nombre_tabla);
			$this->db->where($condition);
			$this->db->limit(1);
			$query = $this->db->get();
			if ($query->num_rows() == 0) {
		
				// Query to insert data in database
				$this->db->insert($nombre_tabla, $data);
				if ($this->db->affected_rows() > 0) {
					return true;
				
				} else {
					return false;
				}
			}
		}

		public function consultar_fotografias($nombre_tabla, $id_actividad) {

			// Query to check whether username already exist or not
			$condition = "id_actividad =" .$id_actividad;

			$this->db->select('*');
			$this->db->from($nombre_tabla);
			$this->db->where($condition);
			$query = $this->db->get();

			if ($query->num_rows() >= 1) {
				return $query->result();
			} else {
				return false;
			}
		}

		public function eliminar_fotografia($nombre_tabla, $id_actividad, $filename) {

			// Query to check whether username already exist or not
			$condition = "id_actividad ='" . $id_actividad."' and filename='".$filename."'";
			$this->db->where($condition);
			$this->db->delete($nombre_tabla);
			
			if ($this->db->affected_rows() > 0) {
				return true;
			
			} else {
				return false;
			}	
		}



		/*Busca actividad por codigo*/
		public function consultar_codigo($nombre_tabla,$data) {

			$condition = "codigo = " . "'" . $data['codigo'] . "'";
			$this->db->select('*');
			$this->db->from($nombre_tabla);
			$this->db->where($condition);
			$this->db->limit(1);
			$query = $this->db->get();

			if ($query->num_rows() == 1) {
				return true;
			} else {
				return false;
			}
		}

		/*Busca actividad por codigo*/
		public function consultar_actividad_por_codigo($nombre_tabla,$data) {

			$condition = "codigo = " . "'" . $data['codigo'] . "'";
			$this->db->select('*' );
			$this->db->from($nombre_tabla);
			$this->db->where($condition);
			$this->db->limit(1);
			$query = $this->db->get();

			if ($query->num_rows() == 1) {
				return $query->result();
			} else {
				return false;
			}
		}

		/*Busca actividad por codigo*/
		public function consultar_fotografias_actividad($nombre_tabla,$data) {

			$condition = "id_actividad = " . "'" . $data['id_actividad'] . "'";
			$this->db->select('*');
			$this->db->from($nombre_tabla);
			$this->db->where($condition);
			//$this->db->limit(1);
			$query = $this->db->get();

			if ($query->num_rows() > 0) {
				return $query->result();
			} else {
				return false;
			}
		}


		/*Busca actividad por codigo*/
		public function consultar_detalle_fotografia($nombre_tabla,$data) {

			$condition = "id = " . "'" . $data['id'] . "'";
			$this->db->select('*');
			$this->db->from($nombre_tabla);
			$this->db->where($condition);
			$this->db->limit(1);
			$query = $this->db->get();

			if ($query->num_rows() > 0) {
				return $query->result();
			} else {
				return false;
			}
		}


		public function formatURL($string) {

        

	        $a = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿŔŕ'; 

	        $b = 'aaaaaaaceeeeiiiidnoooooouuuuybsaaaaaaaceeeeiiiidnoooooouuuyybyRr'; 

	        $string = utf8_decode($string);     

	        $string = strtr($string, utf8_decode($a), $b); 



	        $string = strtolower(trim($string));

	        $string = preg_replace("/[^a-z0-9-]/", "-", $string);

	        $string = preg_replace("/-+/", "-", $string);

	     

	        /*if(substr($string, strlen($string) - 1, strlen($string)) === "-") {

	            $string = substr($string, 0, strlen($string) - 1);

	        }*/

	     

	        return $string;

	    }
}