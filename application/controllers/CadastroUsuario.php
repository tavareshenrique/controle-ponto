<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class CadastroUsuario extends CI_Controller {

	    public function __construct() {
		    parent::__construct();
		    $this->load->model('usuario_model');
            $this->load->model('pessoa_model');
        }

	    public function index() {
		    $data = $this->doSetData();
            $this->doOpenCadastro($data);
	    }

	    public function doInsert() {
	        $this->usuario_model->doInsert($this->pessoa_model->doInsert());
            redirect('Login');
        }

        public function doValidateEmail() {
            $emailCad = "{$_POST['emailCadastrado']}";
            $getEmail = $this->usuario_model->getEmail($emailCad);
            if ($getEmail == FALSE) {
                echo "O e-mail: ".$emailCad." já foi cadastrado";
            } else {
                echo "";
            }
        }

        private function doSetData() {
            $data['titulo'] = 'Cadastro';
            if (isset($_POST['email-cadastro'])) {
                    $data['email'] = $_POST['email-cadastro'];
            } else {
                $data['email'] = '';
            }

            return $data;
        }

        private function doOpenCadastro($data) {
            $this->load->view('app/include/header', $data);
            $this->load->view('app/include/cabecalho_login');
            $this->load->view('app/login/cadastro', $data);
            $this->load->view('app/include/footer_login');
            $this->load->view('app/include/adminLTE');
        }
}
