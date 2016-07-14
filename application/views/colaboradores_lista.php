<div id="container-central">
<div>
  <p id="titulo_usuario">Colaboradores - Cognitiva Brasil</p>
  <div id="block_usuario">
    <?php
    foreach($data as $row){
    ?>
    <div class="row empreendimento_row">
      <div class="col-md-4"><?php echo $row->nome;?><br><?php echo $row->funcao;?><br><?php switch ($row->vinculo) {
        case 1:
          echo "Aluno UFRGS";
          break;
        case 2:
          echo "Ex aluno UFRGS";
          break;
        case 3:
          echo "Sem Vinculo com a UFRGS";
          break;

      }?></div>
      <div class="col-md-4">
        &nbsp;
      </div>
      <div class="col-md-4">
        <div class="visualizar_dados">
          <a href="<?php echo base_url();?>index.php/colaboradores/visualiza/<?php echo $row->id;?>">Visualizar dados</a>
        </div>
      </div>
    </div>
    <br>
    <?php
    }
    ?>
    <div style="text-align:center; margin-top:15px;">
      <a href="<?php echo base_url();?>index.php/colaboradores/cadastra">Cadastrar novo colaborador</a>
    </div>
  </div>
</div>
