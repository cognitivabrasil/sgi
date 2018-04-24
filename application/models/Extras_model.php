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
        //echo "insert into erp_servicos(nome,empresa,site,email,telefone,atuacao,eixo_cerne) values('".$this->nome."','".$this->empresa."','".$this->site."','".$this->email."','".$this->telefone."','".$this->atuacao."',".$this->eixo_cerne.");<br>";
        $this->db->insert('erp_servicos',$this);
        $count++;
      }

    }

    function salva_csv_patrimonio($lista) {
      $count=0;
      foreach ($lista->nome as $row) {
        $this->load->model('patrimonios_model');
        $patrimonio = $this->patrimonios_model->select_relatorio('nr',$lista->pat[$count]);
        if(count($patrimonio->result())==0){
          //Patrimônio novo
          $this->nome = $lista->nome[$count];
          $this->descricao = $lista->descricao[$count];
          $this->nrpatrimonio = $lista->pat[$count];
          $this->responsavel = $lista->emp[$count];
          //$patid = $this->db->insert('erp_patrimonios',$this);
          $patid = 4;

          $this->load->model('salas_model');
          $salas = $this->salas_model->selectByNumber($lista->sala[$count]);
          $idSala = $salas->result()[0]->id;
          $this->load->model('empreendimentos_model');
          $empresa = $this->empreendimentos_model->selectByName($lista->emp[$count]);
          $idEmpresa = $empresa->result()[0]->id;
          $alocado = new stdClass();
          $alocado->id_patrimonio = $patid;
          $alocado->id_sala = $idSala;
          $alocado->data_atribuicao = $lista->data[$count];
          $alocado->id_emp = $idEmpresa;
          print_r($alocado);
          //$this->db->insert('erp_patrimonio_sala_emp',$this);
        }else {
          if(count($patrimonio->result())==2){
            //Patrimônio duplicado no banco
          }else{
            if($lista->sala[$count]!=""){
              $result = $patrimonio->result();
              //Patimonio existente no banco apenas atualizar
              //$this->db->query('UPDATE erp_patrimonios set responsavel = "'.$lista->pat[$count].'" where id = '.$result[0]->id);

              $this->load->model('patrimonios_model');
              //$this->patrimonios_model->remove_alocacao($result[0]->id);

              $this->load->model('salas_model');
              $salas = $this->salas_model->selectByNumber($lista->sala[$count]);
              $idSala = $salas->result()[0]->id;
              $this->load->model('empreendimentos_model');
              $empresa = $this->empreendimentos_model->selectByName($lista->emp[$count]);
              $idEmpresa = $empresa->result()[0]->id;
              $alocado = new stdClass();
              $alocado->id_patrimonio = $result[0]->id;
              $alocado->id_sala = $idSala;
              $alocado->data_atribuicao = $lista->data[$count];
              $alocado->id_emp = $idEmpresa;
              print_r($alocado);
              echo "<br>";
              $this->db->insert('erp_patrimonio_sala_emp',$alocado);
            }
          }
        }


        //Atribuição
        $this->sala = $lista->sala[$count];
        $this->data = $lista->data[$count];
        //echo "insert into erp_servicos(nome,empresa,site,email,telefone,atuacao,eixo_cerne) values('".$this->nome."','".$this->empresa."','".$this->site."','".$this->email."','".$this->telefone."','".$this->atuacao."',".$this->eixo_cerne.");<br>";
        //$this->db->insert('erp_servicos',$this);
        $count++;
      }

    }

}
