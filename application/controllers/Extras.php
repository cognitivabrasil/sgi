<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Extras extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
      echo "Extras";
      echo "<br><a href='/erpcei/index.php/extras/save_consultores'>ler csv consultores</a><br>";
      echo "<br><a href='/erpcei/index.php/extras/import_patrimonios'>ler pdf patrimonios</a>";
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

    function import_patrimonios() {
      $file = fopen(base_url()."uploads/patrimonio.txt", "r");
      $count = 0;
      $patData = [];
      $patUnicData = [];
      $total = 0;
      while (($emapData = fgets($file, 10000)) !== FALSE)
      {
         if($count > 0){
           $aux = explode(':',$emapData);
           if(isset($aux[0])){
             if($aux[0]=='Descrição'){
               $aux = explode(' - ',$emapData);
               $patUnicData[$count] = $aux[1];
               $count=2;
             }
             if($aux[0]=='Características'){
               $aux = explode('Características:',$emapData);
               $patUnicData[$count] = $aux[1];
               array_push($patData, $patUnicData);
               $count=0;
             }
           }
         }else{
           if($count==0){
             $aux = explode(' ',$emapData);
             if(isset($aux[1]) && $aux[0]!="Emissão:"){
               $aux2 = explode('/',$aux[1]);
               if(isset($aux2[2])){
                 $patUnicData[$count] = $aux[0];
                 $count=1;
               }
             }
           }
         }
      }
      fclose($file);

      $this->load->model('patrimonios_model');

      foreach ($patData as $row) {          
          $this->patrimonios_model->insert_extra($row[0],$row[1],$row[2]);
      }

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
