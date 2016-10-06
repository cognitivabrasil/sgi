<?php
class Pendencias_model extends CI_Model {

    // Insere pendencias no banco

    function insert() {
      $this->nome = $_POST['nome'];
      $this->situacao = $_POST['situacao'];
      $this->descricao = $_POST['descricao'];
      $this->data_modificada = date('Y-m-d');

      $this->load->model('usuarios_model');
      $query = $this->usuarios_model->selectBySession();
      $usuario = $query->result()[0];


      $this->id_usuario = $usuario->id_usuario;
      $this->db->insert('erp_pendencias',$this);
    }

    function save() {
      $this->nome = $_POST['nome'];
      $this->situacao = $_POST['situacao'];
      $this->descricao = $_POST['descricao'];
      $this->data_modificada = date('Y-m-d');
      $this->id_usuario = $_POST['usuario'];

      $this->db->where('id', $_POST['id']);
      $this->db->update('erp_pendencias',$this);
    }

    function select($id=0) {
        if($id==0){
          $query = $this->db->query('Select * from erp_pendencias');
        }else{
          $query = $this->db->query("Select * from erp_pendencias where erp_pendencias.id = ".$id);
        }

        return $query;
    }

    function selectEmpreendimento($idUsuario) {

      $sql = 'Select erp_empreendimentos.nome_fantasia from erp_empreendimentos
      inner join erp_usuarios on erp_usuarios.id_empreendimento = erp_empreendimentos.id
      where erp_usuarios.id_usuario = '.$idUsuario;

      $query = $this->db->query($sql);

      return $query;
    }

}
