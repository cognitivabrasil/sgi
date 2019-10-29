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
      $query_weak_sl = $this->empreendimentos_model->select_weak_entities($id,'sl');

      $this->load->view('empreendimentos_visualiza', array('data'=>$query->result(),'weak_data_ps'=>$query_weak_ps->result(), 'weak_data_ct'=>$query_weak_ct->result(), 'weak_data_sl'=>$query_weak_sl->result()));
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
      $query_weak_pr = $this->empreendimentos_model->select_weak_entities($id,'pr');

      $this->load->model('projetos_model');
      $query_projetos = $this->projetos_model->select();
      $id_pr = 0;
      if(isset($query_weak_pr->result()[0])){
        $id_pr=$query_weak_pr->result()[0]->id;
      }

      $this->load->view('empreendimentos_edita', array('data'=>$query->result()[0],'weak_data_ps'=>$query_weak_ps->result(), 'weak_data_ct'=>$query_weak_ct->result(), 'weak_data_pr'=>$id_pr,'all_projects'=>$query_projetos->result()));
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

    function remove($id) {
      $this->load->model('empreendimentos_model');
      echo $this->empreendimentos_model->remove($id);
    }

    function aloca($id) {
      $this->load->model('usuarios_model');
      $this->usuarios_model->verifica_login();

      $this->load->view('header');
      $this->load->view('head_logado');

      $this->load->model('empreendimentos_model');
      $query = $this->empreendimentos_model->select($id);

      $this->load->model('salas_model');
      $querySalas = $this->salas_model->selectSalaNaoAlocada($id);

      $dados = $query->result()[0];

      $this->load->view('empreendimentos_atribui_sala', array('data'=>$dados, 'salas'=>$querySalas));
      $this->load->view('footer');
    }

    function remove_sala($id_sala,$id) {
      $this->load->model('usuarios_model');
      $this->usuarios_model->verifica_login();

      $this->load->view('header');
      $this->load->view('head_logado');

      $this->load->model('empreendimentos_model');
      $query = $this->empreendimentos_model->select($id);

      //Remove a sala
      $this->empreendimentos_model->remove_sala($id_sala,$id);

      $query_weak_ps = $this->empreendimentos_model->select_weak_entities($id,'ps');
      $query_weak_ct = $this->empreendimentos_model->select_weak_entities($id,'ct');
      $query_weak_sl = $this->empreendimentos_model->select_weak_entities($id,'sl');

      $this->load->view('empreendimentos_visualiza', array('data'=>$query->result(),'weak_data_ps'=>$query_weak_ps->result(), 'weak_data_ct'=>$query_weak_ct->result(), 'weak_data_sl'=>$query_weak_sl->result()));
      $this->load->view('footer');
    }

    function atribuicao_sala($id) {
      $this->load->model('usuarios_model');
      $this->usuarios_model->verifica_login();

      $this->load->view('header');
      $this->load->view('head_logado');

      $this->load->model('empreendimentos_model');
      $query = $this->empreendimentos_model->select($id);

      //Alocando a sala
      $this->empreendimentos_model->aloca_sala();

      $query_weak_ps = $this->empreendimentos_model->select_weak_entities($id,'ps');
      $query_weak_ct = $this->empreendimentos_model->select_weak_entities($id,'ct');
      $query_weak_sl = $this->empreendimentos_model->select_weak_entities($id,'sl');

      $this->load->view('empreendimentos_visualiza', array('data'=>$query->result(),'weak_data_ps'=>$query_weak_ps->result(), 'weak_data_ct'=>$query_weak_ct->result(), 'weak_data_sl'=>$query_weak_sl->result()));
      $this->load->view('footer');
    }

    function getEmpreendimentos() {

      header('Access-Control-Allow-Origin: *');

      $this->load->model('empreendimentos_model');
      $query = $this->empreendimentos_model->select();

      echo json_encode($query->result());
    }

}
