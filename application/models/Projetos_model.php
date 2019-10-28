<?php
class Projetos_model extends CI_Model {

    function insert() {
      $this->nome = $_POST['nome'];
      $this->data_inicio = $_POST['data_inicio'];
      $this->data_fim = $_POST['data_fim'];
      $this->descricao = $_POST['descricao'];
      $this->status = $_POST['status'];
      $this->orcamento = $_POST['orcamento'];
      $this->financiador = $_POST['financiador'];

      $this->db->insert('erp_projetos',$this);

    }

    function save() {
      $this->nome = $_POST['nome'];
      $this->data_inicio = $_POST['data_inicio'];
      $this->data_fim = $_POST['data_fim'];
      $this->descricao = $_POST['descricao'];
      $this->status = $_POST['status'];
      $this->orcamento = $_POST['orcamento'];
      $this->financiador = $_POST['financiador'];

      $this->db->where('id', $_POST['id']);

      $this->db->update('erp_projetos',$this);

    }

    // Seleciona usuários do banco

    function select() {
        $query = $this->db->query('Select * from erp_projetos');

        return $query;
    }

    function selectAllSalas() {
      $query = $this->db->query('select * from erp_salas');

      return $query;

    }

    function selectByID($id) {
        $query = $this->db->query('Select * from erp_projetos
        where erp_projetos.id = '.$id);

        return $query;
    }

    function remove($id) {
      //LOGs
      $id_projeto = $id;
      $query = $this->db->query('Select nome from erp_projetos where id = "'. $id .'"');
      $data = $query->result();
      $nome = $data[0]->nome;
      $mensagem = "O projeto ".$nome." foi excluido";
      $acao = "Exclusão de projeto";
      $this->projetos_model->logs($mensagem, $id_projeto, $acao);
      //Final LOGs

      $query = $this->db->query('Delete from erp_projetos where id='.$id);

      return $query;
    }

    function logs($mensagem, $id_projeto, $acao){
        $this->data = date('Y-m-d H:i:s');
        $this->id_usuario = $_SESSION['id_usuario'];
        $this->mensagem = $mensagem;
        $this->local = 'projetos';
        $this->acao = $acao;
        $this->id_empreendimento = $id_projeto;

        $this->db->insert('erp_logs', $this);

        unset ($this->data, $this->usuario, $this->mensagem, $this->local, $this->acao, $this->id_empreendimento);
    }
}
