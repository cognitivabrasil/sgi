<div id="container-central">
  <div>
    <p id="titulo_usuario">Aprovar requisição</p>
    <div id="block_usuario">
      <p><?php echo $data->nome;?></p>
      <p><?php echo $data->descricao;?></p>
      <p><?php  switch($data->tipo){
            case 0:
              echo "";
              break;
            case 1:
              echo "consultoria";
              break;
            case 2:
              echo "participação em eventos";
              break;
            case 3:
              echo "espaço físico";
              break;
        } ?></p>
        <?php
            foreach ($consultorias as $dados) {
        ?>
              <form method="post" action="<?php echo base_url();?>index.php/pendencias/save_aprovar" name="formAprova">
                <input type="hidden" name="id" id="id" value="<?php echo $dados->id_pendencias; ?>">

                <select type="text" name="aprovar" id="aprovar">
                <option value="0"<?php if($dados->aprovada==0) echo "selected"; ?>>Pendente </option>
                <option value="1" <?php if($dados->aprovada==1) echo "selected"; ?>>Aprovada</option>
                <option value="2" <?php if($dados->aprovada==2) echo "selected"; ?>>Reprovada</option>
                </select>
                
                <select type="text" name="consultor">
                  <option value="0">Consultor</option>
                  <?php foreach ($consultores as $row) {?>
                  <option value="<?php echo $row->id?>" <?php if($row->id==$dados->id_consultor) echo "selected"; ?> > <?php echo $row->nome?>
                  <?php } ?>
                  </option>
                </select>
                <input type="text" name="tempo" placeholder="Horas de consultoria no formato HH:MM" value = '<?php echo $dados->tempo_consultoria." minutos"; ?> '>

                <button type="submit" class="btn btn-default btn-lg">
                  <span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Salvar
                </button>
              </form>
              </form>

            <?php
            }
          //}
        ?>
    </div>
  </div>
