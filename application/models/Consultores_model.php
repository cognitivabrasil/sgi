<?php
class Consultores_model extends CI_Model {

    // Insere empreendimento

    function insert() {
      $this->nome = $_POST['nome'];
      $this->contato = $_POST['contato'];
      $this->area_atuacao = $_POST['area_atuacao'];
      //Calcula os minutos totais baseado na hora inserida
      $aux = explode(':',$_POST['horas_disponiveis']);
      $this->minutos_totais = ($aux[0]*60)+$aux[1];
      $this->minutos_disponiveis = $this->minutos_totais;


      $this->db->insert('erp_consultores',$this);

    }

    function save() {
      $this->nome = $_POST['nome'];
      $this->contato = $_POST['contato'];
      $this->area_atuacao = $_POST['area_atuacao'];

      //Calcula os minutos totais baseado na hora inserida
      $aux = explode(':',$_POST['horas_totais']);
      $this->minutos_totais = ($aux[0]*60)+$aux[1];

      $aux2 = explode(':',$_POST['horas_disponiveis']);
      $this->minutos_disponiveis = ($aux2[0]*60)+$aux2[1];

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

    function selectByID($id) {
        $query = $this->db->query("Select * from erp_consultores where id = ".$id);

        return $query;
    }

    function selectDisponivel(){
        $query = $this->db->query("select * from erp_consultores where minutos_disponiveis != ".'00');

        return $query;

    }

    function remove($id) {
        $query = $this->db->query('Delete from erp_consultores where id='.$id);

        return $query;
    }

    function select_consultorias($id) {

        $query = $this->db->query('select * from erp_logs where id_consultor ='. $id);

        return $query;
    }

}
