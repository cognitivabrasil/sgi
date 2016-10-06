<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <?php $this->load->helper('url');
    $atual = $this->uri->segment(1);?>
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo base_url();?>index.php/inicial">Inicial</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li <?php if($atual == 'empreendimentos') echo 'class="active"' ?>><a href="<?php echo base_url();?>index.php/empreendimentos">Empreendimentos</a></li>
        <li <?php if($atual == 'colaboradores') echo 'class="active"' ?>><a href="<?php echo base_url();?>index.php/colaboradores">Colaboradores</a></li>
        <!--<li <?php if($atual == 'faturamento') echo 'class="active"' ?>><a href="<?php echo base_url();?>index.php/faturamento">Faturamento</a></li>-->
        <li <?php if($atual == 'usuarios') echo 'class="active"' ?>><a href="<?php echo base_url();?>index.php/usuarios">Usuários</a></li>
        <li <?php if($atual == 'patrimonios') echo 'class="active"' ?>><a href="<?php echo base_url();?>index.php/patrimonios">Patrimônio</a></li>
        <li <?php if($atual == 'reserva') echo 'class="active"' ?>><a href="<?php echo base_url();?>index.php/reserva">Reserva de Salas</a></li>
        <li <?php if($atual == 'pendencias') echo 'class="active"' ?>><a href="<?php echo base_url();?>index.php/pendencias">Pendências</a></li>
        <li <?php if($atual == 'releasing') echo 'class="active"' ?>><a href="<?php echo base_url();?>index.php/releasing">Releasing</a></li>
        <li <?php if($atual == 'servicos') echo 'class="active"' ?>><a href="<?php echo base_url();?>index.php/servicos">Serviços</a></li>
        <li <?php if($atual == 'salas') echo 'class="active"' ?>><a href="<?php echo base_url();?>index.php/salas">Salas</a></li>
        <li><a href="<?php echo base_url();?>index.php/login/logout">Sair</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<div id="container-geral">
<div id="topo-logado">
  <p class="titulo-principal">Sistema de Gerenciamento</p>
  <p>CEI - Centro de Empreendimentos em Informática</p>
</div>
