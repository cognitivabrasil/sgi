<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {

        // VALIDATION RULES
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'Login', 'required','O campo de login é obrigatório!');
        $this->form_validation->set_rules('senha', 'Senha', 'required', 'O campo de senha é obrigatório!');
        $this->form_validation->set_error_delimiters('<p class="error">', '</p>');

        // MODELO MEMBERSHIP
        $this->load->model('usuarios_model', 'usuarios');
        $query = $this->usuarios->validate();

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('header');
            $this->load->view('login_view');
            $this->load->view('footer');

        } else {
            if (count($query)) { // VERIFICA LOGIN E SENHA
                print_r($query);
                $data = array(
                    'username' => $query[0]->username,
                    'id_usuario' => $query[0]->id_usuario,
                    'nome' => $query[0]->nome,
                    'id_acesso' => $query[0]->id_acesso,
                    'logged' => true
                );
                $this->session->set_userdata($data);
                redirect('index.php/inicial');
            } else {
                redirect($this->index());
            }
        }
    }

    function logout() {
      $data = array(
        'username' => '',
        'id_usuario' => 0,
        'nome' => '',
        'id_acesso' => 0,
        'logged' => false
      );
      $this->session->set_userdata($data);
      redirect($this->index());
    }
}
