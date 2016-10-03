<div id="container-central">
<div>
  <p id="titulo_usuario">Releasing</p>
  <div id="block_usuario">
    <?php print_r($data); ?>
      <div class="row empreendimento_row">
        <p><?php echo $data[0]->nome; ?></p>
        <p><?php echo $data[0]->nome_empreendimento; ?></p>
        <p><?php echo $data[0]->descricao; ?></p> 
      </div>
  </div>
</div>
