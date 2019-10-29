<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Projetos extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
      $this->load->model('usuarios_model');
      $this->usuarios_model->verifica_login();

      $this->load->view('header');
      $this->load->view('head_logado');

      $this->load->model('projetos_model');
      $query = $this->projetos_model->select();
      $dados = $query->result();

      $this->load->view('projetos', array('data'=>$dados));
      $this->load->view('footer');
    }

    function lista($id) {
      $this->load->model('usuarios_model');
      $this->usuarios_model->verifica_login();

      $this->load->view('header');
      $this->load->view('head_logado');

      $this->load->model('projetos_model');
      $query = $this->projetos_model->selectByID($id);
      $dados = $query->result();

      $this->load->view('projetos_visualiza', array('data'=>$dados[0]));
      $this->load->view('footer');
    }

    function edita($id) {
      $this->load->model('usuarios_model');
      $this->usuarios_model->verifica_login();

      $this->load->view('header');
      $this->load->view('head_logado');

      $this->load->model('projetos_model');
      $query = $this->projetos_model->selectByID($id);
      $dados = $query->result();

      $this->load->view('projetos_edita', array('data'=>$dados[0]));
      $this->load->view('footer');
    }

    function cadastra() {
      $this->load->model('usuarios_model');
      $this->usuarios_model->verifica_login();

      $this->load->view('header');
      $this->load->view('head_logado');

      $this->load->view('projetos_cadastra');
      $this->load->view('footer');
    }

    function insert() {
      $this->load->model('usuarios_model');
      $this->usuarios_model->verifica_login();

      $this->load->model('projetos_model');
	    $this->projetos_model->insert();

      $this->load->view('header');
      $this->load->view('head_logado');
      echo "<div class='alert alert-success fade in'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Projeto inserido com sucesso!</div>";

      $query = $this->projetos_model->select();
      $dados = $query->result();

      $this->load->view('projetos', array('data'=>$dados));
      $this->load->view('footer');
    }

    function save() {
      $this->load->model('usuarios_model');
      $this->usuarios_model->verifica_login();

      $this->load->model('projetos_model');
	    $this->projetos_model->save();

      $this->load->view('header');
      $this->load->view('head_logado');
      echo "<div class='alert alert-success fade in'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Projeto editado com sucesso!</div>";

      $query = $this->projetos_model->select();
      $dados = $query->result();

      $this->load->view('projetos', array('data'=>$dados));
      $this->load->view('footer');
    }

    function remove($id) {
      $this->load->model('projetos_model');
      echo $this->projetos_model->remove($id);
    }
}
