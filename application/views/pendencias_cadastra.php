  <script type="text/javascript">
      $(document).ready(function() {
      $('#inputOculto').hide();
      $('#tipo').change(function() {
        if ($('#tipo').val() == '1') {
          $('#inputOculto').show();
        } else {
          $('#inputOculto').hide();
        }
      });
    });
  </script>
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
          <select type="text" name="tipo" id="tipo">
            <option value="0">Tipo</option>
            <option value="1">Consultoria</option>
            <option value="2">Participação em eventos</option>
            <option value="3">Espaço físico</option>
            <option value="4">Outros</option>
          </select>
          <div id="inputOculto">
              <select type="text" name="consultor">
                <option value="0">Consultor</option>
                <?php foreach ($consultores as $consultores) { ?>
                  <option value="<?php echo $consultores->id?>"><?php echo $consultores->nome?></option>
                <?php }?>
              </select>
          <input type="text" name="tempo" placeholder="Horas de consultoria no formato HH:MM">
          </div>
          <textarea name="descricao" placeholder="Descrição" style="width:70%; height:150px;"></textarea>
          <button type="submit" class="btn btn-default btn-lg">
            <span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Salvar
          </button>
      </form>
    </div>
  </div>
