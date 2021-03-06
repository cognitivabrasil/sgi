<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pendencias extends CI_Controller {

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

      $this->load->model('pendencias_model');
      $query = $this->pendencias_model->select();

      $dados = $query->result();
      $count=0;
      foreach ($dados as $row) {
        $dados[$count]->nome_empresa = "Sem vínculo";
        $queryEmp = $this->pendencias_model->selectEmpreendimento();
        if(count($queryEmp->result())>0){
          if($queryEmp->result()[0]->nome == 'CEI'){
            $this->load->model('empreendimentos_model');
            $queryUserEmp = $this->empreendimentos_model->select($dados[$count]->empresa);
            $resultado = $queryUserEmp->result();
            if($resultado){
              $dados[$count]->nome_empresa =$resultado[0]->nome;
            }else{
              $dados[$count]->nome_empresa = "Empresa excluída";
            }
          }else{
            $dados[$count]->nome_empresa = $queryEmp->result()[0]->nome;
          }
        }

        $dados[$count]->situacao_final = $this->pendencias_model->verifica_resolvida($row->id);

        $count++;
      }
      if($this->session->userdata('notifica_requisicao')>0 && $this->session->userdata('id_acesso')==1){
          $this->pendencias_model->zeraUnread();
          $this->session->set_userdata('notifica_requisicao',0);
      }
      $this->load->view('pendencias', array('data'=>$dados));
      $this->load->view('footer');
    }

    function resolvidas() {
      $this->load->model('usuarios_model');
      $this->usuarios_model->verifica_login();

      $this->load->model('incubadoras_model');
      $incubadora = $this->incubadoras_model->select(ID_INCUBADORA);

      $this->load->view('header');
      $this->load->view('head_logado', array('titulo'=>$incubadora[0]->titulo));

      $this->load->model('pendencias_model');
      $query = $this->pendencias_model->select();

      $dados = $query->result();
      $count=0;
      foreach ($dados as $row) {
        $dados[$count]->nome_empresa = "Sem vínculo";
        $queryEmp = $this->pendencias_model->selectEmpreendimento();
        if(count($queryEmp->result())>0){
          if($queryEmp->result()[0]->nome == 'CEI'){
            $this->load->model('empreendimentos_model');
            $queryUserEmp = $this->empreendimentos_model->select($dados[$count]->empresa);
            $resultado = $queryUserEmp->result();
            if($resultado){
              $dados[$count]->nome_empresa =$resultado[0]->nome;
            }else{
              $dados[$count]->nome_empresa = "Empresa excluída";
            }
          }else{
            $dados[$count]->nome_empresa = $queryEmp->result()[0]->nome;
          }
        }

        $dados[$count]->situacao_final = $this->pendencias_model->verifica_resolvida($row->id);

        $count++;
      }
      if($this->session->userdata('notifica_requisicao')>0 && $this->session->userdata('id_acesso')==1){
          $this->pendencias_model->zeraUnread();
          $this->session->set_userdata('notifica_requisicao',0);
      }
      $this->load->view('pendencias_resolvidas', array('data'=>$dados));
      $this->load->view('footer');
    }

    function cadastra() {
      $this->load->model('usuarios_model');
      $this->usuarios_model->verifica_login();

      $this->load->model('incubadoras_model');
      $incubadora = $this->incubadoras_model->select(ID_INCUBADORA);

      $this->load->view('header');
      $this->load->view('head_logado', array('titulo'=>$incubadora[0]->titulo));

      $this->load->model('empreendimentos_model');
      $empQuery = $this->empreendimentos_model->select();

      $this->load->model('consultores_model');
      $dados = $this->consultores_model->selectDisponivel();

      $this->load->view('pendencias_cadastra', array('empresas'=>$empQuery->result(),'consultores'=>$dados->result()));
      $this->load->view('footer');
    }

    function visualiza($id) {
      $this->load->model('usuarios_model');
      $this->usuarios_model->verifica_login();

      $this->load->model('incubadoras_model');
      $incubadora = $this->incubadoras_model->select(ID_INCUBADORA);

      $this->load->view('header');
      $this->load->view('head_logado', array('titulo'=>$incubadora[0]->titulo));

      $this->load->model('pendencias_model');
      $query = $this->pendencias_model->select($id);

      $dados = $query->result()[0];

      $queryAtualizacoes = $this->pendencias_model->select_atualizacoes($id);

      $dadosAtualizacoes = $queryAtualizacoes->result();

      $queryConsultorias = $this->pendencias_model->select_consultorias($id);

      $dadosConsultorias = $queryConsultorias->result();

      $queryEmp = $this->pendencias_model->selectEmpreendimento();
      $dados->nome_empresa = 'Sem vínculo';
      if($queryEmp->result()){
        $dados->nome_empresa = $queryEmp->result()[0]->nome;
      }

      $this->load->view('pendencias_visualiza', array('data'=>$dados,'atualizacoes'=>$dadosAtualizacoes,'consultorias'=>$dadosConsultorias));
      $this->load->view('footer');
    }

    function edita($id) {
      $this->load->model('usuarios_model');
      $this->usuarios_model->verifica_login();

      $this->load->model('incubadoras_model');
      $incubadora = $this->incubadoras_model->select(ID_INCUBADORA);

      $this->load->view('header');
      $this->load->view('head_logado', array('titulo'=>$incubadora[0]->titulo));

      $this->load->model('pendencias_model');
      $query = $this->pendencias_model->select($id);

      $dados = $query->result()[0];

      $queryEmp = $this->pendencias_model->selectEmpreendimento($dados->id_usuario);
      $dados->nome_empresa = $queryEmp->result()[0]->nome_fantasia;

      $this->load->view('pendencias_edita', array('data'=>$dados));
      $this->load->view('footer');
    }

    function atualiza_status($id) {
      $this->load->model('usuarios_model');
      $this->usuarios_model->verifica_login();

      $this->load->model('incubadoras_model');
      $incubadora = $this->incubadoras_model->select(ID_INCUBADORA);

      $this->load->view('header');
      $this->load->view('head_logado', array('titulo'=>$incubadora[0]->titulo));

      $this->load->model('pendencias_model');
      $query = $this->pendencias_model->select($id);

      $this->load->model('consultores_model');
      $data = $this->consultores_model->selectDisponivel();

      $queryConsultorias = $this->pendencias_model->select_consultorias($id);
      $dadosConsultorias = $queryConsultorias->result();

      $dados = $query->result()[0];

      $queryEmp = $this->pendencias_model->selectEmpreendimento($dados->id_usuario);
      $dados->nome_empresa = $queryEmp->result()[0]->nome_fantasia;

      $this->load->view('pendencias_atualiza_status', array('data'=>$dados, 'consultores'=>$data->result(),'consultorias'=>$dadosConsultorias));
      $this->load->view('footer');
    }

    function save() {
      $this->load->model('usuarios_model');
      $this->usuarios_model->verifica_login();

      $this->load->model('pendencias_model');
      $this->pendencias_model->save();

      $this->load->model('incubadoras_model');
      $incubadora = $this->incubadoras_model->select(ID_INCUBADORA);

      $this->load->view('header');
      $this->load->view('head_logado', array('titulo'=>$incubadora[0]->titulo));
      echo "<div class='alert alert-success fade in'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Requisição editada com sucesso!</div>";

      $this->load->model('pendencias_model');
      $query = $this->pendencias_model->select();

      $dados = $query->result();
      $count=0;
      foreach ($dados as $row) {
        $dados[$count]->nome_empresa = "Sem vínculo";
        $queryEmp = $this->pendencias_model->selectEmpreendimento($row->id_usuario);
        if(count($queryEmp->result())>0){
          if($queryEmp->result()[0]->nome == 'CEI'){
            $this->load->model('empreendimentos_model');
            $queryUserEmp = $this->empreendimentos_model->select($dados[$count]->empresa);
            $resultado = $queryUserEmp->result();
            if($resultado){
              $dados[$count]->nome_empresa =$resultado[0]->nome;
            }else{
              $dados[$count]->nome_empresa = "Empresa excluída";
            }
          }else{
            $dados[$count]->nome_empresa = $queryEmp->result()[0]->nome;
          }
        }

        $dados[$count]->situacao_final = $this->pendencias_model->verifica_resolvida($row->id);

        $count++;
      }

      $this->load->view('pendencias', array('data'=>$dados));
      $this->load->view('footer');

    }

    function save_atualiza() {
      $this->load->model('usuarios_model');
      $this->usuarios_model->verifica_login();

      $this->load->model('pendencias_model');
      $this->pendencias_model->save_atualiza();

      $this->load->model('incubadoras_model');
      $incubadora = $this->incubadoras_model->select(ID_INCUBADORA);

      $this->load->view('header');
      $this->load->view('head_logado', array('titulo'=>$incubadora[0]->titulo));
      echo "<div class='alert alert-success fade in'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Requisição atualizada com sucesso!</div>";

      $this->load->model('pendencias_model');
      $query = $this->pendencias_model->select();

      $dados = $query->result();
      $count=0;
      foreach ($dados as $row) {
        $queryEmp = $this->pendencias_model->selectEmpreendimento($row->id_usuario);
        $dados[$count]->nome_empresa = "Sem vínculo";
        if(count($queryEmp->result())>0){
          $dados[$count]->nome_empresa = $queryEmp->result()[0]->nome;
        }

        $dados[$count]->situacao_final = $this->pendencias_model->verifica_resolvida($row->id);

        $count++;
      }

      $this->load->view('pendencias', array('data'=>$dados));
      $this->load->view('footer');

    }

    function insert() {
      $this->load->model('usuarios_model');
      $this->usuarios_model->verifica_login();

      $this->load->model('pendencias_model');
	    $this->pendencias_model->insert();

      $this->load->model('incubadoras_model');
      $incubadora = $this->incubadoras_model->select(ID_INCUBADORA);

      $this->load->view('header');
      $this->load->view('head_logado', array('titulo'=>$incubadora[0]->titulo));
      echo "<div class='alert alert-success fade in'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Requisição cadastrada com sucesso!</div>";

      $this->load->model('pendencias_model');
      $query = $this->pendencias_model->select();

      $dados = $query->result();
      $count=0;
      foreach ($dados as $row) {
        $dados[$count]->nome_empresa = "Sem vínculo";
        $queryEmp = $this->pendencias_model->selectEmpreendimento($row->id_usuario);
        if(count($queryEmp->result())>0){
          if($queryEmp->result()[0]->nome == 'CEI'){
            $this->load->model('empreendimentos_model');
            $queryUserEmp = $this->empreendimentos_model->select($dados[$count]->empresa);
            $resultado = $queryUserEmp->result();
            if($resultado){
              $dados[$count]->nome_empresa =$resultado[0]->nome;
            }else{
              $dados[$count]->nome_empresa = "Empresa excluída";
            }
          }else{
            $dados[$count]->nome_empresa = $queryEmp->result()[0]->nome;
          }
        }

        $dados[$count]->situacao_final = $this->pendencias_model->verifica_resolvida($row->id);

        $count++;
      }

      $this->load->view('pendencias', array('data'=>$dados));
      $this->load->view('footer');

    }

    function atualiza_aprovada($id) {
      $this->load->model('usuarios_model');
      $this->usuarios_model->verifica_login();

      $this->load->model('incubadoras_model');
      $incubadora = $this->incubadoras_model->select(ID_INCUBADORA);

      $this->load->view('header');
      $this->load->view('head_logado', array('titulo'=>$incubadora[0]->titulo));

      $this->load->model('pendencias_model');
      $query = $this->pendencias_model->select();

      $dados = $query->result()[0];

      $this->load->model('consultores_model');
      $data = $this->consultores_model->selectDisponivel();

      $queryConsultorias = $this->pendencias_model->select_consultorias($id);
      $return = array();
      foreach ($queryConsultorias->result() as $row) {
        $horas = number_format($row->tempo_consultoria/60 ,0);
        $minutos = str_pad($row->tempo_consultoria%60,2,'0', STR_PAD_LEFT);
        $row->tempo_consultoria = $horas.":".$minutos;
        array_push($return, $row);
      }

      $this->load->view('pendencias_aprova_consultoria', array('data'=>$dados, 'consultores'=>$data->result(),'consultorias'=>$return));
      $this->load->view('footer');
    }

    function save_aprovar() {
      $this->load->model('usuarios_model');
      $this->usuarios_model->verifica_login();

      $this->load->model('incubadoras_model');
      $incubadora = $this->incubadoras_model->select(ID_INCUBADORA);

      $this->load->model('pendencias_model');
      $this->pendencias_model->aprova_consultoria();

      $this->load->view('header');
      $this->load->view('head_logado', array('titulo'=>$incubadora[0]->titulo));
      echo "<div class='alert alert-success fade in'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Requisição atualizada com sucesso!</div>";

      $this->load->model('pendencias_model');
      $query = $this->pendencias_model->select();

      $dados = $query->result();
      $count=0;
      foreach ($dados as $row) {
        $queryEmp = $this->pendencias_model->selectEmpreendimento($row->id_usuario);
        $dados[$count]->nome_empresa = "Sem vínculo";
        if(count($queryEmp->result())>0){
          $dados[$count]->nome_empresa = $queryEmp->result()[0]->nome;
        }

        $dados[$count]->situacao_final = $this->pendencias_model->verifica_resolvida($row->id);

        $count++;
      }

      $this->load->view('pendencias', array('data'=>$dados));
      $this->load->view('footer');

    }


}
