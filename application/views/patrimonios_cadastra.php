<div id="container-central">
  <div>
    <p id="titulo_usuario">Cadastro de patrimônios</p>
    <div id="block_usuario">
      <form method="post" action="<?php echo base_url();?>index.php/patrimonios/insert">
          <input type="text" name="nome" placeholder="Nome">
          <input type="text" name="nr" placeholder="Nr. Patrimônio">
          <input type="text" name="responsavel" placeholder="Responsável na UFRGS">
          <textarea name="descricao" placeholder="Descrição" style="width:70%; height:150px;"></textarea>
          <button type="submit" class="btn btn-default btn-lg">
            <span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Salvar
          </button>
      </form>
    </div>
  </div>
