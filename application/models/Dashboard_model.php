<?php
/**
 * Created by PhpStorm.
 * User: henrique
 * Date: 6/19/18
 * Time: 9:49 PM
 */

    class Dashboard_model extends CI_Model {

        public function __construct() {
            parent::__construct();
        }

        /**
        * Retorna total de horas do usuário que foi feita durante o ano em questão.
        */
        public function getYearTotal($usuario, $year) {
            $where = 'ano_inicial BETWEEN '.$year.' AND '.$year.' and ano_final BETWEEN '.$year.' AND '.$year.' and usuario = '.$usuario;
            $this->db->select('timeYear')
                ->from('vw_timeYear')
                ->where($where);

            $query = $this->db->get();
            $time  = $query->row();
            if ($time == null) {
                return null;
            } else {
                return $time->timeYear;
            }

        }

        /**
         * Retorna total de horas que foram feitas até o momento do atual mês.
         */
        public function getDidCurrentMonth($usuario, $month) {
            $arrayWhere = array('dataInicial' => $month, ' dataFinal' => $month, 'fkpessoa' => $usuario);
            $this->db->select('timeMonth')
                              ->from('vw_currentMonth')
                              ->where($arrayWhere);

            $query = $this->db->get();
            $time  = $query->row();
            if ($time == null) {
                return null;
            } else {
                return $time->timeMonth;
            }
        }

        /**
         * Retorna total de horas que deve ser feito no atual mês.
         */
        public function getTotalToDoMonth($usuario) {

            $data = $this->getHorarioPadrao($usuario);

            if( ($data[0]['horario_inicial'] != null) and ($data[0]['horario_final']) and ($data[0]['horario_almoco'])) {

                $sql  = '(functionTotCurrentMonth('. "'" . $data[0]['horario_inicial'] . "'" . ', '. "'" . $data[0]['horario_final'] . "'" .', '. "'" . $data[0]['horario_almoco'] . "'" .', '. $data[0]['sabado']  .', '. $data[0]['domingo'] .')) AS timeAllMonth';
//                mDebug($sql);
                $this->db->select($sql);
                $query = $this->db->get()->row()->timeAllMonth;
//                mDebug($query);

                return $query;

            } else {
                return null;
            }
        }

        /**
         * Retorna as Horas a Pagar no atual mês.
         */
        public function getHoursPay($usuario) {

            $data = $this->getHorarioPadrao($usuario);
            if( ($data[0]['horario_inicial'] != null) and ($data[0]['horario_final']) and ($data[0]['horario_almoco'])) {

                $sql = '(functionHoursToPay('. "'" . $data[0]['horario_inicial'] . "'" . ', '. "'" . $data[0]['horario_final'] . "'" .', '. "'" . $data[0]['horario_almoco'] . "'" .', '. $data[0]['sabado']  .', '. $data[0]['domingo'] .", ". $usuario .')) AS hoursPay';
                $this->db->select($sql);
                $query = $this->db->get()->row()->hoursPay;

                return $query;

            } else {
                return null;
            }
        }

        /**
         * Retorna total de horas geral.
         */
        public function getHourTotal($usuario) {

            $this->db->select('totalHour')
                ->from('vw_totalHour')
                ->where('usuario', $usuario);

            $query = $this->db->get();
            $time  = $query->row();
            if ($time == null) {
                return null;
            } else {
                return $time->totalHour;
            }

//            if ($this->db->get()->row()->totalHour == null) {
//                return null;
//            } else {
//                $query = $this->db->get()->row()->totalHour;
//                return $query;
//            }
        }


        /**
         * Select horario_inicial, horario_final, horario_almoco, sabado e domingo.
         */
        public function getHorarioPadrao($usuario) {

            $this->db->select('*')
                ->from('horario_padrao')
                ->where('fkpessoa', $usuario);

            $query = $this->db->get()->result_array();
            if ($query == null) {
                return null;
            } else {
                return $query;
            }
        }
}