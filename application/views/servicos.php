<div id="container-central">
<div>
  <p id="titulo_usuario">Parceiros</p>
  <div style="float:right; padding-right:10px;">
    <select class="form-control" id="filtra_area">
      <option value="">Área de atuação</option>
      <option value="todos">Todos</option>
      <?php foreach ($areas as $row) { ?>
        <option value="<?php echo urlencode(str_replace(' ','_',$row->atuacao));?>"><?php echo $row->atuacao;?></option>
      <?php } ?>
    </select>
  </div><br><br>
  <div id="block_usuario">
    <?php
    foreach($data as $row){
    ?>
    <div class="row empreendimento_row">
      <div class="col-md-8"><?php echo $row->nome;?><br>
      <?php echo $row->empresa; ?><br>
      Área: <?php echo $row->atuacao; ?><br>
      <?php echo $row->telefone; ?><br>
      </div>
      <div class="col-md-2">
      <!--  <div class="selo_gamification_pequeno">Empresa<br>Consciente</div> -->
      &nbsp;
      </div>
      <div class="col-md-2">
        <?php
        if($this->session->userdata('id_acesso') == 1){
        ?>
          <a href='<?php echo base_url(); ?>index.php/servicos/remove/<?php echo $row->id;?>' class='deleta_agendamento' style="float:right; margin-top:-7px; margin-right:-15px;">
            <button type='button' class='btn btn-default btn-xs'>
              <span class='glyphicon glyphicon-remove' aria-hidden='true'></span>
            </button>
          </a>
        <?php } ?>
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
      <?php if($this->session->userdata('id_acesso')==1){ ?>
      <a href="<?php echo base_url();?>index.php/servicos/cadastra" class="button_action">
      <button type="button" class="btn btn-default btn-lg">
        <span class="glyphicon glyphicon-duplicate" aria-hidden="true"></span> Novo
      </button>
      </a>
      <?php } ?>
    </div>
  </div>
</div>
