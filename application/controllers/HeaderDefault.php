<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: henrique
 * Date: 7/16/18
 * Time: 9:48 PM
 */
    class HeaderDefault extends CI_Controller {

        public function __construct() {
            parent::__construct();
            $this->load->model('headerdefault_model');
        }

        public function setHeader() {

            $data = $this->headerdefault_model->selectPessoa($this->session->userdata('id'));

            return $data;

        }

    }