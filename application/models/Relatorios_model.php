<?php
class Relatorios_model extends CI_Model {

    function lista($id) {
        $query = $this->db->query("Select * from erp_logs where id_empreendimento = ".$id);
        
        return $query;
    }

    function selectStatus($id) {
		$local= 'empreendimentos';
        $query = $this->db->query('Select * from erp_logs where local = "'.$local.'" and id_empreendimento ='.$id);
        return $query;
    }

     function selectServicos($id) {
     	$local= 'pendencias';
        $acao = 'Requisição de serviço';
        $query = $this->db->query('Select * from erp_logs where local = "'.$local.'"and acao ="'.$acao.'"and id_empreendimento ='.$id);
        
        return $query;
    }

     function select_consultorias_emp($id) {
            $local= 'pendencias';
            $acao = 'Retorno de pedido de consultoria';
            $query = $this->db->query('Select * from erp_logs where id_consultor != 0 and id_empreendimento ='.$id);
            
            return $query;
        }


     function selectPendencia($id) {
        $local= 'pendencias';
        $query = $this->db->query('Select * from erp_logs where id_pendencia ='.$id);
        
        return $query;
    }
}
