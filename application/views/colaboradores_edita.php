<script>
  webshims.setOptions('waitReady', false);
  webshims.setOptions('forms-ext', {types: 'date'});
  webshims.polyfill('forms forms-ext');
</script>
<div id="container-central">
  <div>
    <p id="titulo_usuario">Edição de colaboradores</p>
    <div id="block_usuario">
      <form method="post" class="colaboradores_cadastra" action="<?php echo base_url();?>index.php/colaboradores/save">
          <input type="hidden" name="id" value="<?php echo $data->id;?>">
          <input type="text" name="nome" value="<?php echo $data->nome;?>">
          <div style="width:30%; float:right; margin-right:40%;"><input type="checkbox" name="sem_funcao" style="float:left; width:10px;" value="1" <?php if($data->sem_funcao == 1) echo "checked"?> ><span style="float:left;">Sem função designada</span></div>
          <input type="text" name="funcao" value="<?php echo $data->funcao;?>" placeholder="Função">
          <select name="vinculo">
            <option value="0" <?php if($data->vinculo == 0) echo "selected"?>>Vínculo UFRGS</option>
            <option value="1" <?php if($data->vinculo == 1) echo "selected"?>>Aluno</option>
            <option value="2" <?php if($data->vinculo == 2) echo "selected"?>>Ex Aluno</option>
            <option value="3" <?php if($data->vinculo == 3) echo "selected"?>>Sem Vínculo</option>
          </select>
          <input type="text" name="email" placeholder="E-mail" value="<?php echo $data->email;?>">
          <input type="date" name="entrada" data-date='{"startView": 2, "openOnMouseFocus": true}' style="float:left; width:135px;" value="<?php echo explode(' ',$data->entrada)[0];?>">
          <?php
          if(!($data->em_atividade == 1)){
            $data->saida = explode(' ',$data->saida)[0];
          }
          ?>
          <input type="date" name="saida" data-date='{"startView": 2, "openOnMouseFocus": true}' style="float:left; width:135px;" value="<?php echo $data->saida;?>">
          <input type="checkbox" name="em_atividade" style="float:left; width:10px;" value="1" <?php if($data->em_atividade == 1) echo "checked"?>><span style="float:left;">Ainda em atividade</span>
          <input type="checkbox" name="socio" style="float:left; width:10px; clear:both;" value="1" <?php if($data->socio == 1) echo "checked"?>><span style="float:left;">Sócio</span>
          <input type="hidden" value="<?php echo $data->id_empreendimento;?>" name="empresa"><br><br><br><br>
          <button type="submit" class="btn btn-default btn-lg">
            <span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Salvar
          </button>
      </form>
    </div>
  </div>
