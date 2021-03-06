<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Reserva extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
      $this->load->model('usuarios_model');
      $this->usuarios_model->verifica_login();

      $this->load->view('header');
      $this->load->view('head_logado');
      $this->load->view('reserva');
      $this->load->view('footer');

    }

    function sala_ajax() {

      $this->load->model('reserva_model');
      $query = $this->reserva_model->selectSala();

      $this->load->view('sala_ajax', array('data'=>$query->result()[0]));
    }

    function efetua_reserva() {
      $this->load->model('usuarios_model');
      $this->usuarios_model->verifica_login();

      $this->load->model('reserva_model');
      $query = $this->reserva_model->efetuaReserva();

      if($query){
        $this->load->view('success');
      }else{
        $this->load->view('error');
      }
      $this->load->view('header');
      $this->load->view('head_logado');
      $this->load->view('reserva');
      $this->load->view('footer');

    }

    function efetua_reserva_semana() {

      $this->load->model('usuarios_model');
      $this->usuarios_model->verifica_login();

      $semana = $_POST['semana'];

      $this->load->model('reserva_model');
      $query = $this->reserva_model->efetuaReserva();

      if($query){
        $this->load->view('success');
      }else{
        $this->load->view('error');
      }

      $this->load->view('header');
      $this->load->view('head_logado');

      $query = $this->reserva_model->verificaReserva($semana);

      $proxima_semana = $semana+1;
      $semana_anterior = $semana-1;
      $atual = $query['from']." - ".$query['to'];

      $this->load->view('reserva_verifica', array('data'=>$query['data'],'proxima_semana'=>$proxima_semana,'semana_anterior'=>$semana_anterior,'atual'=>$atual,'semana_full'=>$query['semana_full']));

      $this->load->view('footer');

    }

    function verifica($semana=0) {
      $this->load->model('usuarios_model');
      $this->usuarios_model->verifica_login();

      $this->load->view('header');
      $this->load->view('head_logado');

      $this->load->model('reserva_model');
      $query = $this->reserva_model->verificaReserva($semana);

      $proxima_semana = $semana+1;
      $semana_anterior = $semana-1;
      $atual = $query['from']." - ".$query['to'];

      $this->load->view('reserva_verifica', array('data'=>$query['data'],'proxima_semana'=>$proxima_semana,'semana_anterior'=>$semana_anterior,'atual'=>$atual,'semana_full'=>$query['semana_full']));

      $this->load->view('footer');

    }

    function remove($id) {
      $this->load->model('reserva_model');
      echo $this->reserva_model->remove_locacao($id);
    }

    function getSalasReservaveis(){

      header('Access-Control-Allow-Origin: *');

      $this->load->model('salas_model');

      $query = $this->salas_model->selectSalasDisponiveis();

      echo json_encode($query->result());

    }

    function getReservas(){

      header('Access-Control-Allow-Origin: *');

      $this->load->model('reserva_model');
      $query = $this->reserva_model->verificaReserva(0);

      echo json_encode($query['data']);

    }

}
