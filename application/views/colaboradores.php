<div id="container-central">
<div>
  <p id="titulo_usuario">Colaboradores</p>
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
        case 4:
          echo "Outros";
          break;
        case 5:
          echo "Graduada";
          break;
        case 6:
          echo "Descontinuada";
          break;
      }?><br><?php echo $row->nr;?> colaborador(es)</div>
      <div class="col-md-5">
        <!--<div class="selo_gamification_pequeno">Empresa<br>Consciente</div> -->
      </div>
      <div class="col-md-3">
        <div class="visualizar_dados" style="float:right; padding-top:10px;">
          <a href="<?php echo base_url();?>index.php/colaboradores/lista/<?php echo $row->id;?>" class="button_action">
            <button type="button" class="btn btn-default btn-lg">
              <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            </button>
          </a><br>
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
