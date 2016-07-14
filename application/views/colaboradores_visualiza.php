<div id="container-central">
<div>
  <p id="titulo_usuario">Colaboradores - Cognitiva Brasil</p>
  <div id="block_usuario">
    <?php
    foreach($data as $row){
    ?>
    <div class="row empreendimento_row">
      <div class="col-md-12"><?php echo $row->nome;?><br><?php echo $row->funcao;?><br><?php switch ($row->vinculo) {
        case 1:
          echo "Aluno UFRGS";
          break;
        case 2:
          echo "Ex aluno UFRGS";
          break;
        case 3:
          echo "Sem Vinculo com a UFRGS";
          break;

      }?><br><?php echo $row->email;?><br>Entrada: <?php echo $row->entrada;?> - <?php if($row->em_atividade == 1){echo "Ainda em atividade";}else{echo "Saída: ".$row->saida;}?>
      <?php
      if($row->sem_funcao == 1){
        echo "<br>Sem função designada";
      }
      if($row->socio == 1){
        echo "<br>Sócio";
      }?></div>
    </div>
    <?php
    }
    ?>
    <div style="text-align:center; margin-top:15px;">
      <a href="<?php echo base_url();?>index.php/colaboradores/cadastra">Cadastrar novo colaborador</a>
    </div>
  </div>
</div>
