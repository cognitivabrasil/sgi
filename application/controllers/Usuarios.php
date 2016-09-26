<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Usuarios extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
      $this->load->view('header');
      $this->load->view('head_logado');

      $this->load->model('usuarios_model');
      $query = $this->usuarios_model->select();

      $dados = $query->result();
      $this->load->model('empreendimentos_model');
      $count=0;
      foreach ($dados as $user) {
        $dados[$count]->nome_empreendimento = "Sem vínculo";

        if($user->id_empreendimento==1){
          $dados[$count]->nome_empreendimento = "CEI";
        }elseif($user->id_empreendimento!=0){
          $queryEmpr = $this->empreendimentos_model->select($user->id_empreendimento);
          $result = $queryEmpr->result();
          if(count($result)>0){
            $dados[$count]->nome_empreendimento = $result[0]->nome_fantasia;
          }
        }
        $count++;
      }

      $this->load->view('usuarios', array('data'=>$dados,'id_logado'=>$this->session->userdata('id_usuario')));
      $this->load->view('footer');
    }

    function alterasenhafinal(){

      $this->load->view('header');
      $this->load->view('head_logado');

      if(isset($_POST)){
        $this->load->model('usuarios_model');
        $query = $this->usuarios_model->validatepasswd();
        if(count($query)>0){
          $queryinput = $this->usuarios_model->changepasswd();
          echo "<div class='alert alert-success fade in'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Senha alterada com sucesso!</div>";
        }else{
          echo "<div class='alert alert-danger fade in'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Senha antiga errada!</div>";
        }
      }

      $this->load->model('usuarios_model');
      $query = $this->usuarios_model->select();

      $this->load->view('usuarios', array('data'=>$query->result(),'id_logado'=>$this->session->userdata('id_usuario')));

      $this->load->view('footer');

    }

    function alterasenha($id) {

      $this->load->view('header');
      $this->load->view('head_logado');

      $this->load->model('usuarios_model');
      $query = $this->usuarios_model->selectByID($id);

      $this->load->view('usuarios_alterasenha', array('data'=>$query->result()));
      $this->load->view('footer');
    }

    function cadastra() {
      $this->load->view('header');
      $this->load->view('head_logado');

      $this->load->model('empreendimentos_model');
      $query = $this->empreendimentos_model->select();

      $this->load->view('usuarios_cadastra', array('empresas'=>$query->result()));
      $this->load->view('footer');
    }

    function insert() {
      $this->load->model('usuarios_model');
	    $this->usuarios_model->insert();

      $this->load->view('header');
      $this->load->view('head_logado');
      echo "<div class='alert alert-success fade in'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Usuário cadastrado com sucesso!</div>";

      $this->load->model('usuarios_model');
      $query = $this->usuarios_model->select();

      $this->load->view('usuarios', array('data'=>$query->result()));
      $this->load->view('footer');
    }
}
