<div id="container-central">
  <div>
    <p id="titulo_usuario">Alterar duração do usuário</p>
    <div id="block_usuario">
      <form method="post" action="<?php echo base_url();?>index.php/usuarios/alteraduracaofinal" id="form_alterasenha">
          <?php
            if(!$data[0]->duracao){
              $data[0]->duracao = "indeterminada";
            }else{
              $aux = explode(' ',$data[0]->duracao);
              $aux2 = explode('-',$aux[0]);
              $data[0]->duracao = $aux2[2].'/'.$aux2[1].'/'.$aux2[0];
            }
          ?>
          <p><?php echo $data[0]->nome;?> - válido até: <?php echo $data[0]->duracao;?></p>
          <input type="hidden" value="<?php echo $data[0]->id_usuario;?>" name="id_usuario">
          <input type="date" name="duracao_nova">
          <span>Sem duração:<input type="checkbox" value="1" name="duracao_indeterminada" style="margin:0px; width:20px;"></span><br>
          <button type="submit" class="btn btn-default btn-lg">
            <span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Salvar
          </button>
      </form>
    </div>
  </div>
