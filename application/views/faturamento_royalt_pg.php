<div id="container-central">
  <div>
    <div id="autosave" class='alert alert-success fade in' style="display:none;"><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Salvo!</div>
    <p id="titulo_usuario">Faturamento Royalties pagos</p>
    <div id="block_usuario">
      <a href="<?php echo base_url();?>index.php/faturamento/lista/<?php echo $id_empreendimento;?>" class="button_action" style="float:right;">
        <button type="button" class="btn btn-default btn-lg">
          <span class="glyphicon glyphicon-barcode" aria-hidden="true"></span> Faturamento
        </button>
      </a>
      <form method="post" action="faturamento/salvaNota" id="notasform">
        <input type="hidden" value="<?php echo $id_empreendimento;?>" name="id_empreendimento_notas">
        <p id="titulo_usuario" style="clear:both;">Notas</p>
        <div id="notas_div">
          <?php if(count($notas)==0) { ?>
            <p>Não possui nenhum Royalt pago</p>
          <?php } ?>
          <?php foreach ($notas as $row) { ?>
            <div class="block_nota" id="nota_<?php echo $row->id;?>">
              <?php if(isset($row->arquivo_nota) && $row->arquivo_nota != ""){ ?>
              <a target="_blank" href="<?php echo base_url();?>index.php/faturamento/download/<?php echo $row->id;?>" style="float:right; margin-right:3px; margin-top:3px;">
                <button type="button" class="btn btn-default btn-sm">
                  <span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span> Nota
                </button>
              </a>
              <?php } ?>
              <input type="date" name="data[]" placeholder="Data" style="float:right; margin-right:40px;" onblur="salvaNota();" value="<?php echo $row->data;?>">
              <input type="text" name="numero[]" placeholder="Número" onblur="salvaNota();" value="<?php echo $row->numero;?>">
              <input type="text" name="valor[]" placeholder="Valor" style="margin:0 auto;" onblur="salvaNota();" value="<?php echo $row->valor;?>">
              <div style="width:20%; height:30px;"><input type="checkbox" name="royalt[]" style="float:left; width:10px;" id="royalt_pg_<?php echo $row->id;?>" onclick="salvaRoyalt(<?php echo $row->id;?>);" <?php if($row->royalt==1) echo "checked"?>><span style="float:left;">Royalt Pago</span></div>
            </div>
          <?php } ?>
        </div>
      </form>
    </div>
  </div>
</div>
</div>
