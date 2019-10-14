<script>
  webshims.setOptions('waitReady', false);
  webshims.setOptions('forms-ext', {types: 'date'});
  webshims.polyfill('forms forms-ext');
</script>
<div id="container-central">
  <div>
    <p id="titulo_usuario">Cadastro de consultores</p>
    <div id="block_usuario">
      <form method="post" class="consultores_cadastra" action="<?php echo base_url();?>index.php/consultores/insert/<?php if($this->session->userdata('id_empreendimento') == 1){echo 32; }else{ echo $this->session->userdata('id_empreendimento');}?>">
          <input type="text" name="nome" placeholder="Nome" style="width:40%;">
          <input type="text" name="contato" placeholder="Contato (email/telefone)" style="width:40%;">
          <input type="text" name="area_atuacao" placeholder="Área de atuação" style="width:40%;">
          <input type="text" name="horas_disponiveis" placeholder="Horas disponíveis no formato HH:MM" style="width:50%;">
          <button type="submit" class="btn btn-default btn-lg">
            <span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Salvar
          </button>
      </form>
    </div>
  </div>
