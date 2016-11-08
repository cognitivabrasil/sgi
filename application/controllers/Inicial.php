<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Inicial extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
      $this->load->model('usuarios_model');
      $this->usuarios_model->verifica_login();
      
      $this->load->view('header');
      $this->load->view('head_logado');

      $this->load->model('usuarios_model');
      $query = $this->usuarios_model->selectBySession();

      $this->load->view('inicial_view', array('data'=>$query->result()[0]->nome));
      $this->load->view('footer');
    }
}
