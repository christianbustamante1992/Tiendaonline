<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/

require APPPATH . "/libraries/REST_Controller.php";

/**
* 
*/
class Restdetallecarrito extends REST_Controller
{
	
	function __construct()
	{
		# code...
		parent::__construct();
		//$this->load->model('model_restdetallecarrito');
	}

		public function index_get()
	{
		# code...
		$data = array();
		$productos = $this->cart->contents();
		foreach ($productos as $key) {
			# code...
			$pos = array('id_producto' => $key['id'], 
						 'cantidad' => $key['qty']
						);
			array_push($data,$pos);
		}
		
		if (! is_null($data)) {
			# code...
			$this->response(array('response' => $data),200);
		}else{
			$this->response(array('error' => 'Ha ocurrido un error en el servidor'),400);
		}
	}

	

	
}

 ?>