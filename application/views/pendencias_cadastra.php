<div id="container-central">
  <div>
    <p id="titulo_usuario">Cadastro de pendências</p>
    <div id="block_usuario">
      <form method="post" action="<?php echo base_url();?>pendencias/insert">
          <input type="text" name="nome" placeholder="Nome">
          <select type="text" name="situacao">
            <option value="0">Situação</option>
            <option value="1">Enviada</option>
            <option value="2">Resolvida</option>
          </select>
          <textarea name="descricao" placeholder="Descrição" style="width:70%; height:150px;"></textarea>
          <input type="submit" value="Cadastra pendência" style="clear:both;">
      </form>
    </div>
  </div>
