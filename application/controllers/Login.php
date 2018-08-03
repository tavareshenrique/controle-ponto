<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Login extends CI_Controller {

	    public function __construct() {
		    parent::__construct();
            $this->load->model('usuario_model');
	    }

	    public function index() {

	        if (isLogado($this->session->userdata('id')) == FALSE ) {
                $data['titulo'] = 'Login';

                $this->load->view('app/include/header', $data);
                $this->load->view('app/include/cabecalho_login');
                $this->load->view('app/login/login');
                $this->load->view('app/include/footer_login');
            } else {
	            redirect('Dashboard');
            }
	    }

	    public function logar() {

	        $email = $this->input->post('email-login');
            $senha = $this->input->post('senha-login');
            $data['titulo'] = 'Login';

	        if ($this->usuario_model->logar($email, $senha) == TRUE) {
                $this->setUserData($email);
                redirect(Dashboard);
            } else {
                $this->session->set_flashdata('invalido', 'E-mail ou Senha inválidos!');
                redirect('Login');
            }
	    }

	    public function endSession() {
            $this->session->sess_destroy();
            redirect('Login');
        }

	    private function setUserData($email) {

            $id = array('id' => $this->usuario_model->getID($email));
            $this->session->set_userdata($id);

        }
}
