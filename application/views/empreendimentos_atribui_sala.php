<div id="container-central">
  <div>
    <p id="titulo_usuario">Atribuir a empresa <b><?php echo $data->nome;?></b> a uma sala</p>
    <?php if($this->session->userdata('id_acesso')==1){ ?>
    <div id="block_usuario">
      <form method="post" action="<?php echo base_url();?>index.php/empreendimentos/atribuicao_sala/<?php echo $data->id;?>">
          <input type="hidden" value="<?php echo $data->id;?>" name="id_emp">
          <select name="sala">
            <?php foreach ($salas as $sala){ ?>
              <option value="<?php echo $sala->id; ?>"><?php echo $sala->nr_sala; ?></option>
            <?php } ?>
          </select>
          <button type="submit" class="btn btn-default btn-lg">
            <span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Salvar
          </button>
      </form>
    </div>
    <?php } ?>
  </div>
