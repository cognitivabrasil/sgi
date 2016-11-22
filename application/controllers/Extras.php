<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Extras extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
      echo "Extras";
      echo "<br><a href='/erpcei/index.php/extras/save_consultores'>ler csv consultores</a>";
    }

    function save_consultores() {
      $file = fopen(base_url()."uploads/consultores.csv", "r");
      while (($emapData = fgetcsv($file, 10000, ",")) !== FALSE)
      {
         $lines->nome[] = $emapData[0];
         $lines->empresa[] = $emapData[1];
         $lines->fone[] = $emapData[2];
         $lines->email[] = $emapData[3];
         $lines->atuacao[] = $emapData[4];
      }
      fclose($file);
      $this->load->model('extras_model');
      $this->extras_model->salva_consultores($lines);
      print_r($lines);
    }

    function visualiza($id=0) {
      $this->load->model('usuarios_model');
      $this->usuarios_model->verifica_login();

      $this->load->view('header');
      $this->load->view('head_logado');

      $this->load->model('colaboradores_model');
      $query = $this->colaboradores_model->select($id);

      $this->load->view('colaboradores_visualiza', array('data'=>$query->result()[0]));
      $this->load->view('footer');
    }

}
