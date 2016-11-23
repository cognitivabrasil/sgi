<div id="container-central">
  <div>
    <div id="autosave" class='alert alert-success fade in' style="display:none;"><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Salvo!</div>
    <p id="titulo_usuario">Faturamento</p>
    <div id="block_usuario">
      <a href="<?php echo base_url();?>index.php/faturamento/royalt_pg/<?php echo $id_empreendimento;?>" class="button_action" style="float:right;">
        <button type="button" class="btn btn-default btn-lg">
          <span class="glyphicon glyphicon-barcode" aria-hidden="true"></span> Royalties pagos
        </button>
      </a>
      <form method="post" action="faturamento/salvaPrevisao" id="faturamentoForm">
        <input type="hidden" value="<?php echo $id_empreendimento;?>" name="id_empreendimento" id="id_empreendimento">
        <div id="faturamento_prev">
          <button type="button" class="btn btn-default btn-xs" id="add_ano" style="margin-top:7px;">
            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
          </button>
          <?php if(count($faturamento)==0) { ?>
          <input type="text" name="ano[]" placeholder="Ano" style="float:left;" onblur="salvaPrevisao();"><input type="text" name="previsao[]" placeholder="Previsão de faturamento" style="float:left;" onblur="salvaPrevisao();">
          <?php } ?>
          <?php foreach ($faturamento as $row) { ?>
          <input type="text" name="ano[]" placeholder="Ano" style="float:left;" onblur="salvaPrevisao();" value="<?php echo $row->ano;?>"><input type="text" name="previsao[]" placeholder="Previsão de faturamento" style="float:left;" onblur="salvaPrevisao();" value="<?php echo $row->previsao;?>">
          <?php } ?>
        </div>
        <input type="text" name="contador" placeholder="Contador responsável" value="<?php echo $contador->contador;?>" style="clear:both; float:left;" id="contador" onblur="salvaContador()">
      </form>
      <form method="post" action="faturamento/salvaNota" id="notasform">
        <input type="hidden" value="<?php echo $id_empreendimento;?>" name="id_empreendimento_notas">
        <p id="titulo_usuario" style="clear:both;">Notas</p>
        <a href='#' class="button_action" id="add_nota" style="float:right;">
          <button type="button" class="btn btn-default btn-xs">
            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
          </button>
        </a>
        <div id="notas_div">
          <?php if(count($notas)==0) { ?>
            <div class="block_nota">
              <input type="date" name="data[]" placeholder="Data" style="float:right; margin-right:40px;" onblur="salvaNota();">
              <input type="text" name="numero[]" placeholder="Número" onblur="salvaNota();">
              <input type="text" name="valor[]" placeholder="Valor" style="margin:0 auto;" onblur="salvaNota();">
              <br>
            </div>
          <?php } ?>
          <?php foreach ($notas as $row) { ?>
            <div class="block_nota" id="nota_<?php echo $row->id;?>">
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
