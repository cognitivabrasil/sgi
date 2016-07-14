<div id="container-central">
<div>
  <p id="titulo_usuario">Empreendimentos</p>
  <div id="block_usuario">
    <?php
    foreach($data as $row){
    ?>
    <div class="row empreendimento_row">
      <div class="col-md-4"><?php echo $row->nome;?><br><?php switch ($row->vinculo) {
        case 1:
          echo "Pré Incubada";
          break;
        case 2:
          echo "Incubada";
          break;
        case 3:
          echo "Parque";
          break;
      }?><br>sala 107<br><?php echo $row->nr;?> colaborador(es)</div>
      <div class="col-md-4">
        <div class="selo_gamification_pequeno">Empresa<br>Consciente</div>
      </div>
      <div class="col-md-4">
        <div class="visualizar_dados">
          <a href="<?php echo base_url();?>index.php/empreendimentos/visualiza/<?php echo $row->id;?>">Visualizar dados</a>
        </div>
        <span class="sobrescrito_empreendimento">Última atualização em 10 dias</span>
      </div>
    </div>
    <br>
    <?php
    }
    ?>
    <div style="text-align:center; margin-top:15px;">
      <a href="<?php echo base_url();?>index.php/empreendimentos/cadastra">Cadastrar novo empreendimento</a>
    </div>
  </div>
</div>
