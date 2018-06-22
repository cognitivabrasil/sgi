<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Consultores extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
      $this->load->model('usuarios_model');
      $this->usuarios_model->verifica_login();

      $this->load->view('header');
      $this->load->view('head_logado');

      $this->load->model('consultores_model');
      $query = $this->consultores_model->select();

      $this->load->view('consultores', array('data'=>$query->result()));
      $this->load->view('footer');
    }

    function cadastra() {
      $this->load->model('usuarios_model');
      $this->usuarios_model->verifica_login();

      $this->load->view('header');
      $this->load->view('head_logado');

      $this->load->view('consultores_cadastra');
      $this->load->view('footer');
    }

    function horas() {
      $this->load->model('usuarios_model');
      $this->usuarios_model->verifica_login();

      $this->load->view('header');
      $this->load->view('head_logado');

      $this->load->view('consultores_inserehora');
      $this->load->view('footer');
    }

    function visualiza($id) {
      $this->load->model('usuarios_model');
      $this->usuarios_model->verifica_login();

      $this->load->view('header');
      $this->load->view('head_logado');

      $this->load->model('consultores_model');
      $query = $this->consultores_model->select($id);

      $this->load->view('consultores_visualiza', array('data'=>$query->result()[0]));
      $this->load->view('footer');
    }

    function insert() {
      $this->load->model('usuarios_model');
      $this->usuarios_model->verifica_login();

      $this->load->model('consultores_model');
	    $this->consultores_model->insert();

      $this->load->view('header');
      $this->load->view('head_logado');
      echo "<div class='alert alert-success fade in'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Consultor cadastrado com sucesso!</div>";

      $this->load->model('consultores_model');
      $query = $this->consultores_model->select();

      $this->load->view('consultores', array('data'=>$query->result()));
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

    function edita($id=0) {
      $this->load->model('usuarios_model');
      $this->usuarios_model->verifica_login();

      $this->load->view('header');
      $this->load->view('head_logado');

      $this->load->model('colaboradores_model');
      $query = $this->colaboradores_model->select($id);

      $this->load->model('empreendimentos_model');
      $queryEmp = $this->empreendimentos_model->selectColaboradorEmpreendimento($id);

      $this->load->view('colaboradores_edita', array('data'=>$query->result()[0],'emp'=>$queryEmp->result()));
      $this->load->view('footer');
    }

    function remove($id) {
      $this->load->model('colaboradores_model');
      echo $this->colaboradores_model->remove($id);
    }
}
