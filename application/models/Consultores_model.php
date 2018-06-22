<?php
class Consultores_model extends CI_Model {

    // Insere empreendimento

    function insert() {
      $this->nome = $_POST['nome'];
      //Calcula os minutos totais baseado na hora inserida
      $aux = explode(':',$_POST['horas_disponiveis']);
      $this->minutos_totais = ($aux[0]*60)+$aux[1];


      $this->db->insert('erp_consultores',$this);

    }

    function save() {
      $this->nome = $_POST['nome'];
      $this->funcao = $_POST['funcao'];

      $this->db->where('id', $_POST['id']);

      $this->db->update('erp_consultores',$this);

    }
    function select($id=0) {
        if($id==0){
          $query = $this->db->query("Select * from erp_consultores");
        }else{
          $query = $this->db->query("Select * from erp_consultores where id = ".$id);
        }


        return $query;
    }

    function remove($id) {
        $query = $this->db->query('Delete from erp_colaboradores where id='.$id);

        return $query;
    }

}
