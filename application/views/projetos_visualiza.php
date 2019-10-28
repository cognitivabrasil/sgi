<div id="container-central">
<div>
  <p id="titulo_usuario">Projetos</p>
  <div id="block_usuario">
      <div class="row empreendimento_row" style="padding-left:10px;">
        <p><?php echo $data->nome; ?></p>
        <?php if($data->data_inicio != '0000-00-00 00:00:00'){?>
          <p><?php echo "de ".date("d/m/Y", strtotime($data->data_inicio));?>
        <?php }
        if($data->data_fim != '0000-00-00 00:00:00'){
        echo " até ".date("d/m/Y", strtotime($data->data_fim));?></p>
        <?php }?>
        <p><?php echo $data->descricao; ?></p>
        <p><?php switch($data->status){
          case 1:
            echo "Planejamento";
            break;
          case 2:
            echo "Execução";
            break;
          case 3:
            echo "Finalizado";
            break;
        } ?></p>

        <br><br>
        <?php if($this->session->userdata('id_acesso')==1){?>
        <a href="<?php echo base_url();?>index.php/projetos/edita/<?php echo $data->id;?>" class="button_action">
        <button type="button" class="btn btn-default btn-lg">
          <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Editar
        </button>
        </a>
        <?php } ?>
        <br><br>
      </div>
  </div>
</div>
