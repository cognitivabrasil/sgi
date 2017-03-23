<div id="container-central">
  <div>
    <p id="titulo_usuario">Cadastro de requisições</p>
    <div id="block_usuario">
      <form method="post" action="<?php echo base_url();?>index.php/pendencias/insert">
          <input type="text" name="nome" placeholder="Nome">
          <?php if($this->session->userdata('id_acesso')==1){ ?>
            <select type="text" name="empresa">
              <option value="0">Empreendimento</option>
              <?php foreach ($empresas as $empresa) { ?>
                <option value="<?php echo $empresa->id?>"><?php echo $empresa->nome?></option>
              <?php }?>
            </select>
          <?php } ?>
          <select type="text" name="situacao">
            <option value="0">Situação</option>
            <option value="1">enviada</option>
            <option value="2">em andamento</option>
            <option value="3">resolvida</option>
            <option value="4">cancelada</option>
          </select>
          <textarea name="descricao" placeholder="Descrição" style="width:70%; height:150px;"></textarea>
          <button type="submit" class="btn btn-default btn-lg">
            <span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Salvar
          </button>
      </form>
    </div>
  </div>
