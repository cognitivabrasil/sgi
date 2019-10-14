<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Relatorios extends CI_Controller {

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

      $this->load->view('relatorios', array('data'=>$query->result()));
      $this->load->view('footer');
    }

    function lista($id) {
      $this->load->model('usuarios_model');
      $this->usuarios_model->verifica_login();

      $this->load->view('header');
      $this->load->view('head_logado');

      $this->load->model('relatorios_model');
      $query = $this->relatorios_model->lista($id);

      $this->load->view('relatorios_lista', array('data'=>$query->result()));
      $this->load->view('footer');
    }

    function visualiza_status($id) {
      $this->load->model('usuarios_model');
      $this->usuarios_model->verifica_login();

      $this->load->view('header');
      $this->load->view('head_logado');

      $this->load->model('relatorios_model');
      $query = $this->relatorios_model->selectStatus($id);

      $this->load->view('relatorios_visualiza_status', array('data'=>$query->result()));
      $this->load->view('footer');
    }

    function visualiza_servicos($id) {
      $this->load->model('usuarios_model');
      $this->usuarios_model->verifica_login();

      $this->load->view('header');
      $this->load->view('head_logado');

      $this->load->model('relatorios_model');
      $query = $this->relatorios_model->selectServicos($id);

      $this->load->view('relatorios_visualiza_servicos', array('data'=>$query->result()));
      $this->load->view('footer');
    }

    function visualiza_pendencia($id) {
      $this->load->model('usuarios_model');
      $this->usuarios_model->verifica_login();

      $this->load->view('header');
      $this->load->view('head_logado');

      $this->load->model('relatorios_model');
      $query = $this->relatorios_model->selectPendencia($id);

      $this->load->view('relatorios_visualiza_pendencia', array('data'=>$query->result()));
      $this->load->view('footer');
    }

}
