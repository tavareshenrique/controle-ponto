<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: henrique
 * Date: 7/17/18
 * Time: 7:47 PM
 */
    class Perfil extends CI_Controller {

        public function __construct() {
            parent::__construct();
            $this->load->model('dashboard_model');
            $this->load->model('HeaderDefault_model');
            $this->load->model('Cidade_model');
            $this->load->model('Perfil_model');
        }


        public function index() {

            if (isLogado($this->session->userdata('id')) == TRUE ) {

                $dataPessoa   = $this->setHeader();
                $photoProfile = $this->getPhotoProfile($dataPessoa[0]['foto']);

                $data = array(
                    'titulo' => 'Perfil',
                    'year' => Year,
                    'totalYear' => $this->setYearTotal(Year),
                    'totalHour' => $this->setHourTotal(),
                    'nome' => $dataPessoa[0]['nome'],
                    'sobrenome' => $dataPessoa[0]['sobrenome'],
                    'data_nascimento' => $dataPessoa[0]['data_nascimento'],
                    'foto' => $photoProfile,
                    'usuario' => $dataPessoa[0]['usuario'],
                    'email' => $dataPessoa[0]['email'],
                    'data_cadastro' => $dataPessoa[0]['data_cadastro'],
                    'celular' => $dataPessoa[0]['celular'],
                    'telefone' => $dataPessoa[0]['telefone'],
                    'profissao' => $dataPessoa[0]['profissao'],
                    'empresa' => $dataPessoa[0]['empresa'],
                    'horario_inicial' => $dataPessoa[0]['horario_inicial'],
                    'horario_final' => $dataPessoa[0]['horario_final'],
                    'horario_almoco' => $dataPessoa[0]['horario_almoco'],
                    'possui_horario_almoco' => $this->convertToNormal($dataPessoa[0]['possui_horario_almoco']),
                    'sabado' => $this->convertToNormal($dataPessoa[0]['sabado']),
                    'domingo' => $this->convertToNormal($dataPessoa[0]['domingo']),
                    'endereco' => $dataPessoa[0]['endereco'],
                    'bairro' => $dataPessoa[0]['bairro'],
                    'cep' => $dataPessoa[0]['cep'],
                    'numero' => $dataPessoa[0]['numero'],
                    'complemento' => $dataPessoa[0]['complemento'],
                    'todas_cidades' => $this->setCities(),
                    'cidade' => $dataPessoa[0]['cidade']
                );

                $this->load->view('app/include/header', $data);
                $this->load->view('app/include/cabecalho_default', $data);
                $this->load->view('app/profile/perfil', $data);
                $this->load->view('app/include/footer_perfil');
                $this->load->view('app/include/adminLTE');
            } else {
                redirect('Login');
            }
        }

        public function doInsert() {
            $this->Perfil_model->doInsertUpdt($this->session->userdata('id'), $this->photoToBase64($_FILES['fotoPerfil']));
            redirect('Perfil');
        }

        private function setHeader() {
            return $this->HeaderDefault_model->selectPessoa($this->session->userdata('id'));
        }

        private function setYearTotal($year) {
            $yearTotal = $this->dashboard_model->getYearTotal($this->session->userdata('id'), $year);
            if ($yearTotal == null) {
                return '00:00:00';
            } else {
                $getYear = valueMask($yearTotal);
                return $getYear;
            }
        }

        private function setHourTotal() {
            $hourTotal = $this->dashboard_model->getHourTotal($this->session->userdata('id'));
            if ($hourTotal == null) {
                return '00:00:00';
            } else {
                $getYear = valueMask($hourTotal);
                return $getYear;
            }
        }

        private function setPhoto() {
            $data = $this->HeaderDefault_model->getPhoto();
            return $data;
        }

        private function setCities() {
            return $this->Cidade_model->getCities();;
        }

        public function doChangePassword() {
            $password = "{$_POST['changePassword']}";
            $pass = $this->Perfil_model->doChangePassword($this->session->userdata('id'), $password);
            if ($pass == true) {
                echo "Senha alterada com sucesso!";
            } else {
                echo "";
            }
        }

        private function photoToBase64($photo) {
            if (isset($photo)) {

                $upload = $photo;

                preg_match('/\.(jpg|jpeg|png){1}$/i', $upload['name'], $ext);
                $foto = 'data:image/' . $ext[1] . ';base64,' . base64_encode(file_get_contents($upload['tmp_name']));

                return $foto;
            }
        }

        private function getPhotoProfile($photo) {
            if (empty($photo)) {
                $photoProf = $this->setPhoto();
            } else {
                $photoProf = $photo;
            }

            return $photoProf;
        }

        public function doValidateUser(){
            $getUser = "{$_POST['nomeUsuario']}";

            if ($this->Perfil_model->doValidateUserForPerson($getUser, $this->session->userdata('id')) == 'Já existe!') {
                echo 'Não existe ainda!';
                exit;
            }
            $user = $this->Perfil_model->doValidateUser($getUser);
            echo $user;
        }

        private function convertToNormal($tiny) {
            $data = tinyintToNormal($tiny);
            return $data;
        }
    }