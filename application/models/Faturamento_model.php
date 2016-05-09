<?php
class Faturamento_model extends CI_Model {

    // Insere empreendimento

    function insert() {
      $this->nome = $_POST['nome'];
      $this->funcao = $_POST['funcao'];
      $this->vinculo = $_POST['vinculo'];
      $this->email = $_POST['email'];
      $this->entrada = '';
      if($_POST['entrada']!=''){
        $aux = explode('/',$_POST['entrada']);
        $this->entrada = $aux[2]."-".$aux[1]."-".$aux[0];
      }
      $this->saida = '';
      if($_POST['saida']!=''){
        $aux2 = explode('/',$_POST['saida']);
        $this->saida = $aux2[2]."-".$aux2[1]."-".$aux2[0];
      }
      $this->sem_funcao = 0;
      if(isset($_POST['sem_funcao'])){
          $this->sem_funcao = 1;
      }
      $this->em_atividade = 0;
      if(isset($_POST['em_atividade'])){
        $this->em_atividade = 1;
      }
      $this->socio = 0;
      if(isset($_POST['socio'])){
        $this->socio = 1;
      }
      $this->id_empreendimento = $_POST['empresa'];

      $this->db->insert('erp_colaboradores',$this);

    }

    function salvaPrevisao() {

      $cont = 0;
      $id_empreendimento = 1;
      foreach($_POST['ano'] as $ano){
        if(isset($ano)){
          $this->ano = $ano;
          $this->previsao = '';
          if(isset($_POST['previsao'][$cont])){
            $this->previsao = $_POST['previsao'][$cont];
          }
          $this->id_empreendimento = $id_empreendimento;

          $query = $this->db->query("Select * from erp_faturamento where id_empreendimento = ".$id_empreendimento." and ano = ".$ano);

          $data = $query->result();

          if(isset($data[0])){
            $this->db->where('id',$data[0]->id);
            $this->db->update('erp_faturamento',$this);
          }else{
            $this->db->insert('erp_faturamento',$this);
          }
        }
        $cont++;
      }

    }

    function salvaNota() {

      $cont = 0;
      $id_empreendimento = 1;
      foreach($_POST['numero'] as $numero){
        if(isset($numero)){
          $this->numero = $numero;
          $this->data = '';
          $this->valor = '';
          if(isset($_POST['data'][$cont])){
            $this->data = $_POST['data'][$cont];
          }
          if(isset($_POST['valor'][$cont])){
            $this->valor = $_POST['valor'][$cont];
          }
          $this->id_empreendimento = $id_empreendimento;

          if($numero!=''){
            $query = $this->db->query("Select * from erp_faturamento_notas where id_empreendimento = ".$id_empreendimento." and numero = ".$numero);

            $data = $query->result();

            if(isset($data[0])){
              $this->db->where('id',$data[0]->id);
              $this->db->update('erp_faturamento_notas',$this);
            }else{
              $this->db->insert('erp_faturamento_notas',$this);
            }
          }
        }
        $cont++;
      }

    }

    function salvaRoyalt() {

      $cont = 0;
      $id_empreendimento = 1;
      /*foreach($_POST['numero'] as $numero){
        if(isset($numero)){
          $this->numero = $numero;
          $this->data = '';
          $this->valor = '';
          if(isset($_POST['data'][$cont])){
            $this->data = $_POST['data'][$cont];
          }
          if(isset($_POST['valor'][$cont])){
            $this->valor = $_POST['valor'][$cont];
          }
          $this->id_empreendimento = $id_empreendimento;

          if($numero!=''){
            $query = $this->db->query("Select * from erp_faturamento_notas where id_empreendimento = ".$id_empreendimento." and numero = ".$numero);


            $data = $query->result();

            if(isset($data[0])){
              $this->db->where('id',$data[0]->id);
              $this->db->update('erp_faturamento_notas',$this);
            }else{
              $this->db->insert('erp_faturamento_notas',$this);
            }
          }
        }
        $cont++;
      }*/

    }

    //Atualiza usuário

    function update () {
      $this->Date =time();
      //$this->db->update('entries',$this, array('id',$_POST[]));
    }

    // Seleciona usuários do banco

    function lista($id=0) {
        if($id==0){
          $query = $this->db->get('erp_colaboradores');
        }else{
          $query = $this->db->query("Select * from erp_colaboradores where id_empreendimento = ".$id);
        }

        return $query;
    }

    function select($id) {
        $query = $this->db->query("Select * from erp_colaboradores where id = ".$id);

        return $query;
    }

}
