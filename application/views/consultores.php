<div id="container-central">
<div>
  <p id="titulo_usuario">Consultores</p>
  <?php if($this->session->userdata('id_acesso')==1){ ?>
  <div id="block_usuario">
    <?php
    foreach($data as $row){
    ?>
    <div class="row empreendimento_row">
      <div class="col-md-4"><?php echo $row->nome;?></div>
      <div class="col-md-5">Disponível: <?php echo $row->minutos_disponiveis;?> minutos</div>
      <div class="col-md-3">

          <a href="<?php echo base_url();?>index.php/consultores/visualiza/<?php echo $row->id;?>" class="button_action">
            <button type="button" class="btn btn-default btn-lg">
              <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            </button>
          </a>
      </div>
    </div>
    <br>
    <?php
    }
    ?>
    </div>
    <div style="text-align:center; margin-top:15px;">
      <a href="<?php echo base_url();?>index.php/consultores/cadastra" class="button_action">
        <button type="button" class="btn btn-default btn-lg">
          <span class="glyphicon glyphicon-duplicate" aria-hidden="true"></span> Novo
        </button>
      </a>
    </div><br>
    <?php } ?>
</div>
