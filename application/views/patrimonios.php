<div id="container-central">
<div>
  <p id="titulo_usuario">Patrimônios</p>
  <div id="block_usuario">
    <?php foreach ($data as $row) { ?>
    <div class="row patrimonio_row">
      <div class="col-md-4"><?php echo $row->nome; ?></div>
      <div class="col-md-4"><?php echo $row->responsavel; ?></div>
      <div class="col-md-2">
        <span class="sobrescrito_empreendimento"><?php if(isset($row->sala)){ echo $row->sala->data_atribuicao; }else{ echo "Não atribuído"; }?></span>
      </div>
      <div class="col-md-2">
          <a href="<?php echo base_url();?>index.php/patrimonios/visualiza/<?php echo $row->id;?>" class="button_action">
            <button type="button" class="btn btn-default btn-xs">
              <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            </button>
          </a>        
      </div>
    </div><br>
    <?php  } ?>
    <div style="text-align:center; margin-top:15px;">
      <a href="<?php echo base_url();?>index.php/patrimonios/cadastra" class="button_action">
        <button type="button" class="btn btn-default btn-lg">
          <span class="glyphicon glyphicon-duplicate" aria-hidden="true"></span> Novo
        </button>
      </a>
    </div>
  </div>
</div>
