<div id="container-central">
<div>
  <p id="titulo_usuario">Serviços</p>
  <div id="block_usuario">
    <div class="row empreendimento_row">
      <div class="col-md-8"><p><b><?php echo $data->nome;?></b></p>
        <p><?php echo $data->empresa;?></p>
        Fone: <?php echo $data->telefone;?><br>
        e-mail: <?php echo $data->email;?><br>
        Site: <?php echo $data->site;?><br>
        Área de atuação: <?php echo $data->atuacao;?><br>
        Eixo CERNE:
        <?php switch ($data->eixo_cerne) {
        case 1:
          echo "Empreendedor";
          break;
        case 2:
          echo "Capital";
          break;
        case 3:
          echo "Mercado";
          break;
        case 4:
          echo "Gestão";
          break;
        case 5:
          echo "Tecnológico";
          break;
      }?>
      <br><br>
      <a href="<?php echo base_url();?>index.php/servicos/edita/<?php echo $data->id;?>" class="button_action">
      <button type="button" class="btn btn-default btn-lg">
        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Editar
      </button>
    </a><br><br>
    </div>
  </div>
</div>
