<div id="container-central">
<div>
  <p id="titulo_usuario">Usuários</p>
  <?php
  if($this->session->userdata('id_acesso') == 1){
  ?>
  <div style="text-align:center; margin-top:15px;">
    <a href="<?php echo base_url();?>index.php/usuarios/cadastra" class="button_action">
      <button type="button" class="btn btn-default btn-lg">
        <span class="glyphicon glyphicon-duplicate" aria-hidden="true"></span> Novo
      </button>
    </a>
  </div>
  <?php } ?>
  <div id="block_usuario">
    <?php
    $tipo_atual = 0;
    foreach($data as $row){
     if($this->session->userdata('id_acesso') == 1 || $row->id_usuario == $id_logado){
      if($tipo_atual!=$row->id_acesso){
        $tipo_atual = $row->id_acesso;
        ?>
        <div class="titulo_user"><span>
          <?php
          switch ($row->id_acesso) {
            case 1:
              echo "Administradores";
              break;
            case 2:
              echo "Usuários CEI";
              break;
            case 3:
              echo "Administradores de empresas";
              break;
            case 4:
              echo "Usuários de Empresas";
              break;
          }
           ?><span>
        </div>
        <?php
      }
      ?>
    <div class="row linha_usuarios">
      <div class="col-md-3"><?php echo $row->nome; ?></div>
      <?php if($this->session->userdata('id_acesso') == 1){?>
      <div class="col-md-2"><?php echo $row->username; ?></div>
      <?php }?>
      <div class="col-md-3"><?php echo $row->nome_empreendimento; ?></div>
      <!--<div class="col-md-2"><?php
      switch ($row->id_acesso) {
        case 1:
          echo "Administrador";
          break;
        case 2:
          echo "CEI";
          break;
        case 3:
          echo "Admin Empresa";
          break;
        case 4:
          echo "Usuário Empresa";
          break;
      }
       ?></div> -->
       <div class="col-md-3">
         <?php
         if($this->session->userdata('id_acesso') == 1){
         ?>
           <a href='<?php echo base_url(); ?>index.php/usuarios/remove/<?php echo $row->id_usuario;?>' class='deleta_usuario' title="Remove usuário" data-toggle="tooltip">
             <button type='button' class='btn btn-default btn-xs'>
               <span class='glyphicon glyphicon-remove' aria-hidden='true'></span>
             </button>
           </a>
         <?php
          }
         if($this->session->userdata('id_acesso') == 1){
         ?>
           <a href='<?php echo $row->id_usuario;?>' class='restaura_senha' title="Restaurar senha" data-toggle="tooltip">
             <button type='button' class='btn btn-default btn-xs'>
               <span class='glyphicon glyphicon-refresh' aria-hidden='true'></span>
             </button>
           </a>
         <?php
          }
          if($this->session->userdata('id_acesso') == 1){
          ?>
            <a href='<?php echo base_url(); ?>index.php/usuarios/alteraduracao/<?php echo $row->id_usuario;?>' class='button_action' title="Altera duração do usuário" data-toggle="tooltip">
              <button type='button' class='btn btn-default btn-xs'>
                <span class='glyphicon glyphicon-time' aria-hidden='true'></span>
              </button>
            </a>
          <?php
           }
          if($row->id_usuario == $id_logado){
         ?>
         <a href="<?php echo base_url();?>index.php/usuarios/alterasenha/<?php echo $row->id_usuario;?>" class="button_action" title="Alterar Senha" data-toggle="tooltip">
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
     }// fechando if para testar se usuario eh adm
    }
    ?>
  </div>
</div>
