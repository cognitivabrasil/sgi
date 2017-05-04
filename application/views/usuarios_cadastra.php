<div id="container-central">
  <div>
    <p id="titulo_usuario">Cadastro de usuário</p>
    <?php
    if($this->session->userdata('id_acesso') == 1){
    ?>
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
            <option value="<?php echo $empresa->id;?>"><?php echo $empresa->nome;?></value>
            <?php
            }
            ?>
          </select>
          <span style="float:right; padding-right:15%;">* A senha deve ter no mínimo 8 caracteres, uma letra minúscula, <br>uma letra maiúscula, um caractere numérico e um caractere especial</span>
          <input type="password" name="senha" placeholder="Senha" id="senha_testa">
          <select name="acesso">
            <option value="0">Nível de acesso</option>
            <option value="1">Administrador</option>
            <option value="2">CEI</option>
            <option value="3">Admin Empresa</option>
            <option value="4">Usuário Empresa</option>
          </select>
          <input type="text" name="contato" placeholder="Contato">
          <button type="submit" class="btn btn-default btn-lg" disabled="false" id="bt_salvar" onclick="verificaQualidadeSenha();">
            <span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Salvar
          </button>
      </form>
    </div>
    <?php } ?>
  </div>
