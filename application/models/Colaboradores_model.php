<?php
class Colaboradores_model extends CI_Model {

    // Insere empreendimento

    function insert() {
      $this->nome = $_POST['nome'];
      $this->vinculo = $_POST['vinculo'];
      $this->email = $_POST['email'];
      $this->entrada = $_POST['entrada'];
      $this->saida = $_POST['saida'];
      $this->sem_funcao = 0;
      if(isset($_POST['sem_funcao'])){
          $this->sem_funcao = 1;
          $this->funcao = '';
      }else{
        $this->funcao = $_POST['funcao'];
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

    function save() {
      $this->nome = $_POST['nome'];
      $this->funcao = $_POST['funcao'];
      $this->vinculo = $_POST['vinculo'];
      $this->email = $_POST['email'];
      $this->entrada = '';
      if($_POST['entrada']!=''){
        $this->entrada = $_POST['entrada'];
      }
      $this->saida = '';
      if($_POST['saida']!=''){
        $this->saida = $_POST['saida'];
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

      $this->db->where('id', $_POST['id']);

      $this->db->update('erp_colaboradores',$this);

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

    function remove($id) {
        $query = $this->db->query('Delete from erp_colaboradores where id='.$id);

        return $query;
    }

}
