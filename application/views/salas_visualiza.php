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
    ?>
  </div>
</div>
