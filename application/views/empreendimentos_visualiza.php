<div id="container-central">
<div>
  <p id="titulo_usuario">Empreendimentos</p>
  <div id="block_usuario">
    <div class="row empreendimento_row">
      <div class="col-md-8"><p><b><?php echo $data[0]->nome;?></b></p>
        <p><?php echo $data[0]->descricao;?></p>
        Nome Fantasia: <?php echo $data[0]->nome_fantasia;?><br>
        Razão Social: <?php echo $data[0]->razao_social;?><br>
        CPF/CNPJ: <?php echo $data[0]->cpf_cnpj;?><br>
        Site: <?php echo $data[0]->site;?><br>
        Responsável: <?php echo $data[0]->responsavel;?> - <?php echo $data[0]->responsavel_email;?><br>
        <?php switch ($data[0]->vinculo) {
        case 1:
          echo "Pré Incubada";
          break;
        case 2:
          echo "Incubada";
          break;
        case 3:
          echo "Parque";
          break;
      }?><br>sala 107<br><?php echo $data[0]->nr;?> colaborador(es)</div>
      <div class="col-md-4">
      <!--  <div class="selo_gamification_pequeno">Empresa<br>Consciente</div> -->
      </div>
      <div style="clear:both; margin-left:15px; text-align:center;">
        <a target="_blank" href="<?php echo base_url();?>index.php/empreendimentos/download/<?php echo $data[0]->id;?>/canvas">
          <button type="button" class="btn btn-default btn-lg">
            <span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span> Canvas
          </button>
        </a>
        <a target="_blank" href="<?php echo base_url();?>index.php/empreendimentos/download/<?php echo $data[0]->id;?>/logo">
          <button type="button" class="btn btn-default btn-lg">
            <span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span> Logo
          </button>
        </a>
      </div>
      <div style="clear:both; margin-left:15px;">
        <br><p><b>Produtos/Serviços</b></p>
      <?php
      foreach($weak_data_ps as $weak_ps){
        echo "<p>".$weak_ps->nome."<br>".$weak_ps->descricao."</p>";
      }
      ?>
        <p><b>Contratos</b></p>
      <?php
      foreach($weak_data_ct as $weak_ct){

        echo "<p>".$weak_ct->data." - <a href=".base_url()."index.php/empreendimentos/download/".$weak_ct->id."/ct><button type='button' class='btn btn-default btn-sm'>
          <span class='glyphicon glyphicon-download-alt' aria-hidden='true'></span> Contrato
        </button></a></p>";

      }
      ?>
      </div>
      <div style="text-align:center; margin-top:15px;">
        <a href="<?php echo base_url();?>index.php/empreendimentos/edita/<?php echo $data[0]->id;?>" class="button_action">
          <button type="button" class="btn btn-default btn-lg">
            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Editar
          </button>
        </a>
      </div><br>
      <span class="sobrescrito_empreendimento">Última atualização em 10 dias</span>
    </div>
  </div>
</div>
