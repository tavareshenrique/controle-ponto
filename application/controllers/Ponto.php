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

                if (!$this->definyDefaultTime($data, $this->session->userdata('id'))) {
                    $this->load->view('app/include/header', $data);
                    $this->load->view('app/include/cabecalho_default', $data);
                    $this->load->view('app/ponto/ponto', $data);
                    $this->load->view('app/include/footer_default');
                    $this->load->view('app/include/adminLTE');
                }
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
//                    'ponto' => $this->getDay(MonthNumber, Year),
                    'horario_inicial' => $this->getTimeDefault(true, $this->session->userdata('id')),
                    'horario_final' => $this->getTimeDefault(false, $this->session->userdata('id'))
                );

                if (!$this->definyDefaultTime($data, $this->session->userdata('id'))) {
                    $this->load->view('app/include/header', $data);
                    $this->load->view('app/include/cabecalho_default', $data);
                    $this->load->view('app/ponto/consultarFilter_mes', $data); // $this->load->view('app/ponto/ponto_mes', $data);
                    $this->load->view('app/include/footer_default');
                    $this->load->view('app/include/adminLTE');
                }
            } else {
                redirect('Login');
            }
        }

        public function doIncMes() {


            if (isLogado($this->session->userdata('id')) == TRUE) {
                $dataPessoa = $this->setHeader();

                if (empty($dataPessoa[0]['foto'])) {
                    $fotoPerfil = $this->setPhoto();
                } else {
                    $fotoPerfil = $dataPessoa[0]['foto'];
                }

                $mes = $this->returnNumberMonth($_POST['mes']);
                $ano = ($_POST['ano']);

                $data = array(
                    'titulo' => 'Ponto',
                    'nome' => $dataPessoa[0]['nome'],
                    'sobrenome' => $dataPessoa[0]['sobrenome'],
                    'foto' => $fotoPerfil,
                    'profissao' => $dataPessoa[0]['profissao'],
                    'data_cadastro' => $dataPessoa[0]['data_cadastro'],
                    'ponto' => $this->getDay($mes, $ano),
//                    'ponto' => $this->getDay(MonthNumber, Year),
                    'horario_inicial' => $this->getTimeDefault(true, $this->session->userdata('id')),
                    'horario_final' => $this->getTimeDefault(false, $this->session->userdata('id'))
                );

                $this->load->view('app/include/header', $data);
                $this->load->view('app/include/cabecalho_default', $data);
                $this->load->view('app/ponto/ponto_mes', $data);
                $this->load->view('app/include/footer_default');
                $this->load->view('app/include/adminLTE');
            } else {
                redirect('Login');
            }
        }

        public function doInsert() {
            $this->ponto_model->doInsert();
            redirect('Ponto');
        }

        public function doInsertMeses() {
            $horas = $_POST;
            $mes = substr($horas['dataTrabalho'], 5,-3);
            $ano = substr($horas['dataTrabalho'], 0,-6);
            $horaInicial = $horas['horaInicial'];
            $horaFinal = $horas['horaFinal'];
            $NumDias = count($horaInicial);
            $this->ponto_model->doInsertMeses($this->session->userdata('id'), $ano, $mes, $NumDias, $horaInicial, $horaFinal);
            redirect('Ponto/mes');
        }

        private function definyDefaultTime($data, $pessoa) {

            if ($this->ponto_model->doStandardTimetable($pessoa)) {
                $this->load->view('app/include/header', $data);
                $this->load->view('app/include/cabecalho_default', $data);
                $this->load->view('app/ponto/cadastrar_horario', $data);
                $this->load->view('app/include/footer_default');
                $this->load->view('app/include/adminLTE');

                return true;
            } else {
                return false;
            }
        }

        private function getTimeDefault($timeStart, $pessoa) {
            return $this->ponto_model->getTimeDefault($timeStart, $pessoa);
        }

        private function getDay($mes, $ano) {
            return $this->ponto_model->getDay($mes, $ano);
        }

        private function setHeader() {
            return $this->HeaderDefault_model->selectPessoa($this->session->userdata('id'));
        }

        private function setPhoto() {
            return $this->HeaderDefault_model->getPhoto();
        }

        private function returnNumberMonth($month) {
            switch ($month) {
                case "Janeiro":
                    return 1;
                    break;
                case "Fevereiro":
                    return 2;
                    break;
                case "Março":
                    return 3;
                    break;
                case "Abril":
                    return 4;
                    break;
                case "Maio":
                    return 5;
                    break;
                case "Junho":
                    return 6;
                    break;
                case "Julho":
                    return 7;
                    break;
                case "Agosto":
                    return 8;
                    break;
                case "Setembro":
                    return 9;
                    break;
                case "Outubro":
                    return 10;
                    break;
                case "Novembro":
                    return 11;
                    break;
                case "Dezembro":
                    return 12;
                    break;
            }
        }
    }
