<div id="container-central">
<div>
  <p id="titulo_usuario">Relatórios</p>
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
      }?><br>
      </div>
      <div class="col-md-5">
      <!--  <div class="selo_gamification_pequeno">Empresa<br>Consciente</div> -->
      </div>
      <div class="col-md-3">
        <div class="visualizar_dados" style="float:right; padding-top:10px;">
          <a href="<?php echo base_url();?>index.php/relatorios/lista/<?php echo $row->id;?>" class="button_action">
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
