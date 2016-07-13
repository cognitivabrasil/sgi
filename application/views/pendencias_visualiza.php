<?php
  print_r($data);
?>
<div id="container-central">
<div>
  <p id="titulo_usuario">Pendências</p>
  <div id="block_usuario">
      <div class="row empreendimento_row">
        <p>Nome: <?php echo $data[0]->nome; ?></p>
        <p>Situação: <?php switch($data[0]->situacao){
            case 0:
              echo "Sem status";
              break;
            case 1:
              echo "Enviada";
              break;
            case 2:
              echo "Resolvida";
              break;
        } ?></p>
        <p>Pendência: <?php echo $data[0]->descricao; ?></p>
        <span class="sobrescrito_empreendimento">Alterada/Criada em 10/10/2010</span>
      </div>
  </div>
</div>
