<div id="container-central">
<div>
  <p id="titulo_usuario">Consultores</p>
  <div id="block_usuario">
    <div class="row empreendimento_row">
      <div class="col-md-12">
        <?php echo 'Nome: '.$data->nome;?><br>
        <?php echo 'Telefone: '.$data->contato;?><br>
        <?php echo 'Area de atuação: '.$data->area_atuacao;?><br>
        <?php echo 'Total de horas: '.$data->minutos_totais;?><br>
        <?php echo 'Horas disponíveis: '.$data->minutos_disponiveis;?><br>        
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
        <a href="<?php echo base_url();?>index.php/consultores/visualiza_relatorios/<?php echo $data->id;?>" class="button_action"  data-toggle="tooltip">
          <button type="button" class="btn btn-default btn-lg">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> Relatórios
          </button>
        </a>
      </div><br>
  </div>
</div>
