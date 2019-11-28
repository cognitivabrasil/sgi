<script>
  webshims.setOptions('waitReady', false);
  webshims.setOptions('forms-ext', {types: 'date'});
  webshims.polyfill('forms forms-ext');
</script>
<div id="container-central">
  <div>
    <p id="titulo_usuario">Editar</p>
    <div id="block_usuario">
      <form method="post" action="<?php echo base_url();?>index.php/consultores/save" enctype="multipart/form-data">
      	  <input type="hidden" name="id" value="<?php echo $data->id;?>">
          <input type="hidden" name="minutos_disponiveis" value="<?php echo $data->minutos_disponiveis;?>">
          <input type="text" name="nome" value="<?php echo $data->nome;?>">
          <input type="text" name="contato" value="<?php echo $data->contato;?>">
          <input type="text" name="area_atuacao" value="<?php echo $data->area_atuacao;?>">
          Total: <input type="text" name="horas_totais" value="<?php echo $data->minutos_totais;?>">
          Disponível: <input type="text" name="horas_disponiveis" value="<?php echo $data->minutos_disponiveis;?>">
          <button type="submit" class="btn btn-default btn-lg">
            <span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Salvar
          </button>
      </form>
    </div>
  </div>
