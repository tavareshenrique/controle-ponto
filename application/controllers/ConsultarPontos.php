<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: henrique
 * Date: 5/27/18
 * Time: 9:04 PM
 */

    class ConsultarPontos extends CI_Controller {

        public function __construct() {
            parent::__construct();
            $this->load->model('ponto_model');
            $this->load->model('HeaderDefault_model');
        }

        public function index() {

            if (isLogado($this->session->userdata('id')) == TRUE ) {

                $dataPessoa   = $this->setHeader();
                $photoProfile = $this->getPhotoProfile($dataPessoa[0]['foto']);

                $data = array(
                    'titulo' => 'Consulta de Pontos',
                    'nome' => $dataPessoa[0]['nome'],
                    'sobrenome' => $dataPessoa[0]['sobrenome'],
                    'foto' => $photoProfile,
                    'data_cadastro' => $dataPessoa[0]['data_cadastro'],
                    'profissao' => $dataPessoa[0]['profissao'],
                    'horario_inicial' => $dataPessoa[0]['horario_inicial'],
                    'horario_final' => $dataPessoa[0]['horario_final'],
                    'horario_almoco' => $dataPessoa[0]['horario_almoco']
                );

                $this->load->view('app/include/header', $data);
                $this->load->view('app/include/cabecalho_default', $data);
                $this->load->view('app/ponto/consultar_pontos_filter', $data);
                $this->load->view('app/include/footer_default');
                $this->load->view('app/include/adminLTE');
            } else {
                redirect('Login');
            }
        }

        public function filtro() {

            if (isLogado($this->session->userdata('id')) == TRUE ) {

                $dataPessoa   = $this->setHeader();
                $photoProfile = $this->getPhotoProfile($dataPessoa[0]['foto']);
                $getDate      = $this->input->post('data-trabalho');
                $dateBegin    = formatData(dataFilter($getDate, true));
                $dateEnd      = formatData(dataFilter($getDate, false));
                $dados        = $this->getDataReady(dateToMYSQL($dateBegin), dateToMYSQL($dateEnd));

                $data = array(
                    'titulo' =>  'Consulta de Pontos - Filtro',
                    'nome' => $dataPessoa[0]['nome'],
                    'sobrenome' => $dataPessoa[0]['sobrenome'],
                    'foto' => $photoProfile,
                    'data_cadastro' => $dataPessoa[0]['data_cadastro'],
                    'profissao' => $dataPessoa[0]['profissao'],
                    'data_filtro_inicial' => dataFilter($getDate, true),
                    'data_filtro_final' => dataFilter($getDate, false),
                    'dadosPessoa' => $dados,
                    'total' => $this->getTotalHour(dateToMYSQL($dateBegin), dateToMYSQL($dateEnd))
                );

                $this->load->view('app/include/header', $data);
                $this->load->view('app/include/cabecalho_default', $data);
                $this->load->view('app/ponto/consultar_pontos', $data);
                $this->load->view('app/include/footer_default');
                $this->load->view('app/include/adminLTE');
            } else {
                redirect('Login');
            }
        }

        private function setHeader() {
            $data = $this->HeaderDefault_model->selectPessoa($this->session->userdata('id'));
            return $data;
        }

        private function setPhoto() {
            $data = $this->HeaderDefault_model->getPhoto();
            return $data;
        }

        private function getPhotoProfile($photo) {
            if (empty($photo)) {
                $photoProf = $this->setPhoto();
            } else {
                $photoProf = $photo;
            }

            return $photoProf;
        }

        private function getDataReady($dataIni, $dataFim) {
            return $this->ponto_model->doFilter($dataIni, $dataFim);;
        }

        private function getTotalHour($dataIni, $dataFim) {
            $total = valueMask($this->ponto_model->getTotalourFilter($dataIni, $dataFim));
            return $total;
        }
}
