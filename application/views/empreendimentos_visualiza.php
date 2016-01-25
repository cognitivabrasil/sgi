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
      }?><br>sala 107<br>4 funcionários</div>
      <div class="col-md-4">
        <div class="selo_gamification_pequeno">Empresa<br>Consciente</div>
      </div>
      <div style="clear:both; margin-left:15px; text-align:center;">
        <a href="#">Download Canvas</a>&nbsp;/&nbsp;<a href="#">Download Logo</a>
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

        echo "<p>".$weak_ct->data." - <a href='#'>Download Contrato</a></p>";

      }
      ?>
      </div>
      <span class="sobrescrito_empreendimento">Última atualização em 10 dias</span>
    </div>
  </div>
</div>
