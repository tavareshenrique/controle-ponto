<?php
/**
 * Created by PhpStorm.
 * User: henrique
 * Date: 5/8/18
 * Time: 12:06 AM
 */

    class Pessoa_model extends CI_Model {
        public function __construct() {
            parent::__construct();
            $this->load->library('encrypt');
        }

        public function doInsert() {
            $data = array (
                'nome' => $this->input->post('nome-cadastro'),
                'sobrenome' => $this->input->post('sobrenome-cadastro')
            );

            $this->db->insert('pessoa', $data);
            return $this->db->insert_id();
        }
    }