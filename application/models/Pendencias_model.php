<?php
class Pendencias_model extends CI_Model {

    // Insere pendencias no banco

    function getUnread(){
      $query = $this->db->query('Select count(*) as count from erp_pendencias where visto = 0');

      return $query->result()[0]->count;
    }

    function zeraUnread(){
      $query = $this->db->query('UPDATE erp_pendencias set visto = 1 where visto = 0');
    }

    function insert() {
      $this->nome = $_POST['nome'];
      $this->tipo = $_POST['tipo'];
      $this->situacao = $_POST['situacao'];
      $this->descricao = $_POST['descricao'];
      $this->data_modificada = date('Y-m-d');
      $this->visto = 0;
      $this->empresa = $_POST['empresa'];
      $this->id_consultores = $_POST['consultor'];

      $this->load->model('usuarios_model');
      $query = $this->usuarios_model->selectBySession();
      $usuario = $query->result()[0];

      if($this->session->userdata('id_acesso')==1){
        $this->empresa = $_POST['empresa'];
      }

      $this->id_usuario = $usuario->id_usuario;
      $this->db->insert('erp_pendencias',$this);

      unset ($this->nome, $this->tipo, $this->situacao, $this->descricao, $this->data_modificada, $this->visto, $this->empresa, $this->id_usuario, $this->id_consultores);

      //LOGs
      $query = $this->db->query('select * from erp_pendencias where id = (select max(id) from erp_pendencias)');
      $data = $query->result();
      $id_pendencia = $data[0]->id;
      $id_empreendimento = $_POST['empresa'];
      switch ($_POST['tipo']) {
        case 1:
          $tipo = "consultoria";
          break;
        case 2:
          $tipo = "Participação em eventos";
          break;
        case 3:
          $tipo = "Espaço fisíco";
          break;
        case 4:
          $tipo = "Outros";
          break;
      }
      switch ($_POST['situacao']) {
        case 1:
          $situacao = "Enviada";
          break;
        case 2:
          $situacao = "Em andamento";
          break;
        case 3:
          $situacao = "Resolvida";
          break;
        case 4:
          $situacao = "Cancelada";
          break;
      }
      $mensagem = "Foi solicitado por ". $_POST['nome']. " serviço de ". $tipo. "    Situacao: ".$situacao;
      $acao = 'Requisição de serviço';
      $this->pendencias_model->logs($mensagem, $id_empreendimento, $id_pendencia,$acao);
      //Final LOGs
    }

    function save() {
      $this->nome = $_POST['nome'];
      $this->tipo = $_POST['tipo'];
      $this->situacao = $_POST['situacao'];
      $this->descricao = $_POST['descricao'];
      $this->data_modificada = date('Y-m-d');
      $this->id_usuario = $_POST['usuario'];

      $this->db->where('id', $_POST['id']);
      $this->db->update('erp_pendencias',$this);
    }

    function save_atualiza() {
      //LOGs
       $id_empreendimento = 1;
       $id_pendencia =  $_POST['id_pendencia'];
       switch ($_POST['situacao']) {
        case 1:
          $situacao = "Enviada";
          break;
        case 2:
          $situacao = "Em andamento";
          break;
        case 3:
          $situacao = "Resolvida";
          break;
        case 4:
          $situacao = "Cancelada";
          break;
      }

       $mensagem = "Retorno do pedido ".$_POST['id_pendencia'].": ". $_POST['descricao']. "    Situacao: ".$situacao;
       $acao = 'Retorno de requisição';
       $this->pendencias_model->logs($mensagem, $id_empreendimento, $id_pendencia,$acao);
      //Final LOGs

      $this->id_pendencia = $_POST['id_pendencia'];
      $this->situacao = $_POST['situacao'];
      $this->descricao = $_POST['descricao'];
      $this->data_modificada = date('Y-m-d');
      $this->id_usuario = $_POST['usuario'];

      $this->db->insert('erp_pendencia_dados',$this);

      $this->pendencias_model->zeraUnread();
    }

    function verifica_resolvida($id){

      $query = $this->db->query('Select count(*) as count from erp_pendencia_dados where (erp_pendencia_dados.situacao=3 or erp_pendencia_dados.situacao=4) and erp_pendencia_dados.id_pendencia = '.$id);

      return $query->result()[0]->count;
    }

    function select($id=0) {
        if($id==0){
          $query = $this->db->query('Select * from erp_pendencias');
        }else{
          $query = $this->db->query("Select * from erp_pendencias where erp_pendencias.id = ".$id);
        }

        return $query;
    }

    function select_atualizacoes($id=0) {

        $query = $this->db->query("Select * from erp_pendencia_dados where erp_pendencia_dados.id_pendencia = ".$id);

        return $query;
    }

    function selectEmpreendimento($idUsuario) {

      $sql = 'Select erp_empreendimentos.nome_fantasia, erp_empreendimentos.nome from erp_empreendimentos
      inner join erp_usuarios on erp_usuarios.id_empreendimento = erp_empreendimentos.id
      where erp_usuarios.id_usuario = '.$idUsuario;

      $query = $this->db->query($sql);

      return $query;
    }

    function logs($mensagem, $id_empreendimento, $id_pendencia, $acao){
        $this->data = date('Y-m-d H:i:s');
        $this->usuario = $_SESSION['id_usuario'];
        $this->mensagem = $mensagem;
        $this->local = 'pendencias';
        $this->acao = $acao;
        $this->id_empreendimento = $id_empreendimento;
        $this->id_pendencia = $id_pendencia;

        $this->db->insert('erp_logs', $this);

        unset ($this->data, $this->usuario, $this->mensagem, $this->local, $this->acao, $this->id_empreendimento, $this->id_pendencia);
    }
}
