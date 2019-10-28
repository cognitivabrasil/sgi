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
          <?php echo 'Data: '. $row->data;?>
          <br>
          <?php echo 'Usuario: '. $row->usuario;?>
          <br>
          <?php echo 'Mensagem: '. $row->mensagem;?>
        </div>

      </div>
      <br>
      <?php
      }
      ?>
    </div>
    <?php } ?>
  </div>
</div>
