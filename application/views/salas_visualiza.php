<div id="container-central">
<div>
  <p id="titulo_usuario">Patrimônios</p>
  <div id="block_usuario">
    <?php
    echo "<b>Sala:</b> ".$data->nr_sala."<br>";
    echo "<b>Função:</b> ".$data->funcao."<br>";
    echo "<b>Descrição:</b> ".$data->descricao."<br>";
    echo "<b>Possível de locar?:</b> ";
    if($data->disponivel == 0){
      echo "Não";
    }else{
      echo "Sim";
    }
    ?><br><br>
    <a href="<?php echo base_url();?>index.php/salas/edita/<?php echo $data->id;?>" class="button_action">
    <button type="button" class="btn btn-default btn-lg">
      <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Editar
    </button>
  </a>
  </div>
</div>
