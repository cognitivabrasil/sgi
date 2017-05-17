<div id="container-central">
  <div>
    <p id="titulo_usuario">Alterar duração do usuário</p>
    <div id="block_usuario">
      <form method="post" action="<?php echo base_url();?>index.php/usuarios/alteraduracaofinal" id="form_alterasenha">
          <?php
            if(!$data[0]->duracao){
              $data[0]->duracao = "indeterminada";
            }
          ?>
          <p><?php echo $data[0]->nome;?> - válido até: <?php echo $data[0]->duracao;?></p>
          <input type="hidden" value="<?php echo $data[0]->id_usuario;?>" name="id_usuario">
          <input type="date" name="duracao_nova">
          <button type="submit" class="btn btn-default btn-lg">
            <span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Salvar
          </button>
      </form>
    </div>
  </div>
