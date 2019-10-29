<div id="container-central">
<div>
  <p id="titulo_usuario">Projetos</p>
  <div id="block_usuario">
    <?php if($this->session->userdata('id_acesso')==1){?>
      <div style="text-align:center; margin-top:15px;">
        <a href="<?php echo base_url();?>index.php/projetos/cadastra" class="button_action">
        <button type="button" class="btn btn-default btn-lg">
          <span class="glyphicon glyphicon-duplicate" aria-hidden="true"></span> Novo
        </button>
        </a>
      </div><br>
    <?php }
    foreach ($data as $projeto) {
    ?>
    <div class="row empreendimento_row">
      <div class="col-md-4"><?php
      echo $projeto->nome;
      echo "<br>";
      switch($projeto->status){
        case 1:
          echo "Planejamento";
          break;
        case 2:
          echo "Execução";
          break;
        case 3:
          echo "Finalizado";
          break;
      }
      echo "<br>";
      if($projeto->data_inicio != '0000-00-00 00:00:00'){
        echo "de ".date("d/m/Y", strtotime($projeto->data_inicio));
      }
      if($projeto->data_fim != '0000-00-00 00:00:00'){
        echo " até ".date("d/m/Y", strtotime($projeto->data_fim));
      }
      ?></div>
      <div class="col-md-8">
        <a href='<?php echo base_url(); ?>index.php/projetos/remove/<?php echo $projeto->id;?>' class='deleta_projetos' style="float:right; margin-top:-7px; margin-right:-15px;">
          <button type='button' class='btn btn-default btn-xs'>
            <span class='glyphicon glyphicon-remove' aria-hidden='true'></span>
          </button>
        </a>
        <div class="visualizar_dados" style="float:right; padding-top:20px;">
          <a href="<?php echo base_url();?>index.php/projetos/lista/<?php echo $projeto->id;?>" class="button_action">
            <button type="button" class="btn btn-default btn-lg">
              <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            </button>
          </a>
        </div>
      </div>
    </div><br>
    <?php
    }
    ?>
  </div>
</div>
