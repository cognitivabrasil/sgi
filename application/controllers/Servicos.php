<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Servicos extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
      $this->load->model('usuarios_model');
      $this->usuarios_model->verifica_login();

      $this->load->view('header');
      $this->load->view('head_logado');

      $this->load->model('servicos_model');
      $query = $this->servicos_model->select();

      $queryAreas = $this->servicos_model->select_areas();

      $this->load->view('servicos', array('data'=>$query->result(), 'areas'=>$queryAreas->result()));
      $this->load->view('footer');
    }

    function area($area) {
      $this->load->model('usuarios_model');
      $this->usuarios_model->verifica_login();

      $this->load->view('header');
      $this->load->view('head_logado');

      $this->load->model('servicos_model');
      $query = $this->servicos_model->selectByArea($area);

      $queryAreas = $this->servicos_model->select_areas();

      $this->load->view('servicos', array('data'=>$query->result(), 'areas'=>$queryAreas->result()));
      $this->load->view('footer');
    }

    function visualiza($id) {
      $this->load->model('usuarios_model');
      $this->usuarios_model->verifica_login();

      $this->load->view('header');
      $this->load->view('head_logado');

      $this->load->model('servicos_model');
      $query = $this->servicos_model->select($id);

      $this->load->view('servicos_visualiza', array('data'=>$query->result()[0]));
      $this->load->view('footer');
    }

    function edita($id) {
      $this->load->model('usuarios_model');
      $this->usuarios_model->verifica_login();

      $this->load->view('header');
      $this->load->view('head_logado');

      $this->load->model('servicos_model');
      $query = $this->servicos_model->select($id);

      $this->load->view('servicos_edita', array('data'=>$query->result()[0]));
      $this->load->view('footer');
    }

    function cadastra() {
      $this->load->model('usuarios_model');
      $this->usuarios_model->verifica_login();

      $this->load->view('header');
      $this->load->view('head_logado');
      $this->load->view('servicos_cadastra');
      $this->load->view('footer');
    }

    function insert() {
      $this->load->model('usuarios_model');
      $this->usuarios_model->verifica_login();

      $this->load->model('servicos_model');
	    $this->servicos_model->insert();

      $this->load->view('header');
      $this->load->view('head_logado');
      echo "<div class='alert alert-success fade in'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Parceiro cadastrado com sucesso!</div>";

      $query = $this->servicos_model->select();

      $this->load->view('servicos', array('data'=>$query->result()));
      $this->load->view('footer');
    }

    function save() {
      $this->load->model('usuarios_model');
      $this->usuarios_model->verifica_login();

      $this->load->model('servicos_model');
	    $this->servicos_model->save();

      $this->load->view('header');
      $this->load->view('head_logado');
      echo "<div class='alert alert-success fade in'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Parceiro alterado com sucesso!</div>";

      $query = $this->servicos_model->select();

      $this->load->view('servicos', array('data'=>$query->result()));
      $this->load->view('footer');
    }

}
