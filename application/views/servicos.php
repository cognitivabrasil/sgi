<div id="container-central">
<div>
  <p id="titulo_usuario">Serviços</p>
  <div id="block_usuario">
    <?php
    foreach($data as $row){
    ?>
    <div class="row empreendimento_row">
      <div class="col-md-4"><?php echo $row->nome;?><br>
      <?php echo $row->empresa; ?><br>
      <?php echo $row->telefone; ?><br>
      </div>
      <div class="col-md-6">
      <!--  <div class="selo_gamification_pequeno">Empresa<br>Consciente</div> -->
      &nbsp;
      </div>
      <div class="col-md-2">
        <div class="visualizar_dados">
          <a href="<?php echo base_url();?>index.php/servicos/visualiza/<?php echo $row->id;?>" class="button_action">
            <button type="button" class="btn btn-default btn-lg">
              <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            </button>
          </a>
        </div>
      </div>
    </div>
    <br>
    <?php
    }
    ?>
    <div style="text-align:center; margin-top:15px;">
      <a href="<?php echo base_url();?>index.php/servicos/cadastra" class="button_action">
      <button type="button" class="btn btn-default btn-lg">
        <span class="glyphicon glyphicon-duplicate" aria-hidden="true"></span> Novo
      </button>
      </a>
    </div>
  </div>
</div>
