<div id="container-central">
<div>
  <p id="titulo_usuario">Consultores</p>
  <div id="block_usuario">
    <div class="row empreendimento_row">
      <div class="col-md-12">
        <?php echo 'Nome: '.$data->nome;?><br>
        <?php echo 'Telefone: '.$data->contato;?><br>
        <?php echo 'Area de atuação: '.$data->area_atuacao;?><br>
        Horas: <?php echo $data->minutos_totais;?>
      </div>
    </div>
      <div style="text-align:center; margin-top:15px;">
        <a href="<?php echo base_url();?>index.php/consultores/edita/<?php echo $data->id;?>" class="button_action">
          <button type="button" class="btn btn-default btn-lg">
            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Editar
          </button>
        </a>
        <a href="<?php echo base_url();?>index.php/consultores/remove/<?php echo $data->id;?>" class="deleta_usuario"  data-toggle="tooltip">
          <button type="button" class="btn btn-default btn-lg">
            <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Excluir
          </button>
        </a>
      </div><br>
  </div>
</div>
