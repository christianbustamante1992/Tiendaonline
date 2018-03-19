<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 

*/
class Model_producto extends CI_Model
{
	
	function __construct()
	{
		# code...
		parent::__construct();
		$this->load->database();
	}

	public function get($id)
	{
		# code...

			# code...
			$query = $this->db->query("SELECT * FROM producto,marca_producto WHERE producto.id = $id AND producto.id_marcaproducto = marca_producto.id_marca;");
			if ($query->num_rows() === 1) {
				# code...
				return $query->row();
			}

			return NULL;
		

			
	}

}

?>