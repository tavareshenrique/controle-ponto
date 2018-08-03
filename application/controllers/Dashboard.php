<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: henriqueappMask
 * Date: 5/8/18
 * Time: 10:58 PM
 */

    class Dashboard extends CI_Controller {

        public function __construct() {
            parent::__construct();
            $this->load->model('dashboard_model');
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
                    'titulo' => 'Dashboard',
                    'yearDashboard' => $this->setYearTotal(Year),
                    'currentMonth' => $this->setDidCurrentMonth(MonthNumber),
                    'totalMonth' => $this->setTotalToDoMonth(),
                    'totalPay' => $this->setHoursPay(),
                    'year' => Year,
                    'month' => Month,
                    'nome' => $dataPessoa[0]['nome'],
                    'sobrenome' => $dataPessoa[0]['sobrenome'],
                    'foto' => $fotoPerfil,
                    'profissao' => $dataPessoa[0]['profissao'],
                    'data_cadastro' => $dataPessoa[0]['data_cadastro']
                );

                $this->load->view('app/include/header', $data);
                $this->load->view('app/include/cabecalho_default', $data);
                $this->load->view('app/dashboard/dashboard', $data);
                $this->load->view('app/include/footer_default');
            } else {
                redirect('Login');
            }
        }


        public function sessionDestroy() {
            $this->session->sess_destroy();
            redirect('Login');
        }

        private function setYearTotal($year) {
            $newYear = $this->dashboard_model->getYearTotal($this->session->userdata('id'), $year);
            if (($newYear == null) or ($newYear == "0")) {
                return '00:00:00';
            } else {
                $getYear = $this->appMask($newYear);
                return $getYear;
            }
        }

        private function setDidCurrentMonth($month) {
            $didCurrent = $this->dashboard_model->getDidCurrentMonth($this->session->userdata('id'), $month);
            if (($didCurrent == null) or ($didCurrent == "0")) {
                return '00:00:00';
            } else {
                $didCurrent = $this->appMask($didCurrent);
                return $didCurrent;
            }

        }

        private function setTotalToDoMonth() {
            $time = $this->dashboard_model->getTotalToDoMonth($this->session->userdata('id'));
            if (($time == null) or ($time == "0")) {
                return '00:00:00';
            } else {
                $getTime = $this->appMask($time);
                return $getTime;
            }
        }

        private function setHoursPay() {
            $time = $this->dashboard_model->getHoursPay($this->session->userdata('id'));
            if (($time == null) or ($time == "0")) {
                return '00:00:00';
            } else {
                $getTime = $this->appMask($time);
                return $getTime;
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

        private function appMask($value) {
            if ($value != "0") {
                if (strlen($value) == 6 ) {
                    $getMask = mask("##:##:##", $value);
                } elseif (strlen($value) == 7 ) {
                    $getMask = mask("###:##:##", $value);
                }
            } else {
                $getMask = '00:00:00';
            }

            return $getMask;
        }
}
