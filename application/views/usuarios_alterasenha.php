<div id="container-central">
  <div>
    <p id="titulo_usuario">Alterar senha</p>
    <div id="block_usuario">
      <form method="post" action="<?php echo base_url();?>index.php/usuarios/alterasenhafinal" id="form_alterasenha">
          <p><?php echo $data[0]->nome;?></p>
          <input type="hidden" value="<?php echo $data[0]->id_usuario;?>" name="id_usuario">
          <input type="password" name="senha_antiga" placeholder="Senha Antiga">
          <span style="float:right; padding-right:15%;">* A senha deve ter no mínimo 8 caracteres, uma letra minúscula, <br>uma letra maiúscula, um caractere numérico e um caractere especial</span>
          <input type="password" name="nova_senha" placeholder="Nova Senha" id="senha_testa">
          <input type="password" name="nova_senha_review" id="confirma_nova_senha" placeholder="Confirmar Nova senha">
          <button type="submit" class="btn btn-default btn-lg" disabled="false" id="bt_salvar" onclick="verificaQualidadeSenha();">
            <span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Salvar
          </button>
      </form>
    </div>
  </div>
