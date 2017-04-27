<?php
class Faturamento_model extends CI_Model {

    // Insere empreendimento

    function insert() {
      $this->nome = $_POST['nome'];
      $this->funcao = $_POST['funcao'];
      $this->vinculo = $_POST['vinculo'];
      $this->email = $_POST['email'];
      $this->entrada = '';
      if($_POST['entrada']!=''){
        $aux = explode('/',$_POST['entrada']);
        $this->entrada = $aux[2]."-".$aux[1]."-".$aux[0];
      }
      $this->saida = '';
      if($_POST['saida']!=''){
        $aux2 = explode('/',$_POST['saida']);
        $this->saida = $aux2[2]."-".$aux2[1]."-".$aux2[0];
      }
      $this->sem_funcao = 0;
      if(isset($_POST['sem_funcao'])){
          $this->sem_funcao = 1;
      }
      $this->em_atividade = 0;
      if(isset($_POST['em_atividade'])){
        $this->em_atividade = 1;
      }
      $this->socio = 0;
      if(isset($_POST['socio'])){
        $this->socio = 1;
      }
      $this->id_empreendimento = $_POST['empresa'];

      $this->db->insert('erp_colaboradores',$this);

    }

    function salvaContador() {

      $this->contador = $_POST['contador'];

      $this->db->where('id',$_POST['id_empreendimento']);
      $this->db->update('erp_empreendimentos',$this);
    }

    function salvaPrevisao() {

      $cont = 0;
      $id_empreendimento = $_POST['id_empreendimento'];
      foreach($_POST['ano'] as $ano){
        if(isset($ano)){
          $this->ano = $ano;
          $this->previsao = '';
          if(isset($_POST['previsao'][$cont])){
            $this->previsao = $_POST['previsao'][$cont];
          }
          $this->id_empreendimento = $id_empreendimento;

          $query = $this->db->query("Select * from erp_faturamento where id_empreendimento = ".$id_empreendimento." and ano = ".$ano);

          $data = $query->result();

          if(isset($data[0])){
            $this->db->where('id',$data[0]->id);
            $this->db->update('erp_faturamento',$this);
          }else{
            $this->db->insert('erp_faturamento',$this);
          }
        }
        $cont++;
      }

    }

    function salvaNota() {

      //file upload configuration
      $config['upload_path'] = './uploads/';
      $config['allowed_types'] = 'gif|jpg|png|pdf';
      $config['max_size']	= '0';
      $config['max_width']  = '0';
      $config['max_height']  = '0';
      //end of configuration

      $cont = 0;
      $id_empreendimento = $_POST['id_empreendimento_notas'];
      $files = $_FILES;
      foreach($_POST['numero'] as $numero){
        if(isset($numero)){
          $this->numero = $numero;
          $this->data = '';
          $this->valor = '';
          if(isset($_POST['data'][$cont])){
            $this->data = $_POST['data'][$cont];
          }
          if(isset($_POST['valor'][$cont])){
            $this->valor = $_POST['valor'][$cont];
          }

          $this->arquivo_nota = "";
          if($files['nota']['name'][$cont]!=""){

            $_FILES['userfile']['name']= $files['nota']['name'][$cont];
            $_FILES['userfile']['type']= $files['nota']['type'][$cont];
            $_FILES['userfile']['tmp_name']= $files['nota']['tmp_name'][$cont];
            $_FILES['userfile']['error']= $files['nota']['error'][$cont];
            $_FILES['userfile']['size']= $files['nota']['size'][$cont];

        		$this->load->library('upload', $config);

            if ( ! $this->upload->do_upload()){
        			$error = array('error' => $this->upload->display_errors());

        			print_r($error);
        		}else{
        			$data = array('upload_nota' => $this->upload->data());
              $this->arquivo_nota = $data['upload_nota']['full_path'];
        		}
          }

          $this->id_empreendimento = $id_empreendimento;

          if($numero!=''){
            $query = $this->db->query("Select * from erp_faturamento_notas where id_empreendimento = ".$id_empreendimento." and numero = ".$numero);

            $data = $query->result();

            if(isset($data[0])){
              if($this->arquivo_nota==""){
                $this->arquivo_nota = $data[0]->arquivo_nota;
              }
              $this->db->where('id',$data[0]->id);
              $this->db->update('erp_faturamento_notas',$this);
            }else{
              $this->royalt = 0;
              $this->db->insert('erp_faturamento_notas',$this);
            }
          }
        }
        $cont++;
      }

    }

    function salvaNotaXml($id_empreendimento,$numero,$emissao,$valor,$arquivo) {

      //$files = $_FILES;
      echo 'Numero: '.$numero.' Emissao: '.$emissao.' Valor: '.$valor.' ID Empreendimento:'.$id_empreendimento;
      $this->numero = $numero+0;
      $this->data = date($emissao);
      $this->valor = $valor+0;
      $this->royalt = 0;

      $this->arquivo_nota = "";

      print_r($this);

      /*if ( ! $this->upload->do_upload()){
  			$error = array('error' => $this->upload->display_errors());
  			print_r($error);
  		}else{
  			$data = array('upload_nota' => $this->upload->data());
        $this->arquivo_nota = $data['upload_nota']['full_path'];
  		}
      */

      $this->id_empreendimento = $id_empreendimento;
      $this->db->insert('erp_faturamento_notas',$this);

    }

    function salvaRoyalt() {

      $this->royalt = $_POST['royalt'];
      $this->data_royalt = date("Y-m-d H:i:s");

      $this->db->where('id',$_POST['id_nota']);
      $this->db->update('erp_faturamento_notas',$this);

    }

    //Atualiza usuário

    function update () {
      $this->Date =time();
      //$this->db->update('entries',$this, array('id',$_POST[]));
    }

    function buscaFaturamento($id){

      $query = $this->db->query("Select * from erp_faturamento where id_empreendimento = ".$id);

      return $query;
    }

    function buscaNotas($id){

      $query = $this->db->query("Select * from erp_faturamento_notas where royalt<>1 and id_empreendimento = ".$id);

      return $query;
    }

    function buscaNotabyID($id){

      $query = $this->db->query("Select * from erp_faturamento_notas where id = ".$id);

      return $query;
    }

    function buscaRoyalties_pagos($id){

      $query = $this->db->query("Select * from erp_faturamento_notas where royalt=1 and id_empreendimento = ".$id);

      return $query;
    }

    function buscaContador($id){

      $query = $this->db->query("Select contador from erp_empreendimentos where id = ".$id);

      return $query;
    }

}
