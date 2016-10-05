<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Salas extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
      $this->load->view('header');
      $this->load->view('head_logado');

      $this->load->model('salas_model');
      $query = $this->salas_model->select();

      $this->load->view('salas', array('data'=>$query->result()));
      $this->load->view('footer');
    }

    function visualiza($id) {
      $this->load->view('header');
      $this->load->view('head_logado');

      $this->load->model('salas_model');
      $query = $this->salas_model->selectByID($id);

      $this->load->view('salas_visualiza', array('data'=>$query->result()[0]));
      $this->load->view('footer');
    }

    function cadastra() {
      $this->load->view('header');
      $this->load->view('head_logado');
      $this->load->view('salas_cadastra');
      $this->load->view('footer');
    }

    function insert() {
      $this->load->model('salas_model');
	    $this->salas_model->insert();

      $this->load->view('header');
      $this->load->view('head_logado');
      echo "<div class='alert alert-success fade in'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Sala cadastrada com sucesso!</div>";

      $query = $this->salas_model->select();

      $this->load->view('salas', array('data'=>$query->result()));
      $this->load->view('footer');
    }

    function edita($id) {
      $this->load->view('header');
      $this->load->view('head_logado');

      $this->load->model('salas_model');
      $query = $this->salas_model->selectByID($id);

      $this->load->view('salas_edita', array('data'=>$query->result()[0]));
      $this->load->view('footer');
    }

    function save() {
      $this->load->model('salas_model');
	    $this->salas_model->save();

      $this->load->view('header');
      $this->load->view('head_logado');
      echo "<div class='alert alert-success fade in'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Sala editada com sucesso!</div>";

      $query = $this->salas_model->select();

      $this->load->view('salas', array('data'=>$query->result()));
      $this->load->view('footer');
    }
}
