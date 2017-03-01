<div id="container-central">
  <div>
    <p id="titulo_usuario">Cadastro de empreendimento</p>
    <div id="block_usuario">
      <form method="post" action="<?php echo base_url();?>index.php/empreendimentos/insert" enctype="multipart/form-data">
          <p class="subtitulo_empreendimentos">Dados Gerais</p>
            <input type="text" name="nome" placeholder="Nome">
            <select name="vinculo">
              <option value="0">Vínculo</option>
              <option value="1">Pré-Incubada</option>
              <option value="2">Incubada</option>
              <option value="3">Parque</option>
              <option value="4">Outros</option>
            </select>
            <input type="text" name="cpfcnpj" placeholder="CPF / CNPJ">
            <input type="text" name="responsavel" placeholder="Nome responsável">

          <button type="submit" class="btn btn-default btn-lg">
            <span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Salvar
          </button>
      </form>
    </div>
  </div>
