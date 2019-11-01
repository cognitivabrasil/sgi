<?php
class Incubadoras_model extends CI_Model {

    function select($id) {
        $this->db->where('id', $id);

        $query = $this->db->get('erp_incubadoras');

        return $query->result();
    }

    function changepasswd() {
        $this->senha = md5($_POST['nova_senha']);
        $this->db->where('id_usuario',$_POST['id_usuario']);
        $this->db->update('erp_usuarios',$this);
    }

    function changeduracao() {
        if(isset($_POST['duracao_indeterminada'])){
          $this->duracao = NULL;
        }else{
          $this->duracao = $_POST['duracao_nova'];
        }
        $this->db->where('id_usuario',$_POST['id_usuario']);
        $this->db->update('erp_usuarios',$this);
    }

    function restaurasenha() {
        $senha = '@Mudar'.mt_rand(10000, 99999);
        $this->senha = md5($senha);
        $this->db->where('id_usuario',$_POST['id']);
        $this->db->update('erp_usuarios',$this);
        echo $senha;
    }

    // Verifica se está logado
    function logged() {
        $logged = $this->session->userdata('logged');

        if (!isset($logged) || $logged != true) {
            echo 'Voce nao tem permissao para acessar essa pagina. <a href="http://www.inf.ufrgs.br/cei/">Entre em contato</a>';
            die();
        }
    }

    // Insere usuário

    function insert() {
      $this->username = $_POST['login'];
      $this->senha = md5($_POST['senha']);
      $this->id_empreendimento = $_POST['empresa'];
      $this->id_acesso = $_POST['acesso'];
      $this->contato = $_POST['contato'];
      $this->nome = $_POST['nome'];
      if(isset($_POST['duracao_indeterminada'])){
        $this->duracao = NULL;
      }else{
        $this->duracao = $_POST['duracao'];
      }

      $this->db->insert('erp_usuarios',$this);
    }

    //Atualiza usuário

    function update () {
      $this->Date =time();
      //$this->db->update('entries',$this, array('id',$_POST[]));
    }


    function select_group() {
        $query = $this->db->query('SELECT * FROM erp_usuarios order by id_acesso,nome');

        return $query;
    }

    function selectByID($id) {
        $this->db->where('id_usuario', $id);
        $query = $this->db->get('erp_usuarios');

        return $query;
    }

    function selectBySession() {
        $username = $this->session->userdata('username');
        $this->db->where('username', $username);
        $query = $this->db->get('erp_usuarios');

        return $query;
    }

    function remove($id) {
        $query = $this->db->query('Delete from erp_usuarios where id_usuario='.$id);

        return $query;
    }
}
