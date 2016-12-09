<?php
class Releasing_model extends CI_Model {

    function getUnread(){
      $query = $this->db->query('Select count(*) as count from erp_releasing where visto = 0');

      return $query->result()[0]->count;
    }

    function zeraUnread(){
      $query = $this->db->query('UPDATE erp_releasing set visto = 1 where visto = 0');
    }

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

    function save() {
      $this->nome = $_POST['nome'];
      $this->id_empreendimento = $_POST['empreendimento'];
      $this->data = $_POST['data'];
      $this->descricao = $_POST['descricao'];
      $this->anexo = $_POST['imagem'];

      $this->db->where('id', $_POST['id']);

      $this->db->update('erp_releasing',$this);

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
