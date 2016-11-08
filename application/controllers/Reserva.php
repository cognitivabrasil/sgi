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

    function verifica() {
      $this->load->model('usuarios_model');
      $this->usuarios_model->verifica_login();
      
      $this->load->view('header');
      $this->load->view('head_logado');

      $this->load->model('reserva_model');
      $query = $this->reserva_model->verificaReserva();

      $this->load->view('reserva_verifica', array('data'=>$query));

      $this->load->view('footer');

    }

}
