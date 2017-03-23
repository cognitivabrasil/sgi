<div id="container-central">
  <div>
    <p id="titulo_usuario">Edição de requisições</p>
    <div id="block_usuario">
      <form method="post" action="<?php echo base_url();?>index.php/pendencias/save">
          <input type="hidden" name="id" value="<?php echo $data->id; ?>">
          <input type="hidden" name="usuario" value="<?php echo $data->id_usuario; ?>">
          <input type="text" name="nome" value="<?php echo $data->nome; ?>">
          <select type="text" name="situacao">
            <option value="0" <?php if($data->situacao==0) echo "selected"; ?> >Situação</option>
            <option value="1" <?php if($data->situacao==1) echo "selected"; ?> >enviada</option>
            <option value="2" <?php if($data->situacao==2) echo "selected"; ?> >em andamento</option>
            <option value="3" <?php if($data->situacao==3) echo "selected"; ?> >resolvida</option>
            <option value="4" <?php if($data->situacao==4) echo "selected"; ?> >cancelada</option>
          </select>
          <textarea name="descricao" placeholder="Descrição" style="width:70%; height:150px;"><?php echo $data->descricao; ?></textarea>
          <button type="submit" class="btn btn-default btn-lg">
            <span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Salvar
          </button>
      </form>
    </div>
  </div>
