<div id="container-central">
  <div>
    <p id="titulo_usuario">Edição de patrimônios</p>
    <div id="block_usuario">
      <?php if($this->session->userdata('id_acesso')==1){ ?>
      <form method="post" action="<?php echo base_url();?>index.php/patrimonios/save">
          <input type="hidden" name="id" value="<?php echo $data->id;?>">
          <input type="text" name="nome" value="<?php echo $data->nome;?>">
          <input type="text" name="nr" value="<?php echo $data->nrpatrimonio;?>">
          <input type="text" name="responsavel" value="<?php echo $data->responsavel?>">
          <textarea name="descricao" style="width:70%; height:150px;"><?php echo $data->descricao?></textarea>
          <button type="submit" class="btn btn-default btn-lg">
            <span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Salvar
          </button>
      </form>
      <?php } ?>
    </div>
  </div>
