<div id="container-central">
<div>
  <p id="titulo_usuario">Patrimônios</p>
  <?php
  if($this->session->userdata('id_acesso') == 1){
  ?>
  <div style="float:right; padding-right:10px;">
    <a href="extras/import_patrimonios">
      <button type="button" class="btn btn-default" aria-label="Importar dados" title="Importar dados">
        <span class="glyphicon glyphicon-open-file" aria-hidden="true"></span>
      </button>
    </a>
  </div>
  <div style="float:right; padding-right:10px;">
    <a href="patrimonios/export_patrimonios" download="patrimonios.csv">
      <button type="button" class="btn btn-default" aria-label="Exportar dados" title="Exportar dados">
        <span class="glyphicon glyphicon-save-file" aria-hidden="true"></span>
      </button>
    </a>
  </div>
  <?php } ?>
  <div style="float:right; padding-right:10px;">
    <select class="form-control" id="search_sala" onchange="patrimonio_resp('sala');">
      <option value="0">Selecione uma sala</option>
      <?php foreach ($salas as $sala) { ?>
      <option value="<?php echo $sala->id; ?>">Sala <?php echo $sala->nr_sala; ?></option>
      <?php  }?>
    </select>
  </div>
  <div style="float:right; padding-right:10px;">
    <select class="form-control" id="search_resp" onchange="patrimonio_resp('resp');">
      <option value="0">Selecione um responsável</option>
      <?php foreach ($responsaveis as $responsavel) { ?>
        <option value="<?php echo $responsavel->responsavel;?>"><?php echo $responsavel->responsavel;?></option>
      <?php  }?>
    </select>
  </div>
  <div style="float:right; padding-right:10px; padding-top:4px;">
    <input type="text" onchange="patrimonio_resp('nr');" id="search_nr" placeholder="Nr. Patrimônio" >
  </div><br><br>
  <div id="block_usuario">
    <?php foreach ($data as $row) { ?>
    <div class="row patrimonio_row">
      <div class="col-md-2"><?php echo $row->nrpatrimonio; ?></div>
      <div class="col-md-4"><?php echo $row->nome; ?></div>
      <div class="col-md-2"><?php echo $row->responsavel; ?></div>
      <div class="col-md-2">
        <span class="sobrescrito_empreendimento"><?php if(isset($row->sala)){ echo $row->sala->data_atribuicao; }else{ echo "Não atribuído"; }?></span>
      </div>
      <div class="col-md-2">
          <a href="<?php echo base_url();?>index.php/patrimonios/visualiza/<?php echo $row->id;?>" class="button_action">
            <button type="button" class="btn btn-default btn-xs">
              <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            </button>
          </a>
          <?php
          if($this->session->userdata('id_acesso') == 1){
          ?>
            <a href='<?php echo base_url(); ?>index.php/patrimonios/remove/<?php echo $row->id;?>' class='deleta_agendamento'>
              <button type='button' class='btn btn-default btn-xs'>
                <span class='glyphicon glyphicon-remove' aria-hidden='true'></span>
              </button>
            </a>
          <?php } ?>
      </div>
    </div><br>
    <?php  } ?>
    <div style="text-align:center; margin-top:15px;">
      <?php if($this->session->userdata('id_acesso')==1){ ?>
      <a href="<?php echo base_url();?>index.php/patrimonios/cadastra" class="button_action">
        <button type="button" class="btn btn-default btn-lg">
          <span class="glyphicon glyphicon-duplicate" aria-hidden="true"></span> Novo
        </button>
      </a>
      <?php }?>
    </div>
  </div>
</div>
