<?php
class Colaboradores_model extends CI_Model {

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

    //Atualiza usuário

    function update () {
      $this->Date =time();
      //$this->db->update('entries',$this, array('id',$_POST[]));
    }

    // Seleciona usuários do banco

    function lista($id=0) {
        if($id==0){
          $query = $this->db->get('erp_colaboradores');
        }else{
          $query = $this->db->query("Select * from erp_colaboradores where id_empreendimento = ".$id);
        }

        return $query;
    }

    function select($id) {
        $query = $this->db->query("Select * from erp_colaboradores where id = ".$id);

        return $query;
    }

}