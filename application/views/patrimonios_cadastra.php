<div id="container-central">
  <div>
    <p id="titulo_usuario">Cadastro de patrimônios</p>
    <div id="block_usuario">
      <form method="post" action="<?php echo base_url();?>empreendimentos/insert">
          <input type="text" name="nome" placeholder="Nome">
          <input type="text" name="nr" placeholder="Nr. Patrimônio">
          <input type="text" name="responsavel" placeholder="Responsável na UFRGS">
          <textarea name="descricao" placeholder="Descrição" style="width:70%; height:150px;"></textarea>
          <input type="submit" value="Cadastra patrimônio" style="clear:both;">
      </form>
    </div>
  </div>
