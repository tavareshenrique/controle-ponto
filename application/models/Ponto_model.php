<?php
/**
 * Created by PhpStorm.
 * User: henrique
 * Date: 5/14/18
 * Time: 12:16 AM
 */

    class Ponto_model extends CI_Model {

        public function __construct() {
            parent::__construct();
        }

        public function doInsert() {

            $data_inicial = $this->getData(True, $this->input->post('data-trabalho'));
            $data_final   = $this->getData(False, $this->input->post('data-trabalho'));

            $hora_inicial = $this->getHour(True, $this->input->post('hora-inicial'));
            $hora_final   = $this->getHour(False, $this->input->post('hora-final'));

            $mes_inicial  = $this->getMonth($data_inicial);
            $mes_final    = $this->getMonth($data_final);

            $ano_inicial  = $this->getYear($data_inicial);
            $ano_final    = $this->getYear($data_final);

            $data = array (
                'data_inicial' => $data_inicial,
                'data_final' => $data_final,
                'horario_inicial' => $hora_inicial,
                'horario_final' => $hora_final,
                'ano_inicial' => $ano_inicial,
                'ano_final' => $ano_final,
                'mes_inicial' => $mes_inicial,
                'mes_final' =>  $mes_final,
                'fkpessoa' => $this->session->userdata('id')
            );

            $this->db->insert('ponto', $data);

        }

        public function doInsertMeses($pessoa, $ano, $mes, $numDias, $horasInicial, $horaFinal) {

            $this->db->trans_begin();

            $dia = $this->getDay($mes, $ano);

            $this->deletePonto($pessoa, $ano, $mes);
            try {
                for ($i = 0; $i <= $numDias-1; $i++) {

                    $data_inicial = $dia[$i]['dia'];
                    $data_final   = $dia[$i]['dia'];

                    $hora_inicial = $horasInicial[$i];
                    $hora_final   = $horaFinal[$i];

                    if( (!empty($hora_inicial)) and (!empty($hora_final))) {
                        $mes_inicial  = $this->getMonth($data_inicial);
                        $mes_final    = $this->getMonth($data_final);

                        $ano_inicial  = $this->getYear($data_inicial);
                        $ano_final    = $this->getYear($data_final);

                        $data = array (
                            'data_inicial' => $data_inicial,
                            'data_final' => $data_final,
                            'horario_inicial' => $hora_inicial,
                            'horario_final' => $hora_final,
                            'ano_inicial' => $ano_inicial,
                            'ano_final' => $ano_final,
                            'mes_inicial' => $mes_inicial,
                            'mes_final' =>  $mes_final,
                            'fkpessoa' => $this->session->userdata('id')
                        );

                        $this->db->insert('ponto', $data);
                    }

                }

                if ($this->db->trans_status() === FALSE)  {
                    $this->db->trans_rollback();
                    return FALSE;
                } else {
                    $this->db->trans_commit();
                    return TRUE;
                }
            } catch (Exception $e) {
                var_dump($e->getMessage());
            }
        }

        public function getDay($mes, $ano) {

            $whereArray = 'calendario.mes = '. $mes .' AND calendario.ano = '. $ano;

            $this->db->select('dia')
                ->from('calendario')
                ->where($whereArray);

            $query = $this->db->get()->result_array();

            return $query;

        }

        public function getTotalourFilter($dataIni, $dataFim) {

            $cSQL =  'SELECT'.
                     '    SUM(TIMEDIFF(TIMEDIFF(ponto.horario_final, ponto.horario_inicial), horario_padrao.horario_almoco)) AS totalHoras '.
                     'FROM ponto '.
                     'LEFT JOIN pessoa ON (pessoa.id = ponto.fkpessoa) '.
                     'LEFT JOIN horario_padrao ON (horario_padrao.fkpessoa = pessoa.id) '.
                     'WHERE ponto.data_inicial BETWEEN '."'".$dataIni."'". ' AND ' ."'".$dataFim."'".' AND '.
                     'ponto.data_final BETWEEN '."'".$dataIni."'". ' AND ' ."'".$dataFim."'";

            $query = $this->db->query($cSQL);

            return $query->row()->totalHoras;

        }

        public function getMonth($data) {

            $month = date("m",strtotime($data));
            return $month;
        }

        public function getTimeDefault($timeStart, $pessoa) {

            if ($timeStart) {
                $this->db->select('horario_inicial')
                    ->from('horario_padrao')
                    ->where('fkpessoa', $pessoa);

                $query = $this->db->get();
                $time = $query->row();

                return $time->horario_inicial;

            } else {
                $this->db->select('horario_final')
                    ->from('horario_padrao')
                    ->where('fkpessoa', $pessoa);

                $query = $this->db->get();
                $time = $query->row();

                return $time->horario_final;
            }

        }

        private function getData($isStartDate, $dataTrab) {
            if ($isStartDate) {
                $data = strtotime(substr($dataTrab, 0, 10));
                $data = date('Y-m-d', $data);

                return $data;
            } else {
                $data = strtotime(substr($dataTrab, 13, 24));
                $data = date('Y-m-d', $data);

                return $data;
            }
        }

        private function getHour($isStartHour, $hour) {
            if ($isStartHour) {
                $hour_h   = substr($hour, 0, 2);
                $hour_m   = substr($hour, 3, 2);
                $meridiem = substr($hour, 6, 8);

                $hour     = $this->convertHour($hour_h, $meridiem) . ':' . $hour_m;

                return $hour;
            } else {
                $hour_h   = substr($hour, 0, 2);
                $hour_m   = substr($hour, 3, 2);
                $meridiem = substr($hour, 6, 8);

                $hour     = $this->convertHour($hour_h, $meridiem) . ':' . $hour_m;

                return $hour;
            }
        }

        private function getYear($date) {
            $sql = 'functionReturnYear('. "'" .$date. "'" .') as year';
            $this->db->select($sql);
            $query = $this->db->get()->row()->year;

            return $query;
        }

        private function deletePonto($pessoa, $ano, $mes) {

            $whereDelete = 'fkpessoa = '.$pessoa.' AND ano_inicial = '.$ano.' AND ano_final = '.$ano.' AND mes_inicial = '.$mes.' AND mes_final = '.$mes;
            $this->db->where($whereDelete);
            $this->db->delete('ponto');
        }

        public function doFilter($dataInicial, $dataFinal) {

            $whereArrayIni = 'vw_ponto.data_final BETWEEN '."'".$dataInicial."'".' AND '."'".$dataFinal."'".' AND ';
            $whereArrayFim = 'vw_ponto.data_inicial BETWEEN '."'".$dataInicial."'".' AND '."'".$dataFinal."'";
            $where = $whereArrayIni . $whereArrayFim;

            $this->db->select('*')
                ->from('vw_ponto')
                ->where($where )
                ->order_by('data_inicial', 'asc');


            $query = $this->db->get()->result_array();

            return $query;
        }

        private function convertHour($time, $meridiem) {
            if ($meridiem == 'PM') {
                switch ($time) {
                    case '01':
                        return '13';
                        break;
                    case '02':
                        return '14';
                        break;
                    case '03':
                        return '15';
                        break;
                    case '04':
                        return '16';
                        break;
                    case '05':
                        return '17';
                        break;
                    case '06':
                        return '18';
                        break;
                    case '07':
                        return '19';
                        break;
                    case '08':
                        return '20';
                        break;
                    case '09':
                        return '21';
                        break;
                    case '10':
                        return '22';
                        break;
                    case '11':
                        return '23';
                        break;
                    case '12':
                        return '00';
                        break;
                }
            } else {
                return $time;
            }
        }
    }