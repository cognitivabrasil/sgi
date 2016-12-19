<div id="container-central">
<div>
  <p id="titulo_usuario">Release</p>
  <div id="block_usuario">
      <div class="row empreendimento_row" style="padding-left:10px;">
        <p><?php echo $data->nome; ?></p>
        <?php if($data->data != '0000-00-00 00:00:00'){?>
          <p><?php echo date("d/m/Y", strtotime($data->data)); echo "->".$data->data;?></p>
        <?php }?>
        <p><?php echo $data->nome_empreendimento; ?></p>
        <p><?php echo $data->descricao; ?></p>
        <?php
        if($data->anexo!=''){
        ?>
        <img style="max-width:90px;" src="<?php echo base_url($data->anexo); ?>">
        <?php
        }
        ?>
        <br><br>
        <?php if($this->session->userdata('id_empreendimento]')==$data->id_empreendimento){?>
        <a href="<?php echo base_url();?>index.php/releasing/edita/<?php echo $data->id;?>" class="button_action">
        <button type="button" class="btn btn-default btn-lg">
          <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Editar
        </button>
        </a>
        <?php } ?>
        <br><br>
      </div>
  </div>
</div>
