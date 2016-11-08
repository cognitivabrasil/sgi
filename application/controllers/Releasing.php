<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Releasing extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
      $this->load->model('usuarios_model');
      $this->usuarios_model->verifica_login();

      $this->load->view('header');
      $this->load->view('head_logado');

      $this->load->model('releasing_model');
      $query = $this->releasing_model->select();
      $dados = $query->result();
      $this->load->model('empreendimentos_model');
      $count=0;
      foreach ($dados as $releasing) {
        $dados[$count]->nome_empreendimento = "Sem vínculo";

        //Inserindo empreendimento
        if($releasing->id_empreendimento==1){
          $dados[$count]->nome_empreendimento = "CEI";
        }elseif($releasing->id_empreendimento!=0){
          $queryEmpr = $this->empreendimentos_model->select($releasing->id_empreendimento);
          $result = $queryEmpr->result();
          if(count($result)>0){
            $dados[$count]->nome_empreendimento = $result[0]->nome_fantasia;
          }
        }

        //arrumando path da imagem
        $aux = explode('uploads',$dados[$count]->anexo);
        $dados[$count]->anexo = "uploads".$aux[1];

        $count++;
      }

      $this->load->view('releasing', array('data'=>$dados));
      $this->load->view('footer');
    }

    function lista($id) {
      $this->load->model('usuarios_model');
      $this->usuarios_model->verifica_login();

      $this->load->view('header');
      $this->load->view('head_logado');

      $this->load->model('releasing_model');
      $query = $this->releasing_model->selectByID($id);
      $dados = $query->result();
      $this->load->model('empreendimentos_model');
      $dados[0]->nome_empreendimento = "Sem vínculo";

      //Inserindo empreendimento
      if($dados[0]->id_empreendimento==1){
        $dados[0]->nome_empreendimento = "CEI";
      }elseif($dados[0]->id_empreendimento!=0){
        $queryEmpr = $this->empreendimentos_model->select($dados[0]->id_empreendimento);
        $result = $queryEmpr->result();
        if(count($result)>0){
          $dados[0]->nome_empreendimento = $result[0]->nome_fantasia;
        }
      }

      //arrumando path da imagem
      $aux = explode('uploads',$dados[0]->anexo);
      $dados[0]->anexo = "uploads".$aux[1];

      $this->load->view('releasing_visualiza', array('data'=>$dados[0]));
      $this->load->view('footer');
    }

    function edita($id) {
      $this->load->model('usuarios_model');
      $this->usuarios_model->verifica_login();

      $this->load->view('header');
      $this->load->view('head_logado');

      $this->load->model('releasing_model');
      $query = $this->releasing_model->selectByID($id);
      $dados = $query->result();
      $this->load->model('empreendimentos_model');
      $dados[0]->nome_empreendimento = "Sem vínculo";

      //Inserindo empreendimento
      if($dados[0]->id_empreendimento==1){
        $dados[0]->nome_empreendimento = "CEI";
      }elseif($dados[0]->id_empreendimento!=0){
        $queryEmpr = $this->empreendimentos_model->select($dados[0]->id_empreendimento);
        $result = $queryEmpr->result();
        if(count($result)>0){
          $dados[0]->nome_empreendimento = $result[0]->nome_fantasia;
        }
      }

      $this->load->model('empreendimentos_model');
      $queryEmp = $this->empreendimentos_model->select();

      //arrumando path da imagem
      $dados[0]->img_inicial = $dados[0]->anexo;
      $aux = explode('uploads',$dados[0]->anexo);
      $dados[0]->anexo = "uploads".$aux[1];

      $this->load->view('releasing_edita', array('data'=>$dados[0], 'empresas'=>$queryEmp->result()));
      $this->load->view('footer');
    }

    function cadastra() {
      $this->load->model('usuarios_model');
      $this->usuarios_model->verifica_login();

      $this->load->view('header');
      $this->load->view('head_logado');

      $this->load->model('empreendimentos_model');
      $query = $this->empreendimentos_model->select();

      $this->load->view('releasing_cadastra', array('empresas'=>$query->result()));
      $this->load->view('footer');
    }

    function insert() {
      $this->load->model('usuarios_model');
      $this->usuarios_model->verifica_login();

      $this->load->model('releasing_model');
	    $this->releasing_model->insert();

      $this->load->view('header');
      $this->load->view('head_logado');
      echo "<div class='alert alert-success fade in'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Releasing inserido com sucesso!</div>";

      $query = $this->releasing_model->select();

      $dados = $query->result();
      $this->load->model('empreendimentos_model');
      $count=0;
      foreach ($dados as $releasing) {
        $dados[$count]->nome_empreendimento = "Sem vínculo";

        if($releasing->id_empreendimento==1){
          $dados[$count]->nome_empreendimento = "CEI";
        }elseif($releasing->id_empreendimento!=0){
          $queryEmpr = $this->empreendimentos_model->select($releasing->id_empreendimento);
          $result = $queryEmpr->result();
          if(count($result)>0){
            $dados[$count]->nome_empreendimento = $result[0]->nome_fantasia;
          }
        }
        $count++;

        //arrumando path da imagem
        $aux = explode('uploads',$dados[$count]->anexo);
        $dados[$count]->anexo = "uploads".$aux[1];

      }

      $this->load->view('releasing', array('data'=>$dados));
      $this->load->view('footer');
    }

    function save() {
      $this->load->model('usuarios_model');
      $this->usuarios_model->verifica_login();
      
      $this->load->model('releasing_model');
	    $this->releasing_model->save();

      $this->load->view('header');
      $this->load->view('head_logado');
      echo "<div class='alert alert-success fade in'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Releasing editado com sucesso!</div>";

      $query = $this->releasing_model->select();

      $dados = $query->result();
      $this->load->model('empreendimentos_model');
      $count=0;
      foreach ($dados as $releasing) {
        $dados[$count]->nome_empreendimento = "Sem vínculo";

        if($releasing->id_empreendimento==1){
          $dados[$count]->nome_empreendimento = "CEI";
        }elseif($releasing->id_empreendimento!=0){
          $queryEmpr = $this->empreendimentos_model->select($releasing->id_empreendimento);
          $result = $queryEmpr->result();
          if(count($result)>0){
            $dados[$count]->nome_empreendimento = $result[0]->nome_fantasia;
          }
        }
        $count++;

        //arrumando path da imagem
        $aux = explode('uploads',$dados[$count]->anexo);
        $dados[$count]->anexo = "uploads".$aux[1];

      }

      $this->load->view('releasing', array('data'=>$dados));
      $this->load->view('footer');
    }
}
