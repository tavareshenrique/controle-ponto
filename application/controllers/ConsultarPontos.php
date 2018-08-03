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
                $dataPessoa = $this->setHeader();

                if (empty($dataPessoa[0]['foto'])) {
                    $fotoPerfil = $this->setPhoto();
                } else {
                    $fotoPerfil = $dataPessoa[0]['foto'];
                }

                $data = array(
                    'titulo' => 'Consulta de Pontos',
                    'nome' => $dataPessoa[0]['nome'],
                    'sobrenome' => $dataPessoa[0]['sobrenome'],
                    'foto' => $fotoPerfil,
                    'data_cadastro' => $dataPessoa[0]['data_cadastro'],
                    'profissao' => $dataPessoa[0]['profissao'],
                    'horario_inicial' => $dataPessoa[0]['horario_inicial'],
                    'horario_final' => $dataPessoa[0]['horario_final'],
                    'horario_almoco' => $dataPessoa[0]['horario_almoco']
                );
            } else {
                redirect('Login');
            }

            $this->load->view('app/include/header', $data);
            $this->load->view('app/include/cabecalho_default', $data);
            $this->load->view('app/ponto/consultar_pontos_filter', $data);
            $this->load->view('app/include/footer_default');
        }

        public function filtro() {

            if (isLogado($this->session->userdata('id')) == TRUE ) {
                $dataPessoa = $this->setHeader();

                if (empty($dataPessoa[0]['foto'])) {
                    $fotoPerfil = $this->setPhoto();
                } else {
                    $fotoPerfil = $dataPessoa[0]['foto'];
                }

                $ddata = $this->input->post('data-trabalho');

                $dataIni = $this->formatData($this->getDataFilter($ddata, true));
                $dataFim =  $this->formatData($this->getDataFilter($ddata, false));

                $dados = $this->getDataReady($this->dateEmMysql($dataIni), $this->dateEmMysql($dataFim));

                $data = array(
                    'titulo' =>  'Consulta de Pontos - Filtro',
                    'nome' => $dataPessoa[0]['nome'],
                    'sobrenome' => $dataPessoa[0]['sobrenome'],
                    'foto' => $fotoPerfil,
                    'data_cadastro' => $dataPessoa[0]['data_cadastro'],
                    'profissao' => $dataPessoa[0]['profissao'],
                    'data_filtro_inicial' => $this->getDataFilter($ddata, true),
                    'data_filtro_final' => $this->getDataFilter($ddata, false),
                    'dadosPessoa' => $dados,
                    'total' => $this->getTotalHour($this->dateEmMysql($dataIni), $this->dateEmMysql($dataFim))
                );
            } else {
                redirect('Login');
            }

            $this->load->view('app/include/header', $data);
            $this->load->view('app/include/cabecalho_default', $data);
            $this->load->view('app/ponto/consultar_pontos', $data);
            $this->load->view('app/include/footer_default');
        }

        private function getDataReady($dataIni, $dataFim) {
            $dados = $this->ponto_model->doFilter($dataIni, $dataFim);
            return $dados;
        }

        private function getTotalHour($dataIni, $dataFim) {
            $total = $this->ponto_model->getTotalourFilter($dataIni, $dataFim);
            $total = $this->appMask($total);
            return $total;
        }

        private function getDataFilter($data, $firstData) {
            if ($firstData) {
                $gData = substr($data, 0, 11);
            } else {
                $gData = substr($data, 13, 23);
            }

            return $gData;
        }

        private function formatData($data) {

            $dataNew = '';
            for ($i = 0; $i <= (strlen($data)-1); $i++) {
                if ($data[$i] == '/') {
                    $dataNew = $dataNew . '-';
                } else {
                    $dataNew = $dataNew . $data[$i];
                }
            }

            return $dataNew;
        }

        private function dateEmMysql($dateSql){
//            08-01-2018
            $ano= substr($dateSql, 6, 4);
            $mes= substr($dateSql, 0,2);
            $dia= substr($dateSql, 3,2);
            $fim =  $ano."-".$mes."-".$dia;
            return $fim;
        }

        private function setHeader() {
            $data = $this->HeaderDefault_model->selectPessoa($this->session->userdata('id'));
            return $data;
        }

        private function setPhoto() {
            $data = $this->HeaderDefault_model->getPhoto();
            return $data;
        }

        private function appMask($value) {
            if (strlen($value) == 6 ) {
                $getMask = mask("##:##:##", $value);
            } elseif (strlen($value) == 7 ) {
                $getMask = mask("###:##:##", $value);
            } elseif (strlen($value) == 8 ) {
                $getMask = mask("####:##:##", $value);
            } elseif (strlen($value) == 9 ) {
                $getMask = mask("#####:##:##", $value);
            } elseif (strlen($value) == 10 ) {
                $getMask = mask("######:##:##", $value);
            }

            return $getMask;
        }

}
