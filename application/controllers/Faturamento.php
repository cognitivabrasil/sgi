<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Faturamento extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
      $this->load->model('usuarios_model');
      $this->usuarios_model->verifica_login();

      $this->load->view('header');
      $this->load->view('head_logado');

      $this->load->view('faturamento');
      $this->load->view('footer');
    }

    function lista($id) {
      $this->load->model('usuarios_model');
      $this->usuarios_model->verifica_login();

      $this->load->view('header');
      $this->load->view('head_logado');

      $this->load->model('faturamento_model');
      $query = $this->faturamento_model->buscaFaturamento($id);

      $queryCont = $this->faturamento_model->buscaContador($id);

      $queryNotas = $this->faturamento_model->buscaNotas($id);

      $this->load->view('faturamento', array('faturamento'=>$query->result(),'notas'=>$queryNotas->result(),'id_empreendimento'=>$id,'contador'=>$queryCont->result()[0]));
      $this->load->view('footer');
    }

    function cadastra() {
      $this->load->model('usuarios_model');
      $this->usuarios_model->verifica_login();

      $this->load->view('header');
      $this->load->view('head_logado');
      $this->load->view('faturamento_cadastra');
      $this->load->view('footer');
    }

    function insert() {
      $this->load->model('usuarios_model');
      $this->usuarios_model->verifica_login();

      $this->load->model('usuarios_model');
	    $this->usuarios_model->insert();

      $this->load->view('header');
      $this->load->view('head_logado');
      echo "<div class='alert alert-success fade in'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Usuário cadastrado com sucesso!</div>";

      $this->load->model('usuarios_model');
      $query = $this->usuarios_model->select();

      $this->load->view('usuarios', array('data'=>$query->result()));
      $this->load->view('footer');
    }

    function salvaPrevisao() {
      $this->load->model('faturamento_model');
	    $this->faturamento_model->salvaPrevisao();
    }

    function salvaContador() {
      $this->load->model('faturamento_model');
	    $this->faturamento_model->salvaContador();
    }

    function salvaNota() {
      $this->load->model('faturamento_model');
	    $this->faturamento_model->salvaNota();
    }
}
