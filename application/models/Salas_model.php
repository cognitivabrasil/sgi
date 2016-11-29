<?php
class Salas_model extends CI_Model {

    // Insere empreendimento

    function insert() {
      $this->nr_sala = $_POST['nr'];
      $this->funcao = $_POST['funcao'];
      $this->descricao = $_POST['descricao'];
      $this->disponivel = $_POST['disponivel'];

      $this->db->insert('erp_salas',$this);

    }

    function save() {
      $this->nr_sala = $_POST['nr'];
      $this->funcao = $_POST['funcao'];
      $this->descricao = $_POST['descricao'];
      $this->disponivel = $_POST['disponivel'];

      $this->db->where('id', $_POST['id']);

      $this->db->update('erp_salas',$this);

    }

    // Seleciona usuários do banco

    function select() {
        $query = $this->db->query('Select * from erp_salas order by nr_sala');

        return $query;
    }

    function selectSala($id) {
      $query = $this->db->query('select * from erp_patrimonio_sala
      INNER JOIN erp_salas on erp_salas.id = erp_patrimonio_sala.id_sala
      where erp_patrimonio_sala.id_patrimonio = '.$id);

      return $query;

    }

    function selectAllSalas() {
      $query = $this->db->query('select * from erp_salas order by nr_sala');

      return $query;

    }

    function selectByID($id) {
        $query = $this->db->query('Select * from erp_salas
        where erp_salas.id = '.$id);

        return $query;
    }

}
