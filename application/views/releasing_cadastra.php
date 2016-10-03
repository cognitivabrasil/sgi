<div id="container-central">
  <div>
    <p id="titulo_usuario">Cadastro de releasing</p>
    <div id="block_usuario">
      <form method="post" action="<?php echo base_url();?>index.php/releasing/insert" enctype="multipart/form-data">
          <input type="text" name="nome" placeholder="Nome">
          <select name="empreendimento">
            <option value="0">Selecione a empresa</value>
            <option value="1">CEI</value>
            <?php
            foreach ($empresas as $empresa) {
            ?>
            <option value="<?php echo $empresa->id;?>"><?php echo $empresa->nome_fantasia;?></value>
            <?php
            }
            ?>
          </select>
          <p><span style="float:left; margin-top:7px;">&nbsp;Data: </span><input style="float:left;" type="date" name="data"></p>
          <textarea name="descricao" placeholder="Descrição do evento, prêmio ou acontecimento" style="width:400px; height:100px; clear:both;"></textarea>
          <input type="file" name="imagem">
          <input type="submit" value="Salvar releasing" style="clear:both;">
      </form>
    </div>
  </div>
