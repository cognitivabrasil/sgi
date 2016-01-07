<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Faturamento extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
      $this->load->view('header');
      $this->load->view('head_logado');
      $this->load->view('menu');

      //$this->load->model('usuarios_model');
      //$query = $this->usuarios_model->select();

      $this->load->view('faturamento');
      $this->load->view('footer');
    }

    function cadastra() {
      $this->load->view('header');
      $this->load->view('head_logado');
      $this->load->view('menu');
      $this->load->view('patrimonios_cadastra');
      $this->load->view('footer');
    }

    function insert() {
      $this->load->model('usuarios_model');
	    $this->usuarios_model->insert();

      $this->load->view('header');
      $this->load->view('head_logado');
      echo "<div class='alert alert-success fade in'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Usuário cadastrado com sucesso!</div>";
      $this->load->view('menu');

      $this->load->model('usuarios_model');
      $query = $this->usuarios_model->select();

      $this->load->view('usuarios', array('data'=>$query->result()));
      $this->load->view('footer');
    }
}
