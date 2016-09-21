<div id="container-central">
  <div>
    <p id="titulo_usuario">Alterar senha</p>
    <div id="block_usuario">
      <form method="post" action="<?php echo base_url();?>index.php/usuarios/alterasenhafinal">
          <p><?php echo $data[0]->nome;?></p>
          <input type="hidden" value="<?php echo $data[0]->id_usuario;?>" name="id_usuario">
          <input type="password" name="senha_antiga" placeholder="Senha Antiga">
          <input type="password" name="nova_senha" id="nova_senha" placeholder="Nova Senha">
          <input type="password" name="nova_senha_review" id="confirma_nova_senha" placeholder="Confirmar Nova senha">
          <input type="submit" id="altera_senha" value="Alterar senha">
      </form>
    </div>
  </div>
