<div id="container-central">
  <div>
    <p id="titulo_usuario">Atribuição de patrimônio</p>
    <div id="block_usuario">
      <?php
      echo "<b>Nome:</b> ".$data->nome."<br>";
      echo "<b>Patrimônio:</b> ".$data->nrpatrimonio."<br>";
      echo "<b>Responsável na UFRGS:</b> ".$data->responsavel."<br>";
      echo "<b>Descrição:</b> ".$data->descricao."<br>";
      if(isset($data->sala)){
        echo "<h4>Localização Atual</h4>";
        echo "<b>Sala:</b> ".$data->sala->nr_sala."<br>";
        echo "<b>Desde:</b> ".$data->sala->data_atribuicao."<br>";
      }
      echo "<h4>Nova Localização</h4>";
      ?>
      <form method="post" action="<?php echo base_url();?>index.php/patrimonios/atribuicao">
          <input type="hidden" value="<?php echo $data->id;?>" name="id">
          <select name="sala">
            <?php foreach ($salas as $sala){ ?>
              <option value="<?php echo $sala->id; ?>">Sala <?php echo $sala->nr_sala; ?></option>
            <?php } ?>
          </select>
          <button type="submit" class="btn btn-default btn-lg">
            <span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Salvar
          </button>
      </form>
    </div>
  </div>
