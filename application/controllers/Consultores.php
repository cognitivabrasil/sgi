<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Consultores extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
      $this->load->model('usuarios_model');
      $this->usuarios_model->verifica_login();

      $this->load->model('incubadoras_model');
      $incubadora = $this->incubadoras_model->select(ID_INCUBADORA);

      $this->load->view('header');
      $this->load->view('head_logado', array('titulo'=>$incubadora[0]->titulo));

      $this->load->model('consultores_model');
      $query = $this->consultores_model->select();
      $return = array();
      foreach ($query->result() as $row) {
        $horas = number_format($row->minutos_disponiveis/60 ,0);
        $minutos = str_pad($row->minutos_disponiveis%60,2,'0', STR_PAD_LEFT);
        $row->minutos_disponiveis = $horas.":".$minutos;
        array_push($return, $row);
      }

      $this->load->view('consultores', array('data'=>$return));
      $this->load->view('footer');
    }

    function visualiza($id) {
      $this->load->model('usuarios_model');
      $this->usuarios_model->verifica_login();

      $this->load->model('incubadoras_model');
      $incubadora = $this->incubadoras_model->select(ID_INCUBADORA);

      $this->load->view('header');
      $this->load->view('head_logado', array('titulo'=>$incubadora[0]->titulo));

      $this->load->model('consultores_model');
      $query = $this->consultores_model->select($id);
      $data = $query->result()[0];

      $horas = number_format($data->minutos_totais/60,0);
      $minutos = str_pad($data->minutos_totais%60,2,'0', STR_PAD_LEFT);
      $data->minutos_totais = $horas.":".$minutos;

      $horas = number_format($data->minutos_disponiveis/60,0);
      $minutos = str_pad($data->minutos_disponiveis%60,2,'0', STR_PAD_LEFT);
      $data->minutos_disponiveis = $horas.":".$minutos;

      $this->load->view('consultores_visualiza', array('data'=>$data));
      $this->load->view('footer');
    }

    function cadastra() {
      $this->load->model('usuarios_model');
      $this->usuarios_model->verifica_login();

      $this->load->model('incubadoras_model');
      $incubadora = $this->incubadoras_model->select(ID_INCUBADORA);

      $this->load->view('header');
      $this->load->view('head_logado', array('titulo'=>$incubadora[0]->titulo));

      $this->load->view('consultores_cadastra');
      $this->load->view('footer');
    }

    function edita($id) {
      $this->load->model('usuarios_model');
      $this->usuarios_model->verifica_login();

      $this->load->model('incubadoras_model');
      $incubadora = $this->incubadoras_model->select(ID_INCUBADORA);

      $this->load->view('header');
      $this->load->view('head_logado', array('titulo'=>$incubadora[0]->titulo));

      $this->load->model('consultores_model');
      $query = $this->consultores_model->selectByID($id);
      $data = $query->result()[0];
      $horas = number_format($data->minutos_totais/60,0);
      $minutos = str_pad($data->minutos_totais%60,2,'0', STR_PAD_LEFT);
      $data->minutos_totais = $horas.":".$minutos;

      $horas_ds = number_format($data->minutos_disponiveis/60,0);
      $minutos_ds = str_pad($data->minutos_disponiveis%60,2,'0', STR_PAD_LEFT);
      $data->minutos_disponiveis = $horas_ds.":".$minutos_ds;

      $this->load->view('consultores_edita', array('data'=>$data));
      $this->load->view('footer');
    }


    function horas() {
      $this->load->model('usuarios_model');
      $this->usuarios_model->verifica_login();

      $this->load->model('incubadoras_model');
      $incubadora = $this->incubadoras_model->select(ID_INCUBADORA);

      $this->load->view('header');
      $this->load->view('head_logado', array('titulo'=>$incubadora[0]->titulo));

      $this->load->view('consultores_inserehora');
      $this->load->view('footer');
    }

    function insert() {
      $this->load->model('usuarios_model');
      $this->usuarios_model->verifica_login();

      $this->load->model('consultores_model');
	    $this->consultores_model->insert();

      $this->load->model('incubadoras_model');
      $incubadora = $this->incubadoras_model->select(ID_INCUBADORA);

      $this->load->view('header');
      $this->load->view('head_logado', array('titulo'=>$incubadora[0]->titulo));
      echo "<div class='alert alert-success fade in'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Consultor cadastrado com sucesso!</div>";

      $this->load->model('consultores_model');
      $query = $this->consultores_model->select();
      $return = array();
      foreach ($query->result() as $row) {
        $horas = $row->minutos_disponiveis/60;
        $minutos = str_pad($row->minutos_disponiveis%60 , 2,'0', STR_PAD_LEFT);
        $row->minutos_disponiveis = $horas.":".$minutos;
        array_push($return, $row);
      }

      $this->load->view('consultores', array('data'=>$return));
      $this->load->view('footer');
    }

    function save() {
      $this->load->model('usuarios_model');
      $this->usuarios_model->verifica_login();

      $this->load->model('consultores_model');
	    $this->consultores_model->save();

      $this->load->model('incubadoras_model');
      $incubadora = $this->incubadoras_model->select(ID_INCUBADORA);

      $this->load->view('header');
      $this->load->view('head_logado', array('titulo'=>$incubadora[0]->titulo));
      echo "<div class='alert alert-success fade in'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Consultor salvo com sucesso!</div>";

      $this->load->model('consultores_model');
      $query = $this->consultores_model->select($id=0);

      $this->load->view('consultores', array('data'=>$query->result()));
      $this->load->view('footer');
    }


    function remove($id) {
      $this->load->model('consultores_model');
      echo $this->consultores_model->remove($id);
    }

    function visualiza_relatorios($id) {
      $this->load->model('usuarios_model');
      $this->usuarios_model->verifica_login();

      $this->load->view('header');
      $this->load->view('head_logado');

      $this->load->model('consultores_model');
      $query = $this->consultores_model->select_consultorias($id);

      $this->load->view('consultores_relatorios', array('data'=>$query->result()));
      $this->load->view('footer');
    }

}
