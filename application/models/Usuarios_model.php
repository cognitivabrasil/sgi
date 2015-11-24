<?php
class Usuarios_model extends CI_Model {

    # VALIDA USUÁRIO
    function validate() {
        $this->db->where('username', $this->input->post('username'));
        $this->db->where('senha', md5($this->input->post('senha')));

        $query = $this->db->get('erp_usuarios');

        if ($query->num_rows == 1) {
            return true; // RETORNA VERDADEIRO
        }
    }

    # VERIFICA SE O USUÁRIO ESTÁ LOGADO
    function logged() {
        $logged = $this->session->userdata('logged');

        if (!isset($logged) || $logged != true) {
            echo 'Voce nao tem permissao para acessar essa pagina. <a href="http://www.inf.ufrgs.br/cei/">Entre em contato</a>';
            die();
        }
    }
}
