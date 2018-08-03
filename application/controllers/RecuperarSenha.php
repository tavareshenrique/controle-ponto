<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RecuperarSenha extends CI_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index() {

		$data['titulo'] = 'Recuperar Senha';

		$this->load->view('app/include/header', $data);
		$this->load->view('app/include/cabecalho_login');
		$this->load->view('app/login/recuperar_senha', $data);
		$this->load->view('app/include/footer_login');
	}

}
