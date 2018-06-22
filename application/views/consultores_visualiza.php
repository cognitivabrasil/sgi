<div id="container-central">
<div>
  <p id="titulo_usuario">Consultores</p>
  <div id="block_usuario">
    <div class="row empreendimento_row">
      <div class="col-md-12">
        <?php echo $data->nome;?><br>
        Horas: <?php echo ($data->minutos_totais-($data->minutos_totais%60))/60; echo ":"; echo $data->minutos_totais%60;?>
      </div>
    </div>
    <div style="text-align:center; margin-top:15px;">
      <a href="<?php echo base_url();?>index.php/consultores/horas/<?php echo $data->id;?>" class="button_action">
        <button type="button" class="btn btn-default btn-lg">
          <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Inserir Horas
        </button>
      </a>
    </div>
  </div>
</div>
