<div id="container-central">
  <div>
    <p id="titulo_usuario">Cadastro de empreendimento</p>
    <div id="block_usuario">
      <form method="post" action="<?php echo base_url();?>empreendimentos/insert">
          <p class="subtitulo_empreendimentos">Dados Gerais</p>
          <div style="float:left;">
            <input type="text" name="nome" placeholder="Nome">
            <select name="acesso">
              <option value="0">Vínculo</option>
              <option value="1">Pré-Incubada</option>
              <option value="2">Incubada</option>
              <option value="3">Parque</option>
            </select>
            <input type="text" name="site" placeholder="Site">
            <input type="text" name="cpfcnpj" placeholder="CPF / CNPJ">
          </div>
          <div style="float:left; margin-left:40px; padding-bottom:3px;">
            <input type="password" name="fantasia" placeholder="Nome Fantasia">
            <input type="text" name="rs" placeholder="Razão social">
            <input type="text" name="responsavel" placeholder="Nome responsável">
            <input type="text" name="emailresponsavel" placeholder="e-mail responsável">
          </div>
          <textarea name="descricao" placeholder="Descrição" style="clear:both; width:70%; height:150px;"></textarea>
          <label for="logo" style="margin-left:5px; font-weight:normal;">Logo: </label><input type="file" name="logo" id="logo">
          <label for="canvas" style="margin-left:5px; font-weight:normal;">Canvas: </label><input type="file" name="canvas" id="canvas">

          <hr>

          <p class="subtitulo_empreendimentos">Produtos / Serviços</p>
          <input type="button" value="Adicionar mais um" style="float:right">
          <input type="text" name="nome_produto" placeholder="Nome">
          <textarea name="descricao_produto" placeholder="Descrição" style="clear:both; width:70%; height:150px;"></textarea>

          <hr>

          <p class="subtitulo_empreendimentos">Contrato</p>
          <input type="button" value="Adicionar mais um" style="float:right">
          <input type="text" name="assinatura_contrato" placeholder="Data de assinatura">
          <label for="contrato" style="margin-left:5px; font-weight:normal;">Contrato: </label><input type="file" name="contrato" id="contrato">
          <span style="float:right;">Previsão de término: 99/99/9999</span>

          <input type="submit" value="Cadastra empreendimento" style="clear:both;">
      </form>
    </div>
  </div>
