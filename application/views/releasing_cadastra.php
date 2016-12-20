<script>
  webshims.setOptions('waitReady', false);
  webshims.setOptions('forms-ext', {types: 'date'});
  webshims.polyfill('forms forms-ext');
</script>
<div id="container-central">
  <div>
    <p id="titulo_usuario">Cadastro de release</p>
    <div id="block_usuario">
      <form method="post" action="<?php echo base_url();?>index.php/releasing/insert" enctype="multipart/form-data">
          <input type="text" name="nome" placeholder="Nome">
          <input type="hidden" name="empreendimento" value="<?php echo $this->session->userdata('id_empreendimento');?>">
          <!--<select name="empreendimento">
            <option value="0">Selecione a empresa</value>
            <option value="1">CEI</value>
            <?php
            foreach ($empresas as $empresa) {
            ?>
            <option value="<?php echo $empresa->id;?>"><?php echo $empresa->nome;?></value>
            <?php
            }
            ?>
          </select>-->
          <p style="position:relative;" class="data-release"><span style="float:left; margin-top:7px;">&nbsp;Data: </span><input style="float:left;" type="date" name="data" data-date='{"startView": 2, "openOnMouseFocus": true}' placeholder="yyyy-mm-dd"></p>
          <textarea name="descricao" placeholder="Descrição do evento, prêmio ou acontecimento" style="width:400px; height:100px; clear:both;"></textarea>
          <input type="file" name="imagem">
          <button type="submit" class="btn btn-default btn-lg">
            <span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Salvar
          </button>
      </form>
    </div>
  </div>
