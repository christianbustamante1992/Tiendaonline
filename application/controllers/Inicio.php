<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
			
	}

	public function index()
	{
		$this->load->view('layouts/header');
		$this->load->view('inicio');
	}

	public function carrito()
	{
		$this->load->view('layouts/headercarrito');
		$this->load->view('carrito');
	}

	public function addcarrito($id)
	{
		$cadena = "http://localhost/Store/restproducto/".(string)$id;
		$data = json_decode(file_get_contents($cadena));
		$datos = array('producto' => $data->{'response'});
		$this->load->view('layouts/headeraddcarrito');
		$this->load->view('addcarrito',$datos);
		
	}

	public function guardar()
	{
		
		$data = array('id' => $this->input->post('id'),
		              'name' => $this->input->post('nombre'),
		              'price' => $this->input->post('precio'),
		              'qty' => $this->input->post('cantidad'),
		              'nombre_foto' => $this->input->post('nombre_foto')
					 );

		$this->cart->insert($data);
		redirect('http://localhost/Store/inicio/carrito');	
		
	}

	
	public function pruebaconsumo()
	{
		$data = json_decode(file_get_contents('http://localhost/Tiendaonline/restproducto'));
		$respuesta = array('response' => $data->{'response'});
		echo json_encode($respuesta);		
		
	}
}
