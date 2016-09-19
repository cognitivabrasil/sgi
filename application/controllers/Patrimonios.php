<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Patrimonios extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
      $this->load->view('header');
      $this->load->view('head_logado');

      $this->load->model('patrimonios_model');
      $query = $this->patrimonios_model->select();

      $dados = $query->result();
      $count=0;
      foreach ($dados as $row) {
        $queryIn = $this->patrimonios_model->selectSala($row->id);
        if(count($queryIn->result())>0){
          $dados[$count]->sala = $queryIn->result()[0];
          $dados[$count]->sala->data_atribuicao = date("d/m/Y", strtotime($dados[$count]->sala->data_atribuicao));
        }
        $count++;
      }

      $this->load->view('patrimonios', array('data'=>$dados));
      $this->load->view('footer');
    }

    function visualiza($id) {
      $this->load->view('header');
      $this->load->view('head_logado');

      $this->load->model('patrimonios_model');
      $query = $this->patrimonios_model->selectByID($id);

      $dados = $query->result()[0];
      $queryIn = $this->patrimonios_model->selectSala($dados->id);
      if(count($queryIn->result())>0){
        $dados->sala = $queryIn->result()[0];
        $dados->sala->data_atribuicao = date("d/m/Y", strtotime($dados->sala->data_atribuicao));
      }

      $this->load->view('patrimonios_visualiza', array('data'=>$dados));
      $this->load->view('footer');
    }

    function atribui($id) {
      $this->load->view('header');
      $this->load->view('head_logado');

      $this->load->model('patrimonios_model');
      $query = $this->patrimonios_model->selectByID($id);

      $dados = $query->result()[0];
      $queryIn = $this->patrimonios_model->selectSala($dados->id);
      if(count($queryIn->result())>0){
        $dados->sala = $queryIn->result()[0];
        $dados->sala->data_atribuicao = date("d/m/Y", strtotime($dados->sala->data_atribuicao));
      }

      $querySalas = $this->patrimonios_model->selectAllSalas();

      $this->load->view('patrimonios_atribui', array('data'=>$dados,'salas'=>$querySalas->result()));
      $this->load->view('footer');
    }

    function atribuicao() {
      $this->load->model('patrimonios_model');
	    $this->patrimonios_model->atribuirPatrimonio();

      $this->load->view('header');
      $this->load->view('head_logado');
      echo "<div class='alert alert-success fade in'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Patrimônio atribuído com sucesso!</div>";

      $this->load->model('patrimonios_model');
      $query = $this->patrimonios_model->selectByID($_POST['id']);

      $dados = $query->result()[0];
      $queryIn = $this->patrimonios_model->selectSala($dados->id);
      if(count($queryIn->result())>0){
        $dados->sala = $queryIn->result()[0];
        $dados->sala->data_atribuicao = date("d/m/Y", strtotime($dados->sala->data_atribuicao));
      }

      $this->load->view('patrimonios_visualiza', array('data'=>$dados));
      $this->load->view('footer');
    }


    function cadastra() {
      $this->load->view('header');
      $this->load->view('head_logado');
      $this->load->view('patrimonios_cadastra');
      $this->load->view('footer');
    }

    function insert() {
      $this->load->model('patrimonios_model');
	    $this->patrimonios_model->insert();

      $this->load->view('header');
      $this->load->view('head_logado');
      echo "<div class='alert alert-success fade in'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Patrimônio cadastrado com sucesso!</div>";

      $query = $this->patrimonios_model->select();

      $this->load->view('patrimonios', array('data'=>$query->result()));
      $this->load->view('footer');
    }
}
