<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/

require APPPATH . "/libraries/REST_Controller.php";

/**
* 
*/
class Restproducto extends REST_Controller
{
	
	function __construct()
	{
		# code...
		parent::__construct();
		//$this->load->model('model_restproducto');
	}

		public function index_get()
	{
		# code...
		$productos = json_decode(file_get_contents('http://localhost/Tiendaonline/restproducto'));
		if (! is_null($productos)) {
			# code...
			$this->response(array('response' => $productos->{'response'}),200);
		}else{
			$this->response(array('error' => 'No existen productos'),404);
		}
	}

	
	public function index_put($id)
	{
		# code...
		if ((! $this->put('producto'))|| (! $id)) {
			# code...
			$this->response(NULL, 400);
		}

		//$productos = json_decode(file_put_contents('http://localhost/Tiendaonline/restproducto/'.(string)$id,$this->put('producto')));
		$url = "http://localhost/Tiendaonline/restproducto/".(string)$id;
		$curl = curl_init($url);
		
		curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
		curl_setopt($curl, CURLOPT_HEADER, false);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
		curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($this->put('producto')));

		// Make the REST call, returning the result
		$response = curl_exec($curl);
		/*if (!$response) {
		    die("Connection Failure.n");
		}*/
		$this->response(array('response' => $response),400);
		/*if (! is_null($response)) {
			# code...
			$this->response(array('response' => 'Producto Actualizado'),200);
		}else{
			$this->response(array('error' => 'Ha ocurrido un error en el servidor'),400);
		}*/
	}

	public function find_get($id)
	{
		# code...
		if (! $id) {
			# code...
			$this->response(NULL, 400);
		}

		$productos = json_decode(file_get_contents('http://localhost/Tiendaonline/restproducto/'.$id));
		if (! is_null($productos)) {
			# code...
			$this->response(array('response' => $productos->{'response'}),200);
		}else{
			$this->response(array('error' => 'No existen productos'),404);
		}
	}
}

 ?>