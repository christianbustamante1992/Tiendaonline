<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_producto');		
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
		$data = array('producto' => $this->model_producto->get($id));
		$this->load->view('layouts/headeraddcarrito');
		$this->load->view('addcarrito',$data);
	}

	public function editarcarrito($id)
	{
		$detallecarrito = $this->model_producto->getdetallecarrito($id);
		$data = array('producto' => $this->model_producto->get($detallecarrito->id_producto),
					  'detallecarrito' => $this->model_producto->getdetallecarrito($id)
					  );
		$this->load->view('layouts/headeraddcarrito');
		$this->load->view('editarcarrito',$data);
	}

	public function guardar()
	{
		$data = array('id_producto' => $this->input->post('id'),
		              'id_usuario' => '1',
		              'precio' => $this->input->post('precio'),
		              'cantidad' => $this->input->post('cantidad'),
		              'totalimporte' => (float) $this->input->post('precio') * (float) $this->input->post('cantidad')
					 );

		$this->form_validation->set_rules('id', 'producto', 'is_unique[detalle_carrito.id_producto]');
		$this->form_validation->set_message('is_unique', 'Este producto ya ah sido agregado.');

		if ($this->form_validation->run() != false) {
			# code...
			$resultado = $this->model_producto->guardardetallecarrito($data);
			redirect('inicio/carrito');
		}else{
			$data = array('producto' => $this->model_producto->get($this->input->post('id')));
			$this->load->view('layouts/headeraddcarrito');
			$this->load->view('addcarrito',$data);
		}
		
		
	}

	public function pruebaguardar()
	{
		$data = array('id_producto' => $this->input->post('id'),
		              'id_usuario' => '1',
		              'precio' => $this->input->post('precio'),
		              'cantidad' => $this->input->post('cantidad'),
		              'totalimporte' => (float) $this->input->post('precio') * (float) $this->input->post('cantidad')
					 );

		$this->form_validation->set_rules('id', 'producto', 'is_unique[detalle_carrito.id_producto]');
		$this->form_validation->set_message('is_unique', 'Este producto ya ah sido agregado.');

		if ($this->form_validation->run() != false) {
			# code...
			$resultado = $this->model_producto->guardardetallecarrito($data);
			redirect('inicio/carrito');
		}else{
			$data = array('producto' => $this->model_producto->get($this->input->post('id')));
			$this->load->view('layouts/headeraddcarrito');
			$this->load->view('addcarrito',$data);
		}
		
		
	}

	public function update()
	{
		$data = array('id_producto' => $this->input->post('id'),
		              'id_usuario' => '1',
		              'precio' => $this->input->post('precio'),
		              'cantidad' => $this->input->post('cantidad'),
		              'totalimporte' => (float) $this->input->post('precio') * (float) $this->input->post('cantidad')
					 );

			$resultado = $this->model_producto->editardetallecarrito($this->input->post('iddetallecarrito'),$data);
			redirect('inicio/carrito');
		
		
		
	}

	public function pruebaconsumo()
	{
		$data = json_decode(file_get_contents('http://localhost/Tiendaonline/restproducto'));
		$respuesta = array('response' => $data->{'response'});
		echo json_encode($respuesta);		
		
	}
}
