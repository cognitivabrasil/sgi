<div id="container-central">
<div>
  <p id="titulo_usuario">Empreendimentos</p>
  <div style="text-align:center; margin-top:15px;">
    <?php if($this->session->userdata('id_acesso')==1){?>
    <a href="<?php echo base_url();?>index.php/empreendimentos/cadastra" class="button_action">
      <button type="button" class="btn btn-default btn-lg">
        <span class="glyphicon glyphicon-duplicate" aria-hidden="true"></span> Novo
      </button>
    </a>
    <?php } ?>
  </div>
  <?php if($this->session->userdata('id_acesso')==1){ ?>
  <div id="block_usuario">
    <?php
    foreach($data as $row){
    ?>
    <div class="row empreendimento_row">

      <div class="col-md-4"><?php echo $row->nome;?><br><?php switch ($row->vinculo) {
        case 1:
          echo "Pré Incubada";
          break;
        case 2:
          echo "Incubada";
          break;
        case 3:
          echo "Parque";
          break;
        case 5:
          echo "Graduada";
          break;
        case 6:
          echo "Descontinuada";
          break;
        case 4:
          echo "Outros";
          break;
      }?><br><?php echo $row->nr;?> colaborador(es)
      </div>
      <div class="col-md-5">
      <!--  <div class="selo_gamification_pequeno">Empresa<br>Consciente</div> -->
      </div>
      <div class="col-md-3">
        <a href='<?php echo base_url(); ?>index.php/empreendimentos/remove/<?php echo $row->id;?>' class='deleta_usuario' style="float:right; margin-top:-7px; margin-right:-15px;">
          <button type='button' class='btn btn-default btn-xs'>
            <span class='glyphicon glyphicon-remove' aria-hidden='true'></span>
          </button>
        </a>
        <div class="visualizar_dados" style="float:right; padding-top:10px;">
          <a href="<?php echo base_url();?>index.php/empreendimentos/visualiza/<?php echo $row->id;?>" class="button_action">
            <button type="button" class="btn btn-default btn-lg">
              <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            </button>
          </a>
          <br>
          <!-- <span class="sobrescrito_empreendimento">Última atualização em 10 dias</span> -->
        </div>
      </div>
    </div>
    <br>
    <?php
    }
    ?>
  </div>
  <?php } ?>
</div>
