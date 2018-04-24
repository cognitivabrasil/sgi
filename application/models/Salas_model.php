<?php
class Salas_model extends CI_Model {

    // Insere empreendimento

    function insert() {
      $this->nr_sala = $_POST['nr'];
      $this->funcao = $_POST['funcao'];
      $this->descricao = $_POST['descricao'];
      $this->disponivel = $_POST['disponivel'];
      $this->dimensoes = $_POST['dimensoes'];
      $this->travada_cei = $_POST['travada_cei'];

      $this->db->insert('erp_salas',$this);

    }

    function save() {
      $this->nr_sala = $_POST['nr'];
      $this->funcao = $_POST['funcao'];
      $this->descricao = $_POST['descricao'];
      $this->dimensoes = $_POST['dimensoes'];
      $this->disponivel = $_POST['disponivel'];
      $this->travada_cei = $_POST['travada_cei'];

      $this->db->where('id', $_POST['id']);

      $this->db->update('erp_salas',$this);

    }

    // Seleciona usuários do banco

    function select() {
        $query = $this->db->query('Select * from erp_salas order by nr_sala');

        return $query;
    }

    function selectSalaByEmp($id_emp) {
        $query = $this->db->query('Select erp_salas.* from erp_salas inner join erp_salas_emp on erp_salas.id = erp_salas_emp.id_sala where erp_salas_emp.id_emp = '.$id_emp.' order by nr_sala');

        return $query;
    }

    function selectSalasDisponiveis() {
        $query = $this->db->query('Select * from erp_salas where disponivel = 1 order by nr_sala');

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

    function selectByNumber($nr) {
        $query = $this->db->query('Select * from erp_salas
        where erp_salas.nr_sala = "'.$nr.'"');

        return $query;
    }

    function selectSalaNaoAlocada($id_emp) {
        $query = $this->db->query('SELECT * FROM erp_salas where erp_salas.id NOT IN (select id_sala from erp_salas_emp) order by nr_sala');

        return $query->result();
    }

}
