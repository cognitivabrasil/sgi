<div id="container-central">
  <div>
    <p id="titulo_usuario">Relatórios</p>
    <?php if($this->session->userdata('id_acesso')==1){ ?>
    <div id="block_usuario">
      <?php
      foreach($data as $row){
      ?>
      <div class="row empreendimento_row">

        <div class="col-md-8">
          <?php echo $row->acao;?>
          <br>
          <?php echo 'Criada/Alterada em :'.date("d/m/Y H:i", strtotime($row->data));?>
          <br>
          <?php echo '<a href="'.base_url().'index.php/pendencias/visualiza/'.$row->id_pendencia.'">Acessar requisição</a>';?>
        </div>
        <div class="col-md-3">
        <div class="visualizar_dados" style="float:right; padding-top:10px;">
          <a href="<?php echo base_url();?>index.php/relatorios/visualiza_pendencia/<?php echo $row->id_pendencia;?>" class="button_action">
            <button type="button" class="btn btn-default btn-lg">
              <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            </button>
          </a>
          <br>
        </div>

      </div>
  </div>
      <br>

      <?php
      }
      ?>

    <?php } ?>
  </div>
</div>
