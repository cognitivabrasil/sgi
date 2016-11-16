<div id="container-central">
<div>
  <p id="titulo_usuario">Requisições</p>
  <div id="block_usuario">
      <div class="row empreendimento_row" style="padding-left:10px;">
        <p>Nome: <?php echo $data->nome; ?></p>
        <p>Situação: <?php switch($data->situacao){
            case 0:
              echo "Sem status";
              break;
            case 1:
              echo "enviada";
              break;
            case 2:
              echo "em andamento";
              break;
            case 3:
              echo "resolvida";
              break;
        } ?></p>
        <p>Pendência: <?php echo $data->descricao; ?></p>
        <p>Empresa: <?php echo $data->nome_empresa; ?></p>
        <span class="sobrescrito_empreendimento">Alterada/Criada em <?php echo date("d/m/Y", strtotime($data->data_modificada));?></span>
        <br><br>
        <div id="block_usuario">
          <?php foreach ($atualizacoes as $row) { ?>
          <div <?php if($row->situacao == 3) echo "style='background:rgba(112,219,147,0.2);'"?>>
            <p>Em: <?php echo date("d/m/Y", strtotime($row->data_modificada));?></p>
            <p><?php echo $row->descricao; ?></p>
            <p>Situação: <?php switch($row->situacao){
                case 0:
                  echo "Sem status";
                  break;
                case 1:
                  echo "enviada";
                  break;
                case 2:
                  echo "em andamento";
                  break;
                case 3:
                  echo "resolvida";
                  break;
            } ?></p>
          </div>
          <hr>
          <?php } ?>
        </div>
        <a href="<?php echo base_url();?>index.php/pendencias/edita/<?php echo $data->id;?>" class="button_action">
          <button type="button" class="btn btn-default btn-lg">
            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Editar
          </button>
        </a>
        <a href="<?php echo base_url();?>index.php/pendencias/atualiza_status/<?php echo $data->id;?>" class="button_action">
          <button type="button" class="btn btn-default btn-lg">
            <span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> Atualizar status
          </button>
        </a><br><br>
      </div>
  </div>
</div>
