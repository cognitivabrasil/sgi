<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Colaboradores extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
      $this->load->model('usuarios_model');
      $this->usuarios_model->verifica_login();

      $this->load->view('header');
      $this->load->view('head_logado');

      $this->load->model('empreendimentos_model');
      $query = $this->empreendimentos_model->select();

      $this->load->view('colaboradores', array('data'=>$query->result()));
      $this->load->view('footer');
    }

    function cadastra() {
      $this->load->model('usuarios_model');
      $this->usuarios_model->verifica_login();

      $this->load->view('header');
      $this->load->view('head_logado');

      $this->load->model('empreendimentos_model');
      $query = $this->empreendimentos_model->select();

      $this->load->view('colaboradores_cadastra', array('data'=>$query->result()));
      $this->load->view('footer');
    }

    function lista($id=0) {
      $this->load->model('usuarios_model');
      $this->usuarios_model->verifica_login();

      $this->load->view('header');
      $this->load->view('head_logado');

      $this->load->model('colaboradores_model');
      $query = $this->colaboradores_model->lista($id);

      $this->load->view('colaboradores_lista', array('data'=>$query->result()));
      $this->load->view('footer');
    }

    function insert() {
      $this->load->model('usuarios_model');
      $this->usuarios_model->verifica_login();

      $this->load->model('colaboradores_model');
	    $this->colaboradores_model->insert();

      $this->load->view('header');
      $this->load->view('head_logado');
      echo "<div class='alert alert-success fade in'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Colaborador cadastrado com sucesso!</div>";

      $this->load->model('empreendimentos_model');
      $query = $this->empreendimentos_model->select();

      $this->load->view('colaboradores', array('data'=>$query->result()));
      $this->load->view('footer');
    }

    function save() {
      $this->load->model('usuarios_model');
      $this->usuarios_model->verifica_login();

      $this->load->model('colaboradores_model');
	    $this->colaboradores_model->save();

      $this->load->view('header');
      $this->load->view('head_logado');
      echo "<div class='alert alert-success fade in'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Colaborador salvo com sucesso!</div>";

      $this->load->model('empreendimentos_model');
      $query = $this->empreendimentos_model->select();

      $this->load->view('colaboradores', array('data'=>$query->result()));
      $this->load->view('footer');
    }

    function visualiza($id=0) {
      $this->load->model('usuarios_model');
      $this->usuarios_model->verifica_login();

      $this->load->view('header');
      $this->load->view('head_logado');

      $this->load->model('colaboradores_model');
      $query = $this->colaboradores_model->select($id);

      $this->load->view('colaboradores_visualiza', array('data'=>$query->result()[0]));
      $this->load->view('footer');
    }

    function edita($id=0) {
      $this->load->model('usuarios_model');
      $this->usuarios_model->verifica_login();
      
      $this->load->view('header');
      $this->load->view('head_logado');

      $this->load->model('colaboradores_model');
      $query = $this->colaboradores_model->select($id);

      $this->load->model('empreendimentos_model');
      $queryEmp = $this->empreendimentos_model->select();

      $this->load->view('colaboradores_edita', array('data'=>$query->result()[0],'emp'=>$queryEmp->result()));
      $this->load->view('footer');
    }
}
