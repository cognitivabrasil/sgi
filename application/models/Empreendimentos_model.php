<?php
class Empreendimentos_model extends CI_Model {

    // Insere empreendimento

    function insert() {
      $this->nome = $_POST['nome'];
      //$this->nome_fantasia = $_POST['fantasia'];
      $this->vinculo = $_POST['vinculo'];
      //$this->razao_social = $_POST['rs'];
      //$this->site = $_POST['site'];
      $this->responsavel = $_POST['responsavel'];
      //$this->responsavel_email = $_POST['emailresponsavel'];
      $this->cpf_cnpj = $_POST['cpfcnpj'];
      //$this->descricao = $_POST['descricao'];


      $this->db->insert('erp_empreendimentos',$this);
      /*$idEmpreendimento = $this->db->insert_id();

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
      }*/

      unset ($this->nome, $this->vinculo, $this->responsavel, $this->cpf_cnpj);

      //LOGs
      $query = $this->db->query('select * from erp_empreendimentos where id = (select max(id) from erp_empreendimentos)');
      $data = $query->result();
      $id_empreendimento = $data[0]->id;
      switch ($_POST['vinculo']) {
        case 1:
          $vinculo = "Pré Incubada";
          break;
        case 2:
          $vinculo = "Incubada";
          break;
        case 3:
          $vinculo = "Parque";
          break;
        case 4:
          $vinculo = "Outros";
          break;
      }
      $mensagem = "Foi criada uma nova empresa ".$_POST['nome']." com o vínculo ". $vinculo;
      $acao = "Inserção de empreendimento";
      $this->empreendimentos_model->logs($mensagem, $id_empreendimento, $acao);
      //Final LOGs
    }

    function remove($id) {
      //LOGs
      $id_empreendimento = $id;
      $query = $this->db->query('Select nome from erp_empreendimentos where id = "'. $id .'"');
      $data = $query->result();
      $nome = $data[0]->nome;
      $mensagem = "A empresa ".$nome." foi excluida";
      $acao = "Exclusão de empreendimento";
      $this->empreendimentos_model->logs($mensagem, $id_empreendimento, $acao);
      //Final LOGs

        $query = $this->db->query('Delete from erp_empreendimentos where id='.$id);

        return $query;
    }

    function save() {
      //LOGs
      $id_empreendimento =  $_POST['id'];
      $query = $this->db->query('Select vinculo from erp_empreendimentos where id = "'. $id_empreendimento .'"');
      $data = $query->result();
      $vinculo_data = $data[0]->vinculo;

      if(!$vinculo_data){
        $vinculo_data = 0;
      }

      if ($vinculo_data != $_POST['vinculo'])
        {
          switch ($_POST['vinculo']) {
        case 1:
          $vinculo = "Pré Incubada";
          break;
        case 2:
          $vinculo = "Incubada";
          break;
        case 3:
          $vinculo = "Parque";
          break;
        case 4:
          $vinculo = "Outros";
          break;
        }

        switch ($vinculo_data) {
        case 1:
          $vinculo_antigo = "Pré Incubada";
          break;
        case 2:
          $vinculo_antigo = "Incubada";
          break;
        case 3:
          $vinculo_antigo = "Parque";
          break;
        case 4:
          $vinculo_antigo = "Outros";
          break;
        default:
          $vinculo_antigo = "Sem Vínculo";
        }

          $acao = 'Alteração no vinculo da empresa';
          $mensagem = "O vínculo da empresa ".$_POST['nome']." foi alterado de ". $vinculo_antigo  ." para ".$vinculo;
          $this->empreendimentos_model->logs($mensagem, $id_empreendimento,$acao);
        }
      //Final LOGs

      $this->nome = $_POST['nome'];
      $this->nome_fantasia = $_POST['fantasia'];
      $this->vinculo = $_POST['vinculo'];
      $this->razao_social = $_POST['rs'];
      $this->site = $_POST['site'];
      $this->responsavel = $_POST['responsavel'];
      $this->responsavel_email = $_POST['emailresponsavel'];
      $this->cpf_cnpj = $_POST['cpfcnpj'];
      $this->descricao = $_POST['descricao'];

      $this->logo = $_POST['logo_old'];
      $this->canvas = $_POST['canvas_old'];

      //inicio uploads
      $config['upload_path'] = './uploads/';
      $config['allowed_types'] = 'gif|jpg|png';
  		$config['max_size']	= '0';
  		$config['max_width']  = '0';
  		$config['max_height']  = '0';

  	  $this->load->library('upload', $config);

  		if (!$this->upload->do_upload('logo')){
  			$error = array('error' => $this->upload->display_errors());
  			$upload_logo = 'erro';
  		}else{
  			$data = array('upload_logo' => $this->upload->data());
        $this->logo = $data['upload_logo']['full_path'];
  		}

      if (!$this->upload->do_upload('canvas')){
  			$error = array('error' => $this->upload->display_errors());
  			$upload_canvas = 'erro';
  		}else{
  			$data = array('upload_canvas' => $this->upload->data());
        $this->canvas = $data['upload_canvas']['full_path'];
  		}
      //Final uploads

      $this->db->where('id', $_POST['id']);

      $this->db->update('erp_empreendimentos',$this);
    }

    //Atualiza usuário

    function update () {
      $this->Date =time();
      //$this->db->update('entries',$this, array('id',$_POST[]));
    }

    function select($id=0) {
        if($id==0){
          $query = $this->db->query('Select emp.*, count(col.id) as nr from erp_empreendimentos emp LEFT JOIN erp_colaboradores col on col.id_empreendimento = emp.id where emp.id<>1 group by emp.id');
        }else{
          $query = $this->db->query("Select emp.*, count(col.id) as nr from erp_empreendimentos emp LEFT JOIN erp_colaboradores col on col.id_empreendimento = emp.id where emp.id = ".$id." and emp.id<>1 group by emp.id");
        }

        return $query;
    }

    function selectByName($name) {
        $query = $this->db->query('Select * from erp_empreendimentos emp where emp.id<>1 and emp.nome = "'.$name.'"');

        return $query;
    }

    function selectColaboradorEmpreendimento($id) {

        $query = $this->db->query("Select erp_empreendimentos.* from erp_empreendimentos INNER JOIN erp_colaboradores on erp_colaboradores.id_empreendimento = erp_empreendimentos.id where erp_colaboradores.id = ".$id);

        return $query;
    }

    function select_weak_entities($id,$type) {
      switch ($type) {
        case 'ps':
          $query = $this->db->query("Select erp_empreendimentos_ps.* from erp_empreendimentos
    inner join erp_empreendimentos_ps on erp_empreendimentos.id = erp_empreendimentos_ps.id_empreendimento
    where erp_empreendimentos.id =".$id);
          break;
        case 'ct':
          $query = $this->db->query("Select erp_empreendimentos_contrato.* from erp_empreendimentos
    inner join erp_empreendimentos_contrato on erp_empreendimentos.id = erp_empreendimentos_contrato.id_empreendimento
    where erp_empreendimentos.id =".$id);
          break;
        case 'sl':
          $query = $this->db->query("Select erp_salas.* from erp_salas
    inner join erp_salas_emp on erp_salas.id = erp_salas_emp.id_sala
    where erp_salas_emp.id_emp =".$id);
          break;
      }

      return $query;
    }

    function select_weak_entities_by_id($id,$type) {
      switch ($type) {
        case 'ps':
          $query = $this->db->query("Select erp_empreendimentos_ps.* from erp_empreendimentos
    inner join erp_empreendimentos_ps on erp_empreendimentos.id = erp_empreendimentos_ps.id_empreendimento
    where erp_empreendimentos_ps.id =".$id);
          break;
        case 'ct':
          $query = $this->db->query("Select erp_empreendimentos_contrato.* from erp_empreendimentos
    inner join erp_empreendimentos_contrato on erp_empreendimentos.id = erp_empreendimentos_contrato.id_empreendimento
    where erp_empreendimentos_contrato.id =".$id);
          break;
        case 'sl':
          $query = $this->db->query("Select erp_salas.* from erp_salas
    inner join erp_salas_emp on erp_salas.id = erp_salas_emp.id_sala
    where erp_salas_emp.id_emp =".$id);
          break;
      }

      return $query;
    }

    function aloca_sala() {
      $this->id_sala = $_POST['sala'];
      $this->id_emp = $_POST['id_emp'];
      $this->timecreated = date('Y-m-d');

      $this->db->insert('erp_salas_emp',$this);
    }

    function remove_sala($id_sala, $id){
      $query = $this->db->query('Delete from erp_salas_emp where id_emp='.$id.' and id_sala='.$id_sala);

      return $query;
    }

    function logs($mensagem, $id_empreendimento, $acao){
        $this->data = date('Y-m-d H:i:s');
        $this->usuario = $_SESSION['id_usuario'];
        $this->mensagem = $mensagem;
        $this->local = 'empreendimentos';
        $this->acao = $acao;
        $this->id_empreendimento = $id_empreendimento;

        $this->db->insert('erp_logs', $this);

        unset ($this->data, $this->usuario, $this->mensagem, $this->local, $this->acao, $this->id_empreendimento);
    }
}
