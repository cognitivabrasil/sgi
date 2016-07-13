<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pendencias extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
      $this->load->view('header');
      $this->load->view('head_logado');
      $this->load->view('menu');

      $this->load->model('pendencias_model');
      $query = $this->pendencias_model->select();

      $this->load->view('pendencias', array('data'=>$query->result()));
      $this->load->view('footer');
    }

    function cadastra() {
      $this->load->view('header');
      $this->load->view('head_logado');
      $this->load->view('menu');
      $this->load->view('pendencias_cadastra');
      $this->load->view('footer');
    }

    function visualiza($id) {
      $this->load->view('header');
      $this->load->view('head_logado');
      $this->load->view('menu');

      $this->load->model('pendencias_model');
      $query = $this->pendencias_model->select($id);

      $this->load->view('pendencias_visualiza', array('data'=>$query->result()));
      $this->load->view('footer');
    }

    function insert() {
      $this->load->model('pendencias_model');
	    $this->pendencias_model->insert();

      $this->load->view('header');
      $this->load->view('head_logado');
      echo "<div class='alert alert-success fade in'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Pendência cadastrada com sucesso!</div>";
      $this->load->view('menu');

      //$this->load->model('pendencias_model');
      //$query = $this->usuarios_model->select();

      $this->load->view('pendencias');
      $this->load->view('footer');

    }
}
