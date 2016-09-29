<div id="container-central">
<div>
  <p id="titulo_usuario">Salas</p>
  <div id="block_usuario">
    <?php foreach ($data as $row) { ?>
    <div class="row empreendimento_row">
      <div class="col-md-4"><?php echo $row->nr_sala; ?></div>
      <div class="col-md-4"><?php echo $row->funcao; ?></div>
      <div class="col-md-4">
        <div class="visualizar_dados">
          <a href="<?php echo base_url();?>index.php/salas/visualiza/<?php echo $row->id;?>">Visualizar dados</a>
        </div>
      </div>
    </div><br>
    <?php  } ?>
    <div style="text-align:center; margin-top:15px;">
      <a href="<?php echo base_url();?>index.php/salas/cadastra">Cadastrar nova sala</a>
    </div>
  </div>
</div>
