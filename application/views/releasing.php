<div id="container-central">
<div>
  <p id="titulo_usuario">Releasing</p>
  <div id="block_usuario">
    <?php
    foreach ($data as $releasing) {
    ?>
    <div class="row empreendimento_row">
      <div class="col-md-4"><?php
      echo $releasing->nome;
      echo "<br>";
      echo $releasing->nome_empreendimento;
      echo "<br>";
      echo $releasing->data;
      ?></div>
      <div class="col-md-8">
        <?php
        if($releasing->anexo!=''){
        ?>
        <img style="max-width:90px;" src="<?php echo base_url($releasing->anexo); ?>">
        <?php
        }else{
        ?>
        <div class="selo_gamification_pequeno">Preview<br>Imagem</div>
        <?php } ?>
        <div class="visualizar_dados" style="float:right; padding-top:25px;">
          &nbsp;&nbsp;&nbsp;<a href="<?php echo base_url();?>index.php/releasing/lista/<?php echo $releasing->id?>">Visualizar</a>
        </div>
      </div>
    </div><br>
    <?php
    }
    ?>
    <div style="text-align:center; margin-top:15px;">
      <a href="<?php echo base_url();?>index.php/releasing/cadastra">Inserir releasing</a>
    </div>
  </div>
</div>
