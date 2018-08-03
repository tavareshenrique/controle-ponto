<?php
/**
 * Created by PhpStorm.
 * User: henrique
 * Date: 7/16/18
 * Time: 10:03 PM
 */
    class HeaderDefault_model extends CI_Model {

        public function __construct() {
            parent::__construct();
        }

        public function selectPessoa($usuario) {

            $this->db->select('*')
                ->from('vw_pessoa')
                ->where('idUsuario', $usuario);

            $query = $this->db->get()->result_array();

            return $query;
        }

        public function getPhoto() {

            $this->db->select('foto')
                ->from('foto_perfil')
                ->where('fkpessoa', 2);

            $query = $this->db->get()->row()->foto;

            return $query;
        }

    }