<script>
  webshims.setOptions('waitReady', false);
  webshims.setOptions('forms-ext', {types: 'date'});
  webshims.polyfill('forms forms-ext');
</script>
<div id="container-central">
  <div>
    <p id="titulo_usuario">Cadastro de projetos</p>
    <div id="block_usuario">
      <form method="post" action="<?php echo base_url();?>index.php/projetos/insert" enctype="multipart/form-data">
          <input type="text" name="nome" placeholder="Nome">
          <p style="position:relative;" class="data-release"><span style="float:left; margin-top:7px;">&nbsp;Data de início: </span><input style="float:left;" type="date" name="data_inicio" data-date='{"startView": 2, "openOnMouseFocus": true}' placeholder="yyyy-mm-dd"></p>
          <br><br><p style="position:relative;" class="data-release"><span style="float:left; margin-top:7px;">&nbsp;Data de fim: </span><input style="float:left;" type="date" name="data_fim" data-date='{"startView": 2, "openOnMouseFocus": true}' placeholder="yyyy-mm-dd"></p>
          <br><br><p style="position:relative;" class="data-release"><span style="float:left; margin-top:7px;">&nbsp;Status:&nbsp;</span><select name="status"><option value='1'>Planejamento</option><option value='2'>Execução</option><option value='3'>Finalizado</option></select></p>
          <textarea name="descricao" placeholder="Descrição do projeto" style="width:400px; height:100px; clear:both;"></textarea>
          <input type="text" name="orcamento" placeholder="Orçamento">
          <input type="text" name="financiador" placeholder="Financiador">
          <button type="submit" class="btn btn-default btn-lg">
            <span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Salvar
          </button>
      </form>
    </div>
  </div>
