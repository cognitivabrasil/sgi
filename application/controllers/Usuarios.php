<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Usuarios extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    function vpass($pass)
    {
      $pass = urldecode($pass);
      $len = strlen($pass);
      $count = 0;
      $array = array("/[a-z]/", "/[A-Z]/", "/[0-9]/", "/[\.\,\!\#\_\-\@\*\&\$\%\(\)\{\}\[\]\:\<\>]/");

      foreach($array as $a)
      {
      	if(preg_match($a, $pass))
      	{
      		$count++;
      	}
      }

      if($len >= 8){
      	$count++;
      }

      echo $count;
      return $count;
    }

    function index() {
      $this->load->model('usuarios_model');
      $this->usuarios_model->verifica_login();

      $this->load->view('header');
      $this->load->view('head_logado');

      $this->load->model('usuarios_model');
      $query = $this->usuarios_model->select_group();

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
            $dados[$count]->nome_empreendimento = $result[0]->nome;
          }
        }
        $count++;
      }

      $this->load->view('usuarios', array('data'=>$dados,'id_logado'=>$this->session->userdata('id_usuario')));
      $this->load->view('footer');
    }

    function alterasenhafinal($cp='none'){
      $this->load->model('usuarios_model');
      $this->usuarios_model->verifica_login();

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
          if($cp!='none'){
            redirect('/index.php/usuarios/alterasenhacompulsivo/'.$cp.'/err', 'location');
          }
        }
      }

      $this->load->model('usuarios_model');
      $query = $this->usuarios_model->select_group();

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
            $dados[$count]->nome_empreendimento = $result[0]->nome;
          }
        }
        $count++;
      }

      $this->load->view('usuarios', array('data'=>$dados,'id_logado'=>$this->session->userdata('id_usuario')));

      $this->load->view('footer');

    }

    function alterasenha($id) {
      $this->load->model('usuarios_model');
      $this->usuarios_model->verifica_login();

      $this->load->view('header');
      $this->load->view('head_logado');

      $this->load->model('usuarios_model');
      $query = $this->usuarios_model->selectByID($id);

      $this->load->view('usuarios_alterasenha', array('data'=>$query->result()));
      $this->load->view('footer');
    }

    function alteraduracaofinal(){
      $this->load->model('usuarios_model');
      $this->usuarios_model->verifica_login();

      $this->load->view('header');
      $this->load->view('head_logado');

      $queryinput = $this->usuarios_model->changeduracao();
      echo "<div class='alert alert-success fade in'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Duração do usuário alterada com sucesso!</div>";

      $this->load->model('usuarios_model');
      $query = $this->usuarios_model->select_group();

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
            $dados[$count]->nome_empreendimento = $result[0]->nome;
          }
        }
        $count++;
      }

      $this->load->view('usuarios', array('data'=>$dados,'id_logado'=>$this->session->userdata('id_usuario')));

      $this->load->view('footer');

    }

    function alteraduracao($id) {
      $this->load->model('usuarios_model');
      $this->usuarios_model->verifica_login();

      $this->load->view('header');
      $this->load->view('head_logado');

      $this->load->model('usuarios_model');
      $query = $this->usuarios_model->selectByID($id);

      $this->load->view('usuarios_alteraduracao', array('data'=>$query->result()));
      $this->load->view('footer');
    }

    function alterasenhacompulsivo($id,$err='none') {
      $this->load->model('usuarios_model');
      $this->usuarios_model->verifica_login();

      $this->load->view('header');
      if($err!='none'){
        echo "<div class='alert alert-danger fade in'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Senha antiga errada!</div>";
      }

      $this->load->model('usuarios_model');
      $query = $this->usuarios_model->selectByID($id);

      $this->load->view('usuarios_alterasenhacompulsivo', array('data'=>$query->result()));
      $this->load->view('footer');
    }

    function restaurasenha() {
      $this->load->model('usuarios_model');
      $this->usuarios_model->restaurasenha();
    }

    function cadastra() {
      $this->load->model('usuarios_model');
      $this->usuarios_model->verifica_login();

      $this->load->view('header');
      $this->load->view('head_logado');

      $this->load->model('empreendimentos_model');
      $query = $this->empreendimentos_model->select();

      $this->load->view('usuarios_cadastra', array('empresas'=>$query->result()));
      $this->load->view('footer');
    }

    function insert() {
      $this->load->model('usuarios_model');
      $this->usuarios_model->verifica_login();

      $this->load->model('usuarios_model');
	    $this->usuarios_model->insert();

      $this->load->view('header');
      $this->load->view('head_logado');
      echo "<div class='alert alert-success fade in'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Usuário cadastrado com sucesso!</div>";

      $this->load->model('usuarios_model');
      $query = $this->usuarios_model->select_group();
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
            $dados[$count]->nome_empreendimento = $result[0]->nome;
          }
        }
        $count++;
      }

      $this->load->view('usuarios', array('data'=>$dados,'id_logado'=>$this->session->userdata('id_usuario')));
      $this->load->view('footer');
    }

    function remove($id) {
      $this->load->model('usuarios_model');
      echo $this->usuarios_model->remove($id);
    }
}
