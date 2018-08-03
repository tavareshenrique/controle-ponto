<?php

    class Usuario_model extends CI_Model {
    
        public function __construct() {
    	    parent::__construct();
            $this->load->library('encrypt');
        }

        public function doInsert($idPessoa) {

            $senhaEncode = $this->encrypt->encode(SENHA_BEGIN.$this->input->post('senha-cadastro').SENHA_END);
    	    $dataUsuario = array (
    		    'email' => $this->input->post('email-cadastro'),
    		    'senha' => $senhaEncode, //$this->encrypt->decode()
    		    'fkpessoa' => $idPessoa
    	    );

        	$this->db->insert('usuario', $dataUsuario);
        }

        public function getEmail($email) {

            $this->load->database();
            $query = $this->db->get_where('usuario',array('email'=>$email));
            $result = $query->result_array();
            if(count($result) > 0) {
                return FALSE;
            } else {
                return TRUE;
            }
        }

        public function logar($email, $senha) {

            $senhaDesyc = $this->getPassword($email);
            if ($senhaDesyc != $senha) {
                return FALSE;
            } else {
                $this->load->database();
                $query = $this->db->get_where('usuario',array('email'=>$email, 'senha'=>$senhaDesyc));
                $result = $query->result_array();
                if(count($result) > 0) {
                    return FALSE;
                } else {
                    return TRUE;
                }
            }
        }

        public function getID($email) {
            $this->db->select('id')
                     ->from('usuario')
                     ->where('email', $email);
            $query = $this->db->get()->row()->id;

            return $query;
        }

        private function getPassword($email) {

            $this->db->select('senha')
                    ->from('usuario')
                    ->where('email', $email);
            $query = $this->db->get()->row()->senha;

            return $decodeSenha = $this->decryptPassword($query);
        }

        private function decryptPassword($password) {
            $getPassDcyp      = $this->encrypt->decode($password);
            $getPassDcypBegin = str_replace(SENHA_BEGIN, "", $getPassDcyp);

            return $getPassDcypEnd = str_replace(SENHA_END, "", $getPassDcypBegin);
        }
    }