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
      //Insere na tabela de pendencias
      $this->nome = $_POST['nome'];
      $this->tipo = $_POST['tipo'];
      $this->situacao = $_POST['situacao'];
      $this->descricao = $_POST['descricao'];
      $this->data_modificada = date('Y-m-d');
      $this->visto = 0;
      $this->empresa = $_SESSION['id_empreendimento'];

      $this->load->model('usuarios_model');
      $query = $this->usuarios_model->selectBySession();
      $usuario = $query->result()[0];

        if($this->session->userdata('id_acesso')==1){
          $this->empresa = $_POST['empresa'];
        }

      $this->id_usuario = $usuario->id_usuario;
      $this->db->insert('erp_pendencias',$this);

        unset ($this->nome, $this->tipo, $this->situacao, $this->descricao, $this->data_modificada, $this->visto, $this->empresa, $this->id_usuario);

          //seleciona id pendencia
          $query = $this->db->query('select * from erp_pendencias where id = (select max(id) from erp_pendencias)');
          $data = $query->result();
          $id_pendencia = $data[0]->id;

      //Insere caso tipo = consultoria na tabela de pendencias_consultorias
      if( $_POST['tipo'] == 1)
      {
        $this->id_pendencias = $id_pendencia;
        $this->id_consultor = $_POST['consultor'];
        //Calcula os minutos totais baseado na hora inserida
        $aux = explode(':',$_POST['tempo']);
        $tempo_consultoria =  ($aux[0]*60)+$aux[1];
        $this->tempo_consultoria = $tempo_consultoria;
        $this->aprovada = 0;

        $this->db->insert('erp_pendencias_consultoria',$this);

          unset ($this->id_consultor, $this->tempo_consultoria, $this->aprovada,$this->id_pendencias);

          $id_consultor = $_POST['consultor'];
      }

      //LOGs
      if( $_POST['tipo'] == 1)
      {
        $id_empreendimento =  $_SESSION['id_empreendimento'];
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
        $mensagem = "Foi solicitado por ". $_POST['nome']. " serviço de consultoria <br> Tempo da consultoria:".$tempo_consultoria."<br>    Situacao: ".$situacao;
        $acao = 'Requisição de consultoria';
        $id_consultor =$_POST['consultor'];
        $this->pendencias_model->logs($mensagem, $id_empreendimento, $id_pendencia, $acao, $id_consultor);
      } 
      else
      {
        $id_empreendimento = $_POST['empresa'];;;
          switch ($_POST['tipo']) {
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
        $id_consultor = 0;
        $this->pendencias_model->logs($mensagem, $id_empreendimento, $id_pendencia, $acao, $id_consultor);
      }
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

       $mensagem = "Retorno do pedido : ". $_POST['descricao']. "    Situacao: ".$situacao;
       $acao = 'Retorno de requisição';
       $id_consultor = 0;
       $this->pendencias_model->logs($mensagem, $id_empreendimento, $id_pendencia, $acao, $id_consultor);
      //Final LOGs

        $this->id_pendencia = $_POST['id_pendencia'];
        $this->situacao = $_POST['situacao'];
        $this->descricao = $_POST['descricao'];
        $this->data_modificada = date('Y-m-d');
        $this->id_usuario = $_POST['usuario'];

        $this->db->insert('erp_pendencia_dados',$this);
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
          $this->pendencias_model->zeraUnread();
        }

        return $query;
    }

    function select_consultorias($id=0) {

          $query = $this->db->query("Select * from erp_pendencias_consultoria where erp_pendencias_consultoria.id_pendencias = ".$id);
        
        return $query;
    }

    function select_atualizacoes($id=0) {

        $query = $this->db->query("Select * from erp_pendencia_dados where erp_pendencia_dados.id_pendencia = ".$id);

        return $query;
    }

    function selectEmpreendimento() {

      $sql = 'Select erp_empreendimentos.nome_fantasia, erp_empreendimentos.nome from erp_empreendimentos
      inner join erp_usuarios on erp_usuarios.id_empreendimento = erp_empreendimentos.id
      where erp_usuarios.id_usuario = 1';

      $query = $this->db->query($sql);

      return $query;
    }

    function logs($mensagem, $id_empreendimento, $id_pendencia, $acao, $id_consultor){
        $this->data = date('Y-m-d H:i:s');
        $this->usuario = $_SESSION['username'];
        $this->mensagem = $mensagem;
        $this->local = 'pendencias';
        $this->acao = $acao;
        $this->id_empreendimento = $id_empreendimento;
        $this->id_pendencia = $id_pendencia;
        $this->id_consultor = $id_consultor;

        $this->db->insert('erp_logs', $this);

          unset ($this->data, $this->usuario, $this->mensagem, $this->local, $this->acao, $this->id_empreendimento, $this->id_pendencia, $this->id_consultor);
    }

    function aprova_consultoria()
    {
            $this->id_consultor = $_POST['consultor'];
            $aux = explode(':',$_POST['tempo']);
            $tempo_consultoria =  ($aux[0]*60)+$aux[1];
            $this->tempo_consultoria = $tempo_consultoria;
            $this->aprovada = $_POST['aprovar'];
            $this->usuario_aprova = $_SESSION['username'];

            $this->db->where('id_pendencias', $_POST['id']);
            $this->db->update('erp_pendencias_consultoria',$this);

            unset ($this->aprovada, $this->usuario_aprova, $this->tempo_consultoria, $this->id_consultor);

            //seleciona id consultor
            $query = $this->db->query('select id_consultor from erp_pendencias_consultoria where id_pendencias ='.$_POST['id']);
            $data = $query->result();
            $id_consultor = $data[0]->id_consultor;
            //função que muda hora do consultor            
            $this->pendencias_model->atualiza_horas($id_consultor); 

           //LOGs
            $id_empreendimento = $_SESSION['id_empreendimento'];
            $id_pendencia = $_POST['id'];
            if($_POST['aprovar'] == 1)
            {
            $mensagem = "Foi aprovada por ".$_SESSION['username']." o pedido de consultoria ".$_POST['id'];
            }
            else
            {
            $mensagem = "Foi reprovada por ".$_SESSION['username']." o pedido de consultoria ".$_POST['id'];
            }
            $acao = 'Retorno de pedido de consultoria';
            $this->pendencias_model->logs($mensagem, $id_empreendimento, $id_pendencia, $acao, $id_consultor);
    }

    function atualiza_horas($id_consultor)
    {
        $query = $this->db->query('select erp_consultores.minutos_totais -  sum(erp_pendencias_consultoria.tempo_consultoria) as atualizacao_minutos from erp_pendencias_consultoria inner join erp_consultores on erp_pendencias_consultoria.id_consultor = erp_consultores.id where erp_pendencias_consultoria.aprovada = 1 and erp_consultores.id ='.$id_consultor);
      
        $data = $query->result();
        $atualizacao_minutos = $data[0]->atualizacao_minutos; 

        $this->minutos_disponiveis = $atualizacao_minutos;

        $this->db->where('id', $id_consultor);
        $this->db->update('erp_consultores',$this);

        unset ($this->minutos_disponiveis);

    }
}
