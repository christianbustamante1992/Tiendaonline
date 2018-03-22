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

	public function getdetallecarrito($id)
	{
		# code...

			# code...
			$query = $this->db->query("SELECT * FROM detalle_carrito WHERE detalle_carrito.id_detallecarrito = $id;");
			if ($query->num_rows() === 1) {
				# code...
				return $query->row();
			}

			return NULL;
		

			
	}


	public function guardardetallecarrito($data)
	{
		$resultado = $this->db->insert('detalle_carrito',$data);
		return $resultado;
			
	}

	public function editardetallecarrito($id,$data)
	{
		$this->db->where('id_detallecarrito',$id);
		return $this->db->update('detalle_carrito',$data);
					
	}

}

?>