<?php
class Extras_model extends CI_Model {

    // Insere empreendimento

    function salva_consultores($lista) {
      $count=0;
      foreach ($lista->nome as $row) {
        $this->nome = $lista->nome[$count];
        $this->empresa = $lista->empresa[$count];
        $this->telefone = $lista->fone[$count];
        $this->site = "";
        $this->email = $lista->email[$count];
        $this->atuacao = $lista->atuacao[$count];
        $this->eixo_cerne = 0;
        $this->db->insert('erp_servicos',$this);
        $count++;
      }

    }

}
