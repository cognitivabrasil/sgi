<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Inicial extends CI_Controller {

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

      $this->load->model('usuarios_model');
      $query = $this->usuarios_model->selectBySession();

      if($incubadora[0]->id == 1){
        $this->load->view('inicial_view', array('data'=>$query->result()[0]->nome));
        $this->load->view('footer');
      }else{
        $this->load->model('reserva_model');
        $query = $this->reserva_model->verificaReserva(0);

        $proxima_semana = $semana+1;
        $semana_anterior = $semana-1;
        $atual = $query['from']." - ".$query['to'];

        $this->load->view('reserva_verifica', array('data'=>$query['data'],'proxima_semana'=>$proxima_semana,'semana_anterior'=>$semana_anterior,'atual'=>$atual,'semana_full'=>$query['semana_full']));

        $this->load->view('footer');
      }


    }
}
