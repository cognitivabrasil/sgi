<div id="container-central">
  <div>
    <p id="titulo_usuario">Relatórios</p>
    <div id="block_usuario">
    
    <div class="row empreendimento_row">
      <div class="col-md-8"><p style="font-size: 20px;"> Consultorias </p>
      </div>
      <div class="col-md-3">
        <div class="visualizar_dados" style="float:right; padding-top:10px;">
        <?php foreach($data as $row){?>
          <a href="<?php echo base_url();?>index.php/relatorios/lista_consultorias/<?php echo $row->id_empreendimento;?>" class="button_action">
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

      <?php
      foreach($data as $row){
      ?>
      <div class="row empreendimento_row">

        <div class="col-md-8">
          <?php echo $row->acao;?>
          <br>
          <?php echo 'Criada/Alterada em :'.$row->data;?>          
          <br>
        </div>
        <div class="col-md-3">
        <div class="visualizar_dados" style="float:right; padding-top:10px;">
          <a href="<?php echo base_url();?>index.php/relatorios/visualiza_servicos/<?php echo $row->id_pendencia;?>" class="button_action">
            <button type="button" class="btn btn-default btn-lg">
              <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            </button>
          </a>
          <br>
        </div>

      </div>
  </div>
      <br>
    <?php } ?>
  </div>
</div>
</div>
