<?php
class Pendencias_model extends CI_Model {

    // Insere pendencias no banco

    function insert() {
      $this->nome = $_POST['nome'];
      $this->situacao = $_POST['situacao'];
      $this->descricao = $_POST['descricao'];

      $this->load->model('usuarios_model');
      $query = $this->usuarios_model->selectBySession();
      $usuario = $query->result()[0];

      $this->id_usuario = $usuario->id_usuario;
      $this->db->insert('erp_pendencias',$this);
    }

    function select($id=0) {
        if($id==0){
          $query = $this->db->query('Select * from erp_pendencias');
        }else{
          $query = $this->db->query("Select * from erp_pendencias where erp_pendencias.id = ".$id);
        }

        return $query;
    }

}
