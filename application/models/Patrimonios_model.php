<?php
class Patrimonios_model extends CI_Model {

    // Insere empreendimento

    function insert() {
      $this->nome = $_POST['nome'];
      $this->nrpatrimonio = $_POST['nr'];
      $this->responsavel = $_POST['responsavel'];
      $this->descricao = $_POST['descricao'];

      $this->db->insert('erp_patrimonios',$this);

    }

    function save() {
      $this->nome = $_POST['nome'];
      $this->nrpatrimonio = $_POST['nr'];
      $this->responsavel = $_POST['responsavel'];
      $this->descricao = $_POST['descricao'];

      $this->db->where('id', $_POST['id']);
      $this->db->update('erp_patrimonios',$this);
    }


    function atribuirPatrimonio() {
      $query = $this->db->query('select * from erp_patrimonio_sala
      INNER JOIN erp_salas on erp_salas.id = erp_patrimonio_sala.id_sala
      where erp_patrimonio_sala.id_patrimonio = '.$_POST['id']);

      $dados = $query->result();

      if(count($dados)>0){
        //Finalizar
        $this->id_patrimonio = $_POST['id'];
        $this->id_sala = $_POST['sala'];
        $this->data_atribuicao = date('Y-m-d');
        $this->db->where('id_patrimonio',$_POST['id']);
        $this->db->update('erp_patrimonio_sala',$this);

      }else{
        $this->id_patrimonio = $_POST['id'];
        $this->id_sala = $_POST['sala'];
        $this->data_atribuicao = date('Y-m-d');

        $this->db->insert('erp_patrimonio_sala',$this);
      }

    }

    function select() {
        $query = $this->db->query('Select * from erp_patrimonios');

        return $query;
    }

    function selectResponsaveis() {
        $query = $this->db->query('Select * from erp_patrimonios group by responsavel');

        return $query;
    }

    function selectSalas() {
        $query = $this->db->query('Select erp_salas.* from erp_patrimonios
        inner join erp_patrimonio_sala on erp_patrimonios.id = erp_patrimonio_sala.id_patrimonio
        inner join erp_salas on erp_salas.id = erp_patrimonio_sala.id_sala
        group by erp_patrimonio_sala.id_sala');

        return $query;
    }

    function select_relatorio($tipo,$var) {
        switch ($tipo) {
          case 'sala':
            $query = $this->db->query('Select * from erp_patrimonios inner join erp_patrimonio_sala on erp_patrimonios.id = erp_patrimonio_sala.id_patrimonio where erp_patrimonio_sala.id_sala = '.$var);
            break;
          case 'resp':
            $query = $this->db->query('Select * from erp_patrimonios where responsavel like "%'.$var.'%"');
            break;
          case 'nr':
            $query = $this->db->query('Select * from erp_patrimonios where nrpatrimonio like "%'.$var.'%"');
            break;
        }

        return $query;
    }

    function selectSala($id) {
      $query = $this->db->query('select * from erp_patrimonio_sala
      INNER JOIN erp_salas on erp_salas.id = erp_patrimonio_sala.id_sala
      where erp_patrimonio_sala.id_patrimonio = '.$id);

      return $query;

    }

    function selectAllSalas() {
      $query = $this->db->query('select * from erp_salas');

      return $query;

    }

    function selectByID($id) {
        $query = $this->db->query('Select * from erp_patrimonios
        where erp_patrimonios.id = '.$id);

        return $query;
    }

    function remove($id) {
        $query = $this->db->query('Delete from erp_patrimonios where id='.$id);

        return $query;
    }

}
