<div id="container-central">
  <div>
    <p id="titulo_usuario">Cadastro de salas</p>
    <div id="block_usuario">
      <form method="post" action="<?php echo base_url();?>index.php/salas/insert">
          <input type="text" name="nr" placeholder="Número">
          <input type="text" name="funcao" placeholder="Função">
          <textarea name="descricao" placeholder="Descrição" style="width:70%; height:150px;"></textarea>
          <br><p>Disponível para locação?</p>
          <p><input type="radio" id="sim" name="disponivel" value="1" style="float:left; width:auto;"><label for="sim" style="float:left;">Sim</label></p>
          <p><input type="radio" id="nao" name="disponivel" value="0" style="float:left; width:auto;"><label for="nao" style="float:left;">Não</label></p>
          <br><br><p>Locável apenas pelo CEI?</p>
          <p><input type="radio" id="CEI_sim" name="travada_cei" value="1" style="float:left; width:auto;"><label for="CEI_sim" style="float:left;">Sim</label></p>
          <p><input type="radio" id="CEI_nao" name="travada_cei" value="0" style="float:left; width:auto;"><label for="CEI_nao" style="float:left;">Não</label></p>
          <br><br>
          <button type="submit" class="btn btn-default btn-lg">
            <span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Salvar
          </button>
      </form>
    </div>
  </div>
