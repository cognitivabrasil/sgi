<?php
class \Patrimonios_model extends CI_Model {

    // Insere empreendimento

    function insert() {
      $this->nome = $_POST['nome'];
      $this->nrpatrimonio = $_POST['nrpatrimonio'];
      $this->vinculo = $_POST['vinculo'];
      $this->razao_social = $_POST['rs'];
      $this->site = $_POST['site'];
      $this->responsavel = $_POST['responsavel'];
      $this->responsavel_email = $_POST['emailresponsavel'];
      $this->cpf_cnpj = $_POST['cpfcnpj'];
      $this->descricao = $_POST['descricao'];

      //file upload
      $config['upload_path'] = './uploads/';
      $config['allowed_types'] = 'gif|jpg|png';
  		$config['max_size']	= '0';
  		$config['max_width']  = '0';
  		$config['max_height']  = '0';

  		$this->load->library('upload', $config);

  		if ( ! $this->upload->do_upload('logo'))
  		{
  			$error = array('error' => $this->upload->display_errors());

  			print_r($error);
  		}
  		else
  		{
  			$data = array('upload_logo' => $this->upload->data());
        $this->logo = $data['upload_logo']['full_path'];
  		}

      if ( ! $this->upload->do_upload('canvas'))
  		{
  			$error = array('error' => $this->upload->display_errors());

  			print_r($error);
  		}
  		else
  		{
  			$data = array('upload_canvas' => $this->upload->data());
        $this->canvas = $data['upload_canvas']['full_path'];
  		}

      $this->db->insert('erp_empreendimentos',$this);
      $idEmpreendimento = $this->db->insert_id();

      $i = 0;
      $produto = new stdClass();
      foreach($_POST['nome_produto'] as $nome_produto){
        $produto->nome = $nome_produto;
        $produto->id_empreendimento = $idEmpreendimento;
        $produto->descricao = $_POST['descricao_produto'][$i];
        $this->db->insert('erp_empreendimentos_ps',$produto);
        $i++;
      }

      $i = 0;
      $contrato = new stdClass();
      $files = $_FILES['contrato'];
      foreach($_POST['assinatura_contrato'] as $assinatura_contrato){
        $aux = explode('/',$assinatura_contrato);
        $data_assinatura = $aux[2]."-".$aux[1]."-".$aux[0];
        $contrato->data = $data_assinatura;                
        $contrato->id_empreendimento = $idEmpreendimento;
        $_FILES['contrato']['allowed_types'] = 'gif|jpg|png|pfd';
        $_FILES['contrato']['name'] = $files['name'][$i];
        $_FILES['contrato']['type'] = $files['type'][$i];
        $_FILES['contrato']['tmp_name'] = $files['tmp_name'][$i];
        $_FILES['contrato']['error'] = $files['error'][$i];
        $_FILES['contrato']['size'] = $files['size'][$i];

        $this->upload->initialize($config);
        if ($this->upload->do_upload('contrato'))
        {
          $data = array('contrato' => $this->upload->data());
          $contrato->contrato = $data['contrato']['full_path'];
        }
        else
        {
          $error = array('error' => $this->upload->display_errors());

    			print_r($error);
        }
        $this->db->insert('erp_empreendimentos_contrato',$contrato);
        $i++;
      }
    }

    //Atualiza usuário

    function update () {
      $this->Date =time();
      //$this->db->update('entries',$this, array('id',$_POST[]));
    }

    // Seleciona usuários do banco

    function select($id=0) {
        if($id==0){
          $query = $this->db->query('Select emp.*, count(*) as nr from erp_colaboradores col, erp_empreendimentos emp where col.id_empreendimento = emp.id group by id_empreendimento');
        }else{
          $query = $this->db->query("Select emp.*, count(*) as nr from erp_colaboradores col, erp_empreendimentos emp where col.id_empreendimento = emp.id and emp.id = ".$id." group by id_empreendimento");
        }

        return $query;
    }
    function select_weak_entities($id,$type) {
      if($type == 'ps'){
        $query = $this->db->query("Select erp_empreendimentos_ps.* from erp_empreendimentos
  inner join erp_empreendimentos_ps on erp_empreendimentos.id = erp_empreendimentos_ps.id_empreendimento
  where erp_empreendimentos.id = 15");
      }else{
        $query = $this->db->query("Select erp_empreendimentos_contrato.* from erp_empreendimentos
  inner join erp_empreendimentos_contrato on erp_empreendimentos.id = erp_empreendimentos_contrato.id_empreendimento
  where erp_empreendimentos.id = 15");
      }
      return $query;
    }

}
