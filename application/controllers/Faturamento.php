<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Faturamento extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
      $this->load->model('usuarios_model');
      $this->usuarios_model->verifica_login();

      $this->load->view('header');
      $this->load->view('head_logado');

      $this->load->view('faturamento');
      $this->load->view('footer');
    }

    function royalt_pg($id) {
      $this->load->model('usuarios_model');
      $this->usuarios_model->verifica_login();

      $this->load->view('header');
      $this->load->view('head_logado');

      $this->load->model('faturamento_model');
      $query = $this->faturamento_model->buscaRoyalties_pagos($id);

      $this->load->view('faturamento_royalt_pg', array('notas'=>$query->result(),'id_empreendimento'=>$id));
      $this->load->view('footer');
    }

    function lista($id) {
      $this->load->model('usuarios_model');
      $this->usuarios_model->verifica_login();

      $this->load->view('header');
      $this->load->view('head_logado');

      $this->load->model('faturamento_model');
      $query = $this->faturamento_model->buscaFaturamento($id);

      $queryCont = $this->faturamento_model->buscaContador($id);

      $queryNotas = $this->faturamento_model->buscaNotas($id);

      $this->load->view('faturamento', array('faturamento'=>$query->result(),'notas'=>$queryNotas->result(),'id_empreendimento'=>$id,'contador'=>$queryCont->result()[0]));
      $this->load->view('footer');
    }

    function cadastra() {
      $this->load->model('usuarios_model');
      $this->usuarios_model->verifica_login();

      $this->load->view('header');
      $this->load->view('head_logado');
      $this->load->view('faturamento_cadastra');
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
      $query = $this->usuarios_model->select();

      $this->load->view('usuarios', array('data'=>$query->result()));
      $this->load->view('footer');
    }

    function salvaPrevisao() {
      $this->load->model('faturamento_model');
	    $this->faturamento_model->salvaPrevisao();
    }

    function salvaContador() {
      $this->load->model('faturamento_model');
	    $this->faturamento_model->salvaContador();
    }

    function salvaNota() {
      $this->load->model('faturamento_model');
	    $this->faturamento_model->salvaNota();
    }

    function uploadxml() {
      $this->load->model('faturamento_model');
      $this->load->library('unzip');
      $dezip = $this->unzip->extract($_FILES['uploadxml']['tmp_name'][0]);
      foreach ($dezip as $file_by_file) {
        if($xml_content = simplexml_load_file($file_by_file)){
            if(isset($xml_content->NFe)){
              $produto = $xml_content->NFe->infNFe;
              $numero = $produto->ide->nNF;
              $emissao = $produto->ide->dhEmi;
              $valor = $produto->total->ICMSTot->vProd;

              $this->faturamento_model->salvaNotaXml($_POST['id_empreendimento_xml'],$numero,$emissao,$valor,$file_by_file);
              echo 'Numero: '.$numero.' Emissao: '.$emissao.' Valor: '.$valor.' ID Empreendimento:'.$_POST['id_empreendimento_xml'];
            }else if(isset($xml_content->Nfse)){
              $servico = $xml_content->Nfse->InfNfse;
              $numero = $servico->Numero;
              $emissao = $servico->DataEmissao;
              $valor = $servico->Servico->Valores->ValorLiquidoNfse;

              $this->faturamento_model->salvaNotaXml($_POST['id_empreendimento_xml'],$numero,$emissao,$valor,$file_by_file);
              echo 'Numero: '.$numero.' Emissao: '.$emissao.' Valor: '.$valor.' ID Empreendimento:'.$_POST['id_empreendimento_xml'];
            }
        }
      }
    }

    function salvaRoyalt() {
      $this->load->model('faturamento_model');
	    $this->faturamento_model->salvaRoyalt();
    }

    function download($id) {
      $this->load->model('faturamento_model');
      $query = $this->faturamento_model->buscaNotabyID($id);

      $path=$query->result()[0]->arquivo_nota;

      force_download($path,NULL);
    }
}
