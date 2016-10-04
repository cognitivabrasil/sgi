<div id="container-central">
  <div>
    <p id="titulo_usuario">Cadastro de serviços</p>
    <div id="block_usuario">
      <form method="post" action="<?php echo base_url();?>index.php/servicos/insert">
          <input type="text" name="nome" placeholder="Nome">
          <input type="text" name="empresa" placeholder="Empresa">
          <input type="text" name="email" placeholder="e-mail">
          <input type="text" name="fone" placeholder="Fone">
          <input type="text" name="site" placeholder="Site">
          <select name="eixo_cerne">
            <option value="0">Eixo cerne</option>
            <option value="1">Empreendedor</option>
            <option value="2">Capital</option>
            <option value="3">Mercado</option>
            <option value="4">Gestão</option>
            <option value="5">Tecnológico</option>
          </select>
          <textarea name="atuacao" placeholder="Área de atuação" style="clear:both; width:70%; height:150px;"></textarea>

          <button type="submit" class="btn btn-default btn-lg">
            <span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Salvar
          </button>
      </form>
    </div>
  </div>
