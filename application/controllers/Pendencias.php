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

      $this->load->model('pendencias_model');
      $query = $this->pendencias_model->select();

      $dados = $query->result();
      $count=0;
      foreach ($dados as $row) {
        $queryEmp = $this->pendencias_model->selectEmpreendimento($row->id_usuario);
        $dados[$count]->nome_empresa = $queryEmp->result()[0]->nome_fantasia;
        $count++;
      }

      $this->load->view('pendencias', array('data'=>$dados));
      $this->load->view('footer');
    }

    function cadastra() {
      $this->load->view('header');
      $this->load->view('head_logado');
      $this->load->view('pendencias_cadastra');
      $this->load->view('footer');
    }

    function visualiza($id) {
      $this->load->view('header');
      $this->load->view('head_logado');

      $this->load->model('pendencias_model');
      $query = $this->pendencias_model->select($id);

      $dados = $query->result()[0];

      $queryEmp = $this->pendencias_model->selectEmpreendimento($dados->id_usuario);
      $dados->nome_empresa = $queryEmp->result()[0]->nome_fantasia;

      $this->load->view('pendencias_visualiza', array('data'=>$dados));
      $this->load->view('footer');
    }

    function edita($id) {
      $this->load->view('header');
      $this->load->view('head_logado');

      $this->load->model('pendencias_model');
      $query = $this->pendencias_model->select($id);

      $dados = $query->result()[0];

      $queryEmp = $this->pendencias_model->selectEmpreendimento($dados->id_usuario);
      $dados->nome_empresa = $queryEmp->result()[0]->nome_fantasia;

      $this->load->view('pendencias_edita', array('data'=>$dados));
      $this->load->view('footer');
    }

    function save() {
      $this->load->model('pendencias_model');
      $this->pendencias_model->save();

      $this->load->view('header');
      $this->load->view('head_logado');
      echo "<div class='alert alert-success fade in'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Requisição editada com sucesso!</div>";

      $this->load->model('pendencias_model');
      $query = $this->pendencias_model->select();

      $dados = $query->result();
      $count=0;
      foreach ($dados as $row) {
        $queryEmp = $this->pendencias_model->selectEmpreendimento($row->id_usuario);
        $dados[$count]->nome_empresa = $queryEmp->result()[0]->nome_fantasia;
        $count++;
      }

      $this->load->view('pendencias', array('data'=>$dados));
      $this->load->view('footer');

    }

    function insert() {
      $this->load->model('pendencias_model');
	    $this->pendencias_model->insert();

      $this->load->view('header');
      $this->load->view('head_logado');
      echo "<div class='alert alert-success fade in'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Requisição cadastrada com sucesso!</div>";

      $this->load->model('pendencias_model');
      $query = $this->pendencias_model->select();

      $dados = $query->result();
      $count=0;
      foreach ($dados as $row) {
        $queryEmp = $this->pendencias_model->selectEmpreendimento($row->id_usuario);
        $dados[$count]->nome_empresa = $queryEmp->result()[0]->nome_fantasia;
        $count++;
      }

      $this->load->view('pendencias', array('data'=>$dados));
      $this->load->view('footer');

    }
}
