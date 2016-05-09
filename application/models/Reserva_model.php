<?php
class Reserva_model extends CI_Model {

    // Seleciona usuários do banco

    function selectSala() {
        $query = $this->db->get_where('erp_salas', array('nr_sala' => $_POST['nrSala']), 1);

        return $query;
    }

    function efetuaReserva() {
        //verifica se existe algum dos horários já marcado
        $possivelReservar = 1;
        foreach ($_POST['horario'] as $horarios) {
          $this->db->where('dia', $_POST['data']);
          $this->db->where('id_sala', $_POST['id_sala']);
          $this->db->where('horario', $horarios);
          $query = $this->db->get('erp_reservas_salas');
          if($query->num_rows()!=0){
            $possivelReservar = 0;
          }
        }
        if($possivelReservar){
          //se caso for possível reservar, efetua a reserva
          $this->load->model('usuarios_model');
          $query = $this->usuarios_model->selectBySession();
          $usuario = $query->result()[0];
          foreach ($_POST['horario'] as $horarios) {
            $data = array(
              'id_sala' => $_POST['id_sala'],
              'id_usuario' => $usuario->id_usuario,
              'horario' => $horarios,
              'dia' => $_POST['data']
            );
            $this->db->insert('erp_reservas_salas',$data);
          }
        }

        return $possivelReservar;
    }

    function verificaReserva($dataIni = 0,$dataFim = 0) {
        if($dataIni == 0 && $dataFim == 0){
          $week = date('W', strtotime(date("Y-m-d")));
          $year = date('Y', strtotime(date("Y-m-d")));
        }else{
          $week = date('W', strtotime($dataIni));
          $year = date('Y', strtotime($dataFim));
        }
        $from = date("Y-m-d", strtotime("{$year}-W{$week}-1"));
        $to = date("Y-m-d", strtotime("{$year}-W{$week}-5"));
        $this->db->where('dia >=', $from);
        $this->db->where('dia <=', $to);
        $query = $this->db->get('erp_reservas_salas');

        return $query;
    }

}
