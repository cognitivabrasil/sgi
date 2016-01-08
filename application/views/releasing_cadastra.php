<div id="container-central">
  <div>
    <p id="titulo_usuario">Cadastro de releasing</p>
    <div id="block_usuario">
      <form method="post" action="<?php echo base_url();?>usuarios/insert">
          <input type="text" name="nome" placeholder="Nome">
          <input type="text" name="empreendimento" placeholder="Empreendimento">
          <input type="text" name="data" placeholder="Data: 99/99/9999">
          <textarea name="descricao" placeholder="Descrição do evento, prêmio ou acontecimento" style="width:400px; height:100px;"></textarea>
          <input type="file" name="imagem">
          <input type="submit" value="Salvar releasing" style="clear:both;">
      </form>
    </div>
  </div>
