<div id="container-central">
  <div>
    <p id="titulo_usuario">Cadastro de usuário</p>
    <div id="block_usuario">
      <form method="post" action="<?php echo base_url();?>index.php/usuarios/insert">
          <input type="text" name="nome" placeholder="Nome">
          <input type="text" name="login" placeholder="Login">
          <select name="empresa">
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
          <input type="password" name="senha" placeholder="Senha">
          <select name="acesso">
            <option value="0">Nível de acesso</option>
            <option value="1">Administrador</option>
            <option value="2">CEI</option>
            <option value="3">Usuário</option>
          </select>
          <input type="text" name="contato" placeholder="Contato">
          <button type="submit" class="btn btn-default btn-lg">
            <span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Salvar
          </button>
      </form>
    </div>
  </div>
