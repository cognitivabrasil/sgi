<div id="container-central">
  <div>
    <p id="titulo_usuario">Edição de parceiros</p>
    <div id="block_usuario">
      <?php if($this->session->userdata('id_acesso')==1){ ?>
        <form method="post" action="<?php echo base_url();?>index.php/servicos/save">
          <input type="hidden" name="id" value="<?php echo $data->id; ?>">
          <input type="text" name="nome" value="<?php echo $data->nome; ?>">
          <input type="text" name="empresa" value="<?php echo $data->empresa; ?>">
          <input type="text" name="email" value="<?php echo $data->email; ?>">
          <input type="text" name="fone" value="<?php echo $data->telefone; ?>">
          <input type="text" name="site" value="<?php echo $data->site; ?>">
          <select name="eixo_cerne">
            <option value="0">Eixo cerne</option>
            <option value="1"
            <?php if($data->eixo_cerne == 1) echo "selected"; ?> >Empreendedor</option>
            <option value="2"
            <?php if($data->eixo_cerne == 2) echo "selected"; ?>>Capital</option>
            <option value="3"
            <?php if($data->eixo_cerne == 3) echo "selected"; ?> >Mercado</option>
            <option value="4"
            <?php if($data->eixo_cerne == 4) echo "selected"; ?> >Gestão</option>
            <option value="5"
            <?php if($data->eixo_cerne == 5) echo "selected"; ?> >Tecnológico</option>
          </select>
          <textarea name="atuacao" placeholder="Área de atuação" style="clear:both; width:70%; height:150px;"><?php echo $data->atuacao; ?></textarea>

          <button type="submit" class="btn btn-default btn-lg">
            <span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Salvar
          </button>
      </form>
      <?php }?>
    </div>
  </div>
