<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Area_restrita extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('usuarios_model', 'usuarios');
        $this->usuario->logged();
    }

    public function index() {

        $this->load->view('login/area_restrita_view');

    }
}
