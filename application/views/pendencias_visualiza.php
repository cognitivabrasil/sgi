<div id="container-central">
<div>
  <p id="titulo_usuario">Pendências</p>
  <div id="block_usuario">
      <div class="row empreendimento_row" style="padding-left:10px;">
        <p>Nome: <?php echo $data->nome; ?></p>
        <p>Situação: <?php switch($data->situacao){
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
        <p>Pendência: <?php echo $data->descricao; ?></p>
        <p>Empresa: <?php echo $data->nome_empresa; ?></p>
        <span class="sobrescrito_empreendimento">Alterada/Criada em <?php echo date("d/m/Y", strtotime($data->data_modificada));?></span>
        <br><br>
        <a href="<?php echo base_url();?>index.php/pendencias/edita/<?php echo $data->id;?>" class="button_action">
          <button type="button" class="btn btn-default btn-lg">
            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Editar
          </button>
        </a><br><br>
      </div>
  </div>
</div>
