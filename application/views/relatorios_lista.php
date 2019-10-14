<div id="container-central">
<div>
  <p id="titulo_usuario">Relatórios</p>
  <?php if($this->session->userdata('id_acesso')==1){ ?>
  <div id="block_usuario">
    <div class="row empreendimento_row">
      <div class="col-md-4"><?php echo "Histórico de mudança de status"; ?>
      </div>
      <div class="col-md-5">
      </div>
      <div class="col-md-3">
        <div class="visualizar_dados" style="float:right; padding-top:10px;">
        <?php foreach($data as $row){?>
          <a href="<?php echo base_url();?>index.php/relatorios/visualiza_status/<?php echo $row->id_empreendimento;?>" class="button_action">
        <?php } ?>
            <button type="button" class="btn btn-default btn-lg">
              <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            </button>
          </a>
          <br>
        </div>
      </div>
    </div>
    <br>
    <br>
    <div class="row empreendimento_row">
      <div class="col-md-4"><?php echo "Solicitação de serviços"; ?>
      </div>
      <div class="col-md-5">
      </div>
      <div class="col-md-3">
        <div class="visualizar_dados" style="float:right; padding-top:10px;">
        <?php foreach($data as $row){?>
          <a href="<?php echo base_url();?>index.php/relatorios/visualiza_servicos/<?php echo $row->id_empreendimento;?>" class="button_action">
        <?php } ?>
            <button type="button" class="btn btn-default btn-lg">
              <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            </button>
          </a>
          <br>
        </div>
      </div>
      <br>
      <br>
      </div>
      <?php 
    }?>
    </div>
    <br>
  </div>
</div>
