<div id="container-central">
<div>
  <p id="titulo_usuario">Colaboradores - <?php echo $emp->nome;?></p>
  <div id="block_usuario">
    <div class="row empreendimento_row">
      <div class="col-md-12"><?php echo $data->nome;?><br><?php echo $data->funcao;?><br><?php switch ($data->vinculo) {
        case 1:
          echo "Aluno UFRGS";
          break;
        case 2:
          echo "Ex aluno UFRGS";
          break;
        case 3:
          echo "Sem Vinculo com a UFRGS";
          break;

      }?><br><?php echo $data->email;?><br>Entrada: <?php echo $data->entrada;?> - <?php if($data->em_atividade == 1){echo "Ainda em atividade";}else{echo "Saída: ".$data->saida;}?>
      <?php
      if($data->sem_funcao == 1){
        echo "<br>Sem função designada";
      }
      if($data->socio == 1){
        echo "<br>Sócio";
      }?></div>
    </div>
    <div style="text-align:center; margin-top:15px;">
      <?php if($this->session->userdata('id_acesso') == 3){?>
      <a href="<?php echo base_url();?>index.php/colaboradores/edita/<?php echo $data->id;?>" class="button_action">
        <button type="button" class="btn btn-default btn-lg">
          <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Editar
        </button>
      </a>
      <?php } ?>
    </div>
  </div>
</div>
