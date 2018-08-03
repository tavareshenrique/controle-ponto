<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: henrique
 * Date: 5/10/18
 * Time: 10:05 PM
 */

    class Ponto extends CI_Controller {

        public function __construct() {
            parent::__construct();
            $this->load->model('ponto_model');
            $this->load->model('HeaderDefault_model');
        }

        public function index() {

            if (isLogado($this->session->userdata('id')) == TRUE) {
                $dataPessoa = $this->setHeader();

                if (empty($dataPessoa[0]['foto'])) {
                    $fotoPerfil = $this->setPhoto();
                } else {
                    $fotoPerfil = $dataPessoa[0]['foto'];
                }

                $data = array(
                    'titulo' => 'Ponto',
                    'nome' => $dataPessoa[0]['nome'],
                    'sobrenome' => $dataPessoa[0]['sobrenome'],
                    'foto' => $fotoPerfil,
                    'profissao' => $dataPessoa[0]['profissao'],
                    'data_cadastro' => $dataPessoa[0]['data_cadastro']
                );

                $this->load->view('app/include/header', $data);
                $this->load->view('app/include/cabecalho_default', $data);
                $this->load->view('app/ponto/ponto', $data);
                $this->load->view('app/include/footer_default');
            } else {
                redirect('Login');
            }
        }

        public function mes() {


            if (isLogado($this->session->userdata('id')) == TRUE) {
                $dataPessoa = $this->setHeader();

                if (empty($dataPessoa[0]['foto'])) {
                    $fotoPerfil = $this->setPhoto();
                } else {
                    $fotoPerfil = $dataPessoa[0]['foto'];
                }

                $data = array(
                    'titulo' => 'Ponto',
                    'nome' => $dataPessoa[0]['nome'],
                    'sobrenome' => $dataPessoa[0]['sobrenome'],
                    'foto' => $fotoPerfil,
                    'profissao' => $dataPessoa[0]['profissao'],
                    'data_cadastro' => $dataPessoa[0]['data_cadastro'],
                    'ponto' => $this->getDay(MonthNumber, Year),
                    'horario_inicial' => $this->getTimeDefault(true, $this->session->userdata('id')),
                    'horario_final' => $this->getTimeDefault(false, $this->session->userdata('id'))
                );

                $this->load->view('app/include/header', $data);
                $this->load->view('app/include/cabecalho_default', $data);
                $this->load->view('app/ponto/ponto_mes', $data);
                $this->load->view('app/include/footer_default');
            } else {
                redirect('Login');
            }
        }

        public function doInsert() {
            $this->ponto_model->doInsert();
            redirect('Ponto');
        }

        public function doInsertMeses() {
            $dias = $_POST;
            $horaInicial = $dias['horaInicial'];
            $horaFinal = $dias['horaFinal'];
            $NumDias = count($horaInicial);
            $this->ponto_model->doInsertMeses($this->session->userdata('id'), Year, MonthNumber, $NumDias, $horaInicial, $horaFinal);
            redirect('PontoMes');
        }

        private function getTimeDefault($timeStart, $pessoa) {
            $data = $this->ponto_model->getTimeDefault($timeStart, $pessoa);
            return $data;
        }

        private function getDay($mes, $ano) {
            $data = $this->ponto_model->getDay($mes, $ano);
            return $data;
        }

        private function setHeader() {
            $data = $this->HeaderDefault_model->selectPessoa($this->session->userdata('id'));
            return $data;
        }

        private function setPhoto() {
            $data = $this->HeaderDefault_model->getPhoto();
            return $data;
        }
    }
