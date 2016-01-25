<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Empreendimentos extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
      $this->load->view('header');
      $this->load->view('head_logado');
      $this->load->view('menu');

      $this->load->model('empreendimentos_model');
      $query = $this->empreendimentos_model->select();

      $this->load->view('empreendimentos', array('data'=>$query->result()));
      $this->load->view('footer');
    }

    function visualiza($id) {
      $this->load->view('header');
      $this->load->view('head_logado');
      $this->load->view('menu');

      $this->load->model('empreendimentos_model');
      $query = $this->empreendimentos_model->select($id);

      $query_weak_ps = $this->empreendimentos_model->select_weak_entities($id,'ps');
      $query_weak_ct = $this->empreendimentos_model->select_weak_entities($id,'ct');

      $this->load->view('empreendimentos_visualiza', array('data'=>$query->result(),'weak_data_ps'=>$query_weak_ps->result(), 'weak_data_ct'=>$query_weak_ct->result()));
      $this->load->view('footer');
    }

    function cadastra() {
      $this->load->view('header');
      $this->load->view('head_logado');
      $this->load->view('menu');
      $this->load->view('empreendimentos_cadastra');
      $this->load->view('footer');
    }

    function insert() {
      $this->load->model('empreendimentos_model');
	    $this->empreendimentos_model->insert();

      $this->load->view('header');
      $this->load->view('head_logado');
      echo "<div class='alert alert-success fade in'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Empreendimento cadastrado com sucesso!</div>";
      $this->load->view('menu');

      $this->load->model('usuarios_model');
      $query = $this->usuarios_model->select();

      $this->load->view('usuarios', array('data'=>$query->result()));
      $this->load->view('footer');
    }
}
