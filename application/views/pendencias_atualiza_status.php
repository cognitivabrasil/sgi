<div id="container-central">
  <div>
    <p id="titulo_usuario">Atualizar status de requisição</p>
    <div id="block_usuario">
      <p><?php echo $data->nome;?></p>
      <p><?php echo $data->descricao;?></p>
      <form method="post" action="<?php echo base_url();?>index.php/pendencias/save_atualiza">
          <input type="hidden" name="id_pendencia" value="<?php echo $data->id; ?>">
          <input type="hidden" name="usuario" value="<?php echo $data->id_usuario; ?>">
          <select type="text" name="situacao">
            <option value="0" <?php if($data->situacao==0) echo "selected"; ?> >Situação</option>
            <option value="1" <?php if($data->situacao==1) echo "selected"; ?> >enviada</option>
            <option value="2" <?php if($data->situacao==2) echo "selected"; ?> >em andamento</option>
            <option value="3" <?php if($data->situacao==3) echo "selected"; ?> >resolvida</option>
            <option value="4" <?php if($data->situacao==4) echo "selected"; ?> >cancelada</option>
          </select>
          <textarea name="descricao" placeholder="Descrição" style="width:70%; height:150px;"></textarea>
          <button type="submit" class="btn btn-default btn-lg">
            <span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Salvar
          </button>
      </form>
    </div>
  </div>
