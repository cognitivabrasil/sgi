<?php
class Releasing_model extends CI_Model {

    // Insere empreendimento

    function insert() {
      $this->nome = $_POST['nome'];
      $this->id_empreendimento = $_POST['empreendimento'];
      $this->data = $_POST['data'];
      $this->descricao = $_POST['descricao'];

      //file upload
      $config['upload_path'] = './uploads/';
      $config['allowed_types'] = 'gif|jpg|png';
  		$config['max_size']	= '0';
  		$config['max_width']  = '0';
  		$config['max_height']  = '0';

  		$this->load->library('upload', $config);

      if ( ! $this->upload->do_upload('imagem'))
  		{
  			$error = array('error' => $this->upload->display_errors());

  			print_r($error);
  		}
  		else
  		{
  			$data = array('upload_imagem' => $this->upload->data());
        $this->anexo = $data['upload_imagem']['full_path'];
  		}

      $this->db->insert('erp_releasing',$this);

    }

    // Seleciona usuários do banco

    function select() {
        $query = $this->db->query('Select * from erp_releasing');

        return $query;
    }

    function selectAllSalas() {
      $query = $this->db->query('select * from erp_salas');

      return $query;

    }

    function selectByID($id) {
        $query = $this->db->query('Select * from erp_releasing
        where erp_releasing.id = '.$id);

        return $query;
    }

}
