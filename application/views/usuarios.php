<div id="container-central">
<div>
  <p id="titulo_usuario">Usuários</p>
  <div id="block_usuario">
    <?php
    foreach($data as $row){ ?>
    <div class="row">
      <div class="col-md-3"><?php echo $row->nome; ?></div>
      <div class="col-md-3"><?php echo $row->nome_empreendimento; ?></div>
      <div class="col-md-3"><?php
      switch ($row->id_acesso) {
        case 1:
          echo "Administrador";
          break;
        case 2:
          echo "CEI";
          break;
        case 3:
          echo "Usuário";
          break;
      }
       ?></div>
       <div class="col-md-3">
         <?php
          if($row->id_usuario == $id_logado){
         ?>
         <a href="<?php echo base_url();?>index.php/usuarios/alterasenha/<?php echo $row->id_usuario;?>">alterar senha</a>
         <?php
          }
         ?>
       </div>
    </div>
    <?php
    }
    ?>
    <div style="text-align:center; margin-top:15px;">
      <a href="<?php echo base_url();?>index.php/usuarios/cadastra">Cadastrar novo usuário</a>
    </div>
  </div>
</div>
