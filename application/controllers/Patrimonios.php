<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Patrimonios extends CI_Controller {

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

      $this->load->model('patrimonios_model');
      $query = $this->patrimonios_model->select();

      $dados = $query->result();
      $count=0;
      foreach ($dados as $row) {
        $queryIn = $this->patrimonios_model->selectSala($row->id);
        if(count($queryIn->result())>0){
          $dados[$count]->sala = $queryIn->result()[0];
          $dados[$count]->sala->data_atribuicao = date("d/m/Y", strtotime($dados[$count]->sala->data_atribuicao));
        }
        $count++;
      }

      $dataResponsaveis = $this->patrimonios_model->selectResponsaveis();
      $dataSalas = $this->patrimonios_model->selectAllSalas();

      $this->load->view('patrimonios', array('data'=>$dados, 'responsaveis'=>$dataResponsaveis->result(), 'salas'=>$dataSalas->result()));
      $this->load->view('footer');
    }

    function consulta_resp($var) {
      $this->load->model('usuarios_model');
      $this->usuarios_model->verifica_login();

      $this->load->model('incubadoras_model');
      $incubadora = $this->incubadoras_model->select(ID_INCUBADORA);

      $this->load->view('header');
      $this->load->view('head_logado', array('titulo'=>$incubadora[0]->titulo));

      $this->load->model('patrimonios_model');
      $query = $this->patrimonios_model->select_relatorio('resp',$var);

      $dados = $query->result();
      $count=0;
      foreach ($dados as $row) {
        $queryIn = $this->patrimonios_model->selectSala($row->id);
        if(count($queryIn->result())>0){
          $dados[$count]->sala = $queryIn->result()[0];
          $dados[$count]->sala->data_atribuicao = date("d/m/Y", strtotime($dados[$count]->sala->data_atribuicao));
        }
        $count++;
      }

      $dataResponsaveis = $this->patrimonios_model->selectResponsaveis();
      $dataSalas = $this->patrimonios_model->selectAllSalas();

      $this->load->view('patrimonios_consultas', array('data'=>$dados, 'responsaveis'=>$dataResponsaveis->result(), 'salas'=>$dataSalas->result()));
      $this->load->view('footer');
    }

    function consulta_sala($var) {
      $this->load->model('usuarios_model');
      $this->usuarios_model->verifica_login();

      $this->load->model('incubadoras_model');
      $incubadora = $this->incubadoras_model->select(ID_INCUBADORA);

      $this->load->view('header');
      $this->load->view('head_logado', array('titulo'=>$incubadora[0]->titulo));

      $this->load->model('patrimonios_model');

      $query = $this->patrimonios_model->select_relatorio('sala',$var);
      $dados = $query->result();

      $count=0;
      foreach ($dados as $row) {
        $queryIn = $this->patrimonios_model->selectSala($row->id);
        if(count($queryIn->result())>0){
          $dados[$count]->sala = $queryIn->result()[0];
          $dados[$count]->sala->data_atribuicao = date("d/m/Y", strtotime($dados[$count]->sala->data_atribuicao));
        }
        $count++;
      }

      $dataResponsaveis = $this->patrimonios_model->selectResponsaveis();
      $dataSalas = $this->patrimonios_model->selectAllSalas();

      $this->load->view('patrimonios_consultas', array('data'=>$dados, 'responsaveis'=>$dataResponsaveis->result(), 'salas'=>$dataSalas->result()));
      $this->load->view('footer');
    }

    function consulta_nr($var) {
      $this->load->model('usuarios_model');
      $this->usuarios_model->verifica_login();

      $this->load->model('incubadoras_model');
      $incubadora = $this->incubadoras_model->select(ID_INCUBADORA);

      $this->load->view('header');
      $this->load->view('head_logado', array('titulo'=>$incubadora[0]->titulo));

      $this->load->model('patrimonios_model');
      $query = $this->patrimonios_model->select_relatorio('nr',$var);

      $dados = $query->result();
      $count=0;
      foreach ($dados as $row) {
        $queryIn = $this->patrimonios_model->selectSala($row->id);
        if(count($queryIn->result())>0){
          $dados[$count]->sala = $queryIn->result()[0];
          $dados[$count]->sala->data_atribuicao = date("d/m/Y", strtotime($dados[$count]->sala->data_atribuicao));
        }
        $count++;
      }

      $dataResponsaveis = $this->patrimonios_model->selectResponsaveis();
      $dataSalas = $this->patrimonios_model->selectAllSalas();

      $this->load->view('patrimonios_consultas', array('data'=>$dados, 'responsaveis'=>$dataResponsaveis->result(), 'salas'=>$dataSalas->result()));
      $this->load->view('footer');
    }

    function visualiza($id) {
      $this->load->model('usuarios_model');
      $this->usuarios_model->verifica_login();

      $this->load->model('incubadoras_model');
      $incubadora = $this->incubadoras_model->select(ID_INCUBADORA);

      $this->load->view('header');
      $this->load->view('head_logado', array('titulo'=>$incubadora[0]->titulo));

      $this->load->model('patrimonios_model');
      $query = $this->patrimonios_model->selectByID($id);

      $dados = $query->result()[0];
      $queryIn = $this->patrimonios_model->selectEmpSala($dados->id);
      if(count($queryIn->result())>0){
        $dados->sala = $queryIn->result()[0];
        $dados->sala->data_atribuicao = date("d/m/Y", strtotime($dados->sala->data_atribuicao));
      }

      $this->load->view('patrimonios_visualiza', array('data'=>$dados));
      $this->load->view('footer');
    }

    function edita($id) {
      $this->load->model('usuarios_model');
      $this->usuarios_model->verifica_login();

      $this->load->model('incubadoras_model');
      $incubadora = $this->incubadoras_model->select(ID_INCUBADORA);

      $this->load->view('header');
      $this->load->view('head_logado', array('titulo'=>$incubadora[0]->titulo));

      $this->load->model('patrimonios_model');
      $query = $this->patrimonios_model->selectByID($id);

      $dados = $query->result()[0];
      $queryIn = $this->patrimonios_model->selectSala($dados->id);
      if(count($queryIn->result())>0){
        $dados->sala = $queryIn->result()[0];
        $dados->sala->data_atribuicao = date("d/m/Y", strtotime($dados->sala->data_atribuicao));
      }

      $this->load->view('patrimonios_edita', array('data'=>$dados));
      $this->load->view('footer');
    }

    function atribui($id) {
      $this->load->model('usuarios_model');
      $this->usuarios_model->verifica_login();

      $this->load->model('incubadoras_model');
      $incubadora = $this->incubadoras_model->select(ID_INCUBADORA);

      $this->load->view('header');
      $this->load->view('head_logado', array('titulo'=>$incubadora[0]->titulo));

      $this->load->model('patrimonios_model');
      $this->load->model('salas_model');
      $query = $this->patrimonios_model->selectByID($id);

      $dados = $query->result()[0];
      $queryIn = $this->patrimonios_model->selectSala($dados->id);
      if(count($queryIn->result())>0){
        $dados->sala = $queryIn->result()[0];
        $dados->sala->data_atribuicao = date("d/m/Y", strtotime($dados->sala->data_atribuicao));
      }

      $queryEmp = $this->patrimonios_model->selectAllEmp();

      $this->load->view('patrimonios_atribui', array('data'=>$dados,'empresas'=>$queryEmp->result()));
      $this->load->view('footer');
    }

    function atribuicao() {
      $this->load->model('usuarios_model');
      $this->usuarios_model->verifica_login();

      $this->load->model('incubadoras_model');
      $incubadora = $this->incubadoras_model->select(ID_INCUBADORA);

      $this->load->model('patrimonios_model');
	    $this->patrimonios_model->atribuirPatrimonio();

      $this->load->view('header');
      $this->load->view('head_logado', array('titulo'=>$incubadora[0]->titulo));
      echo "<div class='alert alert-success fade in'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Localização do patrimônio atribuída com sucesso!</div>";

      $this->load->model('patrimonios_model');
      $query = $this->patrimonios_model->selectByID($_POST['id']);

      $dados = $query->result()[0];
      $queryIn = $this->patrimonios_model->selectEmpSala($dados->id);
      if(count($queryIn->result())>0){
        $dados->sala = $queryIn->result()[0];
        $dados->sala->data_atribuicao = date("d/m/Y", strtotime($dados->sala->data_atribuicao));
      }

      $this->load->view('patrimonios_visualiza', array('data'=>$dados));
      $this->load->view('footer');
    }


    function cadastra() {
      $this->load->model('usuarios_model');
      $this->usuarios_model->verifica_login();

      $this->load->model('incubadoras_model');
      $incubadora = $this->incubadoras_model->select(ID_INCUBADORA);

      $this->load->view('header');
      $this->load->view('head_logado', array('titulo'=>$incubadora[0]->titulo));
      $this->load->view('patrimonios_cadastra');
      $this->load->view('footer');
    }

    function insert() {
      $this->load->model('usuarios_model');
      $this->usuarios_model->verifica_login();

      $this->load->model('incubadoras_model');
      $incubadora = $this->incubadoras_model->select(ID_INCUBADORA);

      $this->load->model('patrimonios_model');
	    $resultado = $this->patrimonios_model->insert();

      $this->load->view('header');
      $this->load->view('head_logado', array('titulo'=>$incubadora[0]->titulo));
      if($resultado == 1){
        echo "<div class='alert alert-success fade in'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Patrimônio cadastrado com sucesso!</div>";
      }else{
        echo "<div class='alert alert-danger fade in'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Já existe um patrimônio com este número!<br>Patrimônio não cadastrado.</div>";
      }

      $query = $this->patrimonios_model->select();

      $this->load->view('patrimonios', array('data'=>$query->result()));
      $this->load->view('footer');
    }

    function save() {
      $this->load->model('usuarios_model');
      $this->usuarios_model->verifica_login();

      $this->load->model('incubadoras_model');
      $incubadora = $this->incubadoras_model->select(ID_INCUBADORA);

      $this->load->model('patrimonios_model');
	    $this->patrimonios_model->save();

      $this->load->view('header');
      $this->load->view('head_logado', array('titulo'=>$incubadora[0]->titulo));
      echo "<div class='alert alert-success fade in'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Patrimônio editado com sucesso!</div>";

      $query = $this->patrimonios_model->select();

      $dados = $query->result();
      $count=0;
      foreach ($dados as $row) {
        $queryIn = $this->patrimonios_model->selectSala($row->id);
        if(count($queryIn->result())>0){
          $dados[$count]->sala = $queryIn->result()[0];
          $dados[$count]->sala->data_atribuicao = date("d/m/Y", strtotime($dados[$count]->sala->data_atribuicao));
        }
        $count++;
      }

      $this->load->view('patrimonios', array('data'=>$dados));
      $this->load->view('footer');
    }

    function remove($id) {
      $this->load->model('patrimonios_model');
      echo $this->patrimonios_model->remove($id);
    }

    function getPtNr($var){

      header('Access-Control-Allow-Origin: *');

      $this->load->model('patrimonios_model');
      $query = $this->patrimonios_model->select_relatorio('nr',$var);

      $dados = $query->result();
      $count=0;
      foreach ($dados as $row) {
        $queryIn = $this->patrimonios_model->selectSala($row->id);
        if(count($queryIn->result())>0){
          $queryEmp = $this->patrimonios_model->selectEmpSala($row->id);
          $dados[$count]->sala = $queryIn->result()[0];
          $dados[$count]->empreendimento = $queryEmp->result()[0];
          $dados[$count]->sala->data_atribuicao = date("d/m/Y", strtotime($dados[$count]->sala->data_atribuicao));
        }
        $count++;
      }

      echo json_encode($dados);

    }

    function export_patrimonios() {
      $this->load->model('usuarios_model');
      $this->usuarios_model->verifica_login();

      $this->load->model('patrimonios_model');
      $query = $this->patrimonios_model->select();

      $dados = $query->result();
      $count=0;
      foreach ($dados as $row) {
        $queryIn = $this->patrimonios_model->selectSala($row->id);
        if(count($queryIn->result())>0){
          $dados[$count]->sala = $queryIn->result()[0];
          $dados[$count]->sala->data_atribuicao = date("d/m/Y", strtotime($dados[$count]->sala->data_atribuicao));
        }
        $count++;
      }

      $dataResponsaveis = $this->patrimonios_model->selectResponsaveis();
      $dataSalas = $this->patrimonios_model->selectSalas();

      echo '"Nome";"Descrição";"Número";"Empresa";"Sala";"Data de atribuição";"Observações"';
      echo "\n";
      foreach ($dados as $row) {
        echo '"'.str_replace("\"", "\'\'", $row->nome).'";"'.str_replace("\"", "\'\'", $row->descricao).'";"'.$row->nrpatrimonio.'";"'.$row->responsavel.'";';
        if(isset($row->sala)){
          echo '"'.$row->sala->nr_sala.'";"'.$row->sala->data_atribuicao.'";"'.$row->observacoes.'"';
        }else{
          echo '"";"";"'.$row->observacoes.'"';
        }
        echo "\n";
      }
    }

    function insertApp() {

      header('Access-Control-Allow-Origin: *');

      header('Access-Control-Allow-Methods: GET, POST');

      header("Access-Control-Allow-Headers: X-Requested-With");

      header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

      $this->load->model('patrimonios_model');
	    $this->patrimonios_model->insert_app();

    }

    function atribuiApp($pat,$sala,$empresa) {

      header('Access-Control-Allow-Origin: *');

      $this->load->model('patrimonios_model');
	    $this->patrimonios_model->atribuirPatrimonioApp($pat,$sala,$empresa);

      echo json_encode('ok');

    }
}
