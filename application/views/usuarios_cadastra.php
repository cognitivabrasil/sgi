<div id="container-central">
  <div>
    <p id="titulo_usuario">Cadastro de usuário</p>
    <div id="block_usuario">
      <form method="post" action="<?php echo base_url();?>index.php/usuarios/insert">
          <input type="text" name="nome" placeholder="Nome">
          <input type="text" name="login" placeholder="Login">
          <input type="text" name="empresa" placeholder="Empresa">
          <input type="password" name="senha" placeholder="Senha">
          <select name="acesso">
            <option value="0">Nível de acesso</option>
            <option value="1">Administrador</option>
            <option value="2">CEI</option>
            <option value="3">Usuário</option>
          </select>
          <input type="text" name="contato" placeholder="Contato">
          <input type="submit" value="Criar usuário">
      </form>
    </div>
  </div>
