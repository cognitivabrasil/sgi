<div id="container-central">
<div>
  <p id="titulo_usuario">Pendências</p>
  <div id="block_usuario">
    <?php foreach($data as $row){ ?>
      <div class="row empreendimento_row">
        <div class="col-md-4"><?php echo $row->nome; ?></div>
        <div class="col-md-4">
          <div class="selo_gamification_pequeno">Empresa<br>x</div>
        </div>
        <div class="col-md-4">
          <div class="visualizar_dados">
            <a href="<?php echo base_url();?>index.php/pendencias/visualiza/<?php echo $row->id; ?>">Visualizar dados</a>
          </div>
          <span class="sobrescrito_empreendimento">Alterada/Criada em 10/10/2010</span>
        </div>
      </div>
    <?php } ?>
    <div style="text-align:center; margin-top:15px;">
      <a href="<?php echo base_url();?>index.php/pendencias/cadastra">Cadastrar nova pendencia</a>
    </div>
  </div>
</div>
