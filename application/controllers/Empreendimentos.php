<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Empreendimentos extends CI_Controller {

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

      $this->load->view('empreendimentos', array('data'=>$query->result()));
      $this->load->view('footer');
    }

    function visualiza($id) {
      $this->load->model('usuarios_model');
      $this->usuarios_model->verifica_login();

      $this->load->view('header');
      $this->load->view('head_logado');

      $this->load->model('empreendimentos_model');
      $query = $this->empreendimentos_model->select($id);

      $query_weak_ps = $this->empreendimentos_model->select_weak_entities($id,'ps');
      $query_weak_ct = $this->empreendimentos_model->select_weak_entities($id,'ct');

      $this->load->view('empreendimentos_visualiza', array('data'=>$query->result(),'weak_data_ps'=>$query_weak_ps->result(), 'weak_data_ct'=>$query_weak_ct->result()));
      $this->load->view('footer');
    }

    function cadastra() {
      $this->load->model('usuarios_model');
      $this->usuarios_model->verifica_login();

      $this->load->view('header');
      $this->load->view('head_logado');
      $this->load->view('empreendimentos_cadastra');
      $this->load->view('footer');
    }

    function edita($id) {
      $this->load->model('usuarios_model');
      $this->usuarios_model->verifica_login();

      $this->load->view('header');
      $this->load->view('head_logado');

      $this->load->model('empreendimentos_model');
      $query = $this->empreendimentos_model->select($id);

      $query_weak_ps = $this->empreendimentos_model->select_weak_entities($id,'ps');
      $query_weak_ct = $this->empreendimentos_model->select_weak_entities($id,'ct');

      $this->load->view('empreendimentos_edita', array('data'=>$query->result()[0],'weak_data_ps'=>$query_weak_ps->result(), 'weak_data_ct'=>$query_weak_ct->result()));
      $this->load->view('footer');
    }

    function insert() {
      $this->load->model('usuarios_model');
      $this->usuarios_model->verifica_login();

      $this->load->model('empreendimentos_model');
	    $this->empreendimentos_model->insert();

      $this->load->view('header');
      $this->load->view('head_logado');
      echo "<div class='alert alert-success fade in'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Empreendimento cadastrado com sucesso!</div>";

      $this->load->model('empreendimentos_model');
      $query = $this->empreendimentos_model->select();

      $this->load->view('empreendimentos', array('data'=>$query->result()));
      $this->load->view('footer');
    }

    function save() {
      $this->load->model('usuarios_model');
      $this->usuarios_model->verifica_login();

      $this->load->model('empreendimentos_model');
	    $this->empreendimentos_model->save();

      $this->load->view('header');
      $this->load->view('head_logado');
      echo "<div class='alert alert-success fade in'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Empreendimento editado com sucesso!</div>";

      $this->load->model('empreendimentos_model');
      $query = $this->empreendimentos_model->select();

      $this->load->view('empreendimentos', array('data'=>$query->result()));
      $this->load->view('footer');
    }

    function download($id,$tipo) {
      $this->load->model('usuarios_model');
      $this->usuarios_model->verifica_login();
      
      $this->load->model('empreendimentos_model');
      switch($tipo){
        case 'canvas':
          $query = $this->empreendimentos_model->select($id);
          $path=$query->result()[0]->canvas;
          break;
        case 'logo':
          $query = $this->empreendimentos_model->select($id);
          $path= $query->result()[0]->logo;
          break;
        case 'ct':
          $query = $this->empreendimentos_model->select_weak_entities_by_id($id,'ct');
          $path=$query->result()[0]->contrato;
          break;
      }
      force_download($path,NULL);
    }
}
