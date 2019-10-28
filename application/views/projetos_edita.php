<script>
  webshims.setOptions('waitReady', false);
  webshims.setOptions('forms-ext', {types: 'date'});
  webshims.polyfill('forms forms-ext');
</script>
<div id="container-central">
  <div>
    <p id="titulo_usuario">Edição de projeto</p>
    <div id="block_usuario">
      <form method="post" action="<?php echo base_url();?>index.php/projetos/save" enctype="multipart/form-data">
          <input type="hidden" name="id" value="<?php echo $data->id; ?>">
          <input type="text" name="nome" value="<?php echo $data->nome; ?>">
          <p style="position:relative;" class="data-release"><span style="float:left; margin-top:7px;">&nbsp;Data de início: </span><input style="float:left;" type="date" name="data_inicio" data-date='{"startView": 2, "openOnMouseFocus": true}' placeholder="yyyy-mm-dd" value='<?php echo date("Y-m-d", strtotime($data->data_inicio)); ?>' ></p>
          <br><br><p style="position:relative;" class="data-release"><span style="float:left; margin-top:7px;">&nbsp;Data de fim: </span><input style="float:left;" type="date" name="data_fim" data-date='{"startView": 2, "openOnMouseFocus": true}' placeholder="yyyy-mm-dd" value='<?php echo date("Y-m-d", strtotime($data->data_fim)); ?>'></p>
          <br><br><p style="position:relative;" class="data-release"><span style="float:left; margin-top:7px;">&nbsp;Status:&nbsp;</span><select name="status"><option value='1' <?php if($data->status == 1) echo "selected"; ?> >Planejamento</option><option value='2' <?php if($data->status == 2) echo "selected"; ?> >Execução</option><option value='3' <?php if($data->status == 3) echo "selected"; ?> >Finalizado</option></select></p>
          <textarea name="descricao" placeholder="Descrição do projeto" style="width:400px; height:100px; clear:both;"><?php echo $data->descricao; ?></textarea>
          <input type="text" name="orcamento" placeholder="Orçamento" value="<?php echo $data->orcamento; ?>">
          <input type="text" name="financiador" placeholder="Financiador" value="<?php echo $data->financiador; ?>">
          <button type="submit" class="btn btn-default btn-lg">
            <span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Salvar
          </button>
      </form>
    </div>
  </div>
