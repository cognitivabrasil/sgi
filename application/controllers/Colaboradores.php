<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Colaboradores extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
      $this->load->view('header');
      $this->load->view('head_logado');
      $this->load->view('menu');

      $this->load->model('empreendimentos_model');
      $query = $this->empreendimentos_model->select();

      $this->load->view('colaboradores', array('data'=>$query->result()));
      $this->load->view('footer');
    }

    function cadastra() {
      $this->load->view('header');
      $this->load->view('head_logado');
      $this->load->view('menu');

      $this->load->model('empreendimentos_model');
      $query = $this->empreendimentos_model->select();

      $this->load->view('colaboradores_cadastra', array('data'=>$query->result()));
      $this->load->view('footer');
    }

    function lista($id=0) {
      $this->load->view('header');
      $this->load->view('head_logado');
      $this->load->view('menu');

      $this->load->model('colaboradores_model');
      $query = $this->colaboradores_model->lista($id);

      $this->load->view('colaboradores_lista', array('data'=>$query->result()));
      $this->load->view('footer');
    }

    function insert() {
      $this->load->model('colaboradores_model');
	    $this->colaboradores_model->insert();

      $this->load->view('header');
      $this->load->view('head_logado');
      echo "<div class='alert alert-success fade in'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Colaborador cadastrado com sucesso!</div>";
      $this->load->view('menu');

      $this->load->model('usuarios_model');
      $query = $this->usuarios_model->select();

      $this->load->view('usuarios', array('data'=>$query->result()));
      $this->load->view('footer');
    }

    function visualiza($id=0) {
      $this->load->view('header');
      $this->load->view('head_logado');
      $this->load->view('menu');

      $this->load->model('colaboradores_model');
      $query = $this->colaboradores_model->select($id);

      $this->load->view('colaboradores_visualiza', array('data'=>$query->result()));
      $this->load->view('footer');
    }
}
