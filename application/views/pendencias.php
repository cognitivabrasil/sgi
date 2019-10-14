<div id="container-central">
<div>
  <p id="titulo_usuario">Requisições</p><br>
  <p style="float:right; padding-right:20px;">
    <a href="<?php echo base_url();?>index.php/pendencias/resolvidas" class="button_action">
      <button type="button" class="btn btn-default btn-lg">
        <span class="glyphicon glyphicon-list" aria-hidden="true"></span> Resolvidas
      </button>
    </a>
  </p>
  <div style="text-align:center; margin-top:5px; margin-right: 70%;">
      <a href="<?php echo base_url();?>index.php/pendencias/cadastra" class="button_action">
      <button type="button" class="btn btn-default btn-lg">
        <span class="glyphicon glyphicon-duplicate" aria-hidden="true"></span> Novo
      </button>
      </a>
    </div>
  <div id="block_usuario">
    <?php foreach($data as $row){
        if(!($row->situacao == 3 or $row->situacao_final > 0)){?>
          <div class="row <?php if($row->situacao == 3 or $row->situacao == 4 or $row->situacao_final > 0){ echo 'empreendimento_row_green'; }else{ echo 'empreendimento_row'; }?>">
            <div class="col-md-4"><?php echo $row->nome; ?></div>
            <div class="col-md-5">
              <div class="selo_gamification_pequeno">Empresa<br><?php echo $row->nome_empresa; ?></div><br>
            </div>
            <div class="col-md-3">
              <div class="visualizar_dados" style="float:right; padding-top:15px;">
                <a href="<?php echo base_url();?>index.php/pendencias/visualiza/<?php echo $row->id;?>" class="button_action">
                  <button type="button" class="btn btn-default btn-lg">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                  </button>
                </a>
              </div>
              <span class="sobrescrito_empreendimento" style="float:right; clear:both;">Alterada/Criada em <?php echo date("d/m/Y", strtotime($row->data_modificada));?></span>
            </div>
          </div><br>
    <?php }
        } ?>    
  </div>
</div>