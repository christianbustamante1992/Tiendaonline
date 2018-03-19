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

	public function addcarrito($id)
	{
		$data = array('producto' => $this->model_producto->get($id));
		$this->load->view('layouts/headeraddcarrito');
		$this->load->view('addcarrito',$data);
	}

	public function guardar()
	{
		$this->load->view('layouts/header');
		$this->load->view('inicio');
	}
}
