<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {

	
	public function index()
	{
		$this->load->view('layouts/header');
		$this->load->view('inicio');
	}

	public function carrito()
	{
		$this->load->view('carrito');
	}
}
