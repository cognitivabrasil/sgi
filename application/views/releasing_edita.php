<div id="container-central">
  <div>
    <p id="titulo_usuario">Cadastro de releasing</p>
    <div id="block_usuario">
      <form method="post" action="<?php echo base_url();?>index.php/releasing/save" enctype="multipart/form-data">
          <input type="hidden" name="id" value="<?php echo $data->id; ?>">
          <input type="text" name="nome" value="<?php echo $data->nome; ?>">
          <select name="empreendimento">
            <option value="0" <?php if($data->id_empreendimento == 0) echo "selected"; ?> >Selecione a empresa</value>
            <option value="1" <?php if($data->id_empreendimento == 1) echo "selected"; ?>>CEI</value>
            <?php
            foreach ($empresas as $empresa) {
            ?>
            <option value="<?php echo $empresa->id;?>" <?php if($data->id_empreendimento == $empresa->id) echo "selected"; ?>><?php echo $empresa->nome_fantasia;?></value>
            <?php
            }
            ?>
          </select>
          <p><span style="float:left; margin-top:7px;">&nbsp;Data: </span><input style="float:left;" type="date" name="data" value="<?php echo date("Y-m-d", strtotime($data->data)); ?>" ></p>
          <textarea name="descricao" placeholder="Descrição do evento, prêmio ou acontecimento" style="width:400px; height:100px; clear:both;"><?php echo $data->descricao; ?></textarea>
          <input type="hidden" name="imagem" value="<?php echo $data->img_inicial; ?>">
          <img src="<?php echo base_url($data->anexo);?>"><br>
          <button type="submit" class="btn btn-default btn-lg">
            <span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Salvar
          </button>
      </form>
    </div>
  </div>
