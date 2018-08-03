<?php
/**
 * Created by PhpStorm.
 * User: henrique
 * Date: 7/20/18
 * Time: 9:03 PM
 */
    class Cidade_model extends CI_Model {

        public function __construct() {
            parent::__construct();
        }

        /**
         * Retorna as Cidades
         */
        public function getCities() {

            $query = $this->db->query('SELECT cidade FROM cidades ORDER BY cidade ASC');

            return $query->result();
        }
    }