<?php
/**
 * Created by PhpStorm.
 * User: henrique
 * Date: 7/21/18
 * Time: 4:19 PM
 */
    class Page404Error extends CI_Controller {

        public function __construct() {
            parent::__construct();
        }

        public function index() {

            $data['titulo'] = 'Página Não Encontrada';

            $this->load->view('app/include/header', $data);
            $this->load->view('app/include/page_404');
        }

    }