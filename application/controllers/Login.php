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
                $notificarequisicao = 0;
                if($query[0]->id_acesso == 1){
                  $this->load->model('pendencias_model');
                  $notificarequisicao = $this->pendencias_model->getUnread();
                }
                $data = array(
                    'username' => $query[0]->username,
                    'id_usuario' => $query[0]->id_usuario,
                    'nome' => $query[0]->nome,
                    'id_acesso' => $query[0]->id_acesso,
                    'id_empreendimento' => $query[0]->id_empreendimento,
                    'logged' => true,
                    'notifica_requisicao' => $notificarequisicao
                );
                $this->session->set_userdata($data);
                redirect('index.php/inicial');
            } else {
                //redirect($this->index());
                // VALIDATION RULES
                $this->load->view('header');
                echo "<div class='alert alert-danger fade in'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Usuário ou senha errados!</div>";
                $this->load->view('login_view');
                $this->load->view('footer');

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
