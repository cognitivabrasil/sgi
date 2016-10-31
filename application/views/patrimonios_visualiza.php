<div id="container-central">
<div>
  <p id="titulo_usuario">Patrimônios</p>
  <div id="block_usuario">
    <?php
    echo "<b>Nome:</b> ".$data->nome."<br>";
    echo "<b>Patrimônio:</b> ".$data->nrpatrimonio."<br>";
    echo "<b>Responsável na UFRGS:</b> ".$data->responsavel."<br>";
    echo "<b>Descrição:</b> ".$data->descricao."<br>";
    if(isset($data->sala)){
      echo "<h4>Localização</h4>";
      echo "<b>Sala:</b> ".$data->sala->nr_sala."<br>";
      echo "<b>Desde:</b> ".$data->sala->data_atribuicao."<br>";
    }
    ?>
    <div style="text-align:center; margin-top:15px;">
      <a href="<?php echo base_url();?>index.php/patrimonios/edita/<?php echo $data->id;?>" class="button_action">
      <button type="button" class="btn btn-default btn-lg">
        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Editar
      </button>
      </a>
      <a href="<?php echo base_url();?>index.php/patrimonios/atribui/<?php echo $data->id;?>" class="button_action">
        <button type="button" class="btn btn-default btn-lg">
          Atribuir localização <span class="glyphicon glyphicon-share-alt" aria-hidden="true"></span>
        </button>
      </a>
    </div>
  </div>
</div>
