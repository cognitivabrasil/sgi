<?php
class Servicos_model extends CI_Model {

    // Insere empreendimento

    function insert() {

      $this->nome = $_POST['nome'];
      $this->empresa = $_POST['empresa'];
      $this->site = $_POST['site'];
      $this->email = $_POST['email'];
      $this->telefone = $_POST['fone'];
      $this->atuacao = $_POST['atuacao'];
      $this->eixo_cerne = $_POST['eixo_cerne'];

      $this->db->insert('erp_servicos',$this);

    }

    function save() {

      $this->nome = $_POST['nome'];
      $this->empresa = $_POST['empresa'];
      $this->site = $_POST['site'];
      $this->email = $_POST['email'];
      $this->telefone = $_POST['fone'];
      $this->atuacao = $_POST['atuacao'];
      $this->eixo_cerne = $_POST['eixo_cerne'];

      $this->db->where('id', $_POST['id']);

      $this->db->update('erp_servicos',$this);

    }

    function select($id=0) {
        if($id==0){
          $query = $this->db->query('Select * from erp_servicos');
        }else{
          $query = $this->db->query("Select * from erp_servicos where erp_servicos.id = ".$id);
        }

        return $query;
    }

    function selectByArea($area) {

        $query = $this->db->query("Select * from erp_servicos where erp_servicos.atuacao like '%".urldecode(str_replace('_',' ',$area))."%'");

        return $query;
    }

    function select_areas() {

      $query = $this->db->query('SELECT atuacao FROM erp_servicos group by atuacao');

      return $query;
    }

    function remove($id) {
        $query = $this->db->query('Delete from erp_servicos where id='.$id);

        return $query;
    }
}
