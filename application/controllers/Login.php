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

            if ($query) { // VERIFICA LOGIN E SENHA
                $data = array(
                    'username' => $this->input->post('username'),
                    'logged' => true
                );
                $this->session->set_userdata($data);
                redirect('index.php/inicial');
            } else {
                redirect($this->index());
            }
        }
    }
}
