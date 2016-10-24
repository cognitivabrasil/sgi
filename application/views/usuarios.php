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
         <a href="<?php echo base_url();?>index.php/usuarios/alterasenha/<?php echo $row->id_usuario;?>" class="button_action" alt="Alterar Senha" title="Alterar Senha">
           <button type="button" class="btn btn-default btn-xs">
             <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
           </button>
         </a>
         <?php
          }
         ?>
       </div>
    </div>
    <?php
    }
    ?>
    <div style="text-align:center; margin-top:15px;">
      <a href="<?php echo base_url();?>index.php/usuarios/cadastra" class="button_action">
        <button type="button" class="btn btn-default btn-lg">
          <span class="glyphicon glyphicon-duplicate" aria-hidden="true"></span> Novo
        </button>
      </a>
    </div>
  </div>
</div>
