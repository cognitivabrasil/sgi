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

    function cadastra() {
      $this->load->model('usuarios_model');
      $this->usuarios_model->verifica_login();

      $this->load->view('header');
      $this->load->view('head_logado');

      $this->load->view('consultores_cadastra');
      $this->load->view('footer');
    }

    function edita($id) {
      $this->load->model('usuarios_model');
      $this->usuarios_model->verifica_login();

      $this->load->view('header');
      $this->load->view('head_logado');

      $this->load->model('consultores_model');
      $query = $this->consultores_model->selectByID($id);

      $this->load->view('consultores_edita', array('data'=>$query->result()[0]));
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

      $this->load->model('consultores_model');
	    $this->consultores_model->save();

      $this->load->view('header');
      $this->load->view('head_logado');
      echo "<div class='alert alert-success fade in'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Consultor salvo com sucesso!</div>";

      $this->load->model('consultores_model');
      $query = $this->consultores_model->select($id=0);

      $this->load->view('consultores', array('data'=>$query->result()));
      $this->load->view('footer');
    }

    
    function remove($id) {
      $this->load->model('consultores_model');
      echo $this->consultores_model->remove($id);
    }

    function visualiza_relatorios($id) {
      $this->load->model('usuarios_model');
      $this->usuarios_model->verifica_login();

      $this->load->view('header');
      $this->load->view('head_logado');

      $this->load->model('consultores_model');
      $query = $this->consultores_model->select_consultorias($id);

      $this->load->view('consultores_relatorios', array('data'=>$query->result()));
      $this->load->view('footer');
    }

}
