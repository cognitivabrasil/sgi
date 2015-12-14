<div id="container-central">
  <div>
    <p id="titulo_usuario">Cadastro de usuário</p>
    <div id="block_usuario">
      <form method="post" action="<?php echo base_url();?>usuarios/insert">
          <input type="text" name="login" placeholder="login">
          <input type="text" name="empresa" placeholder="empresa">
          <input type="password" name="senha" placeholder="senha">
          <select name="acesso">
            <option value="0">Nível de acesso</option>
            <option value="1">Administrador</option>
            <option value="2">CEI</option>
            <option value="3">Usuário</option>
          </select>
          <input type="text" name="contato" placeholder="contato">
          <input type="submit" value="Criar usuário">
      </form>
    </div>
  </div>
