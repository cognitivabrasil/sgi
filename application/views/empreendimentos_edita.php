<div id="container-central">
  <div>
    <p id="titulo_usuario">Cadastro de empreendimento</p>
    <div id="block_usuario">
      <!--<form method="post" action="<?php echo base_url();?>index.php/empreendimentos/save" enctype="multipart/form-data"> -->
      <form method="post" action="#" enctype="multipart/form-data">
          <p class="subtitulo_empreendimentos">Dados Gerais</p>
          <div style="float:left;">
            <input type="hidden" name="id" value="<?php echo $data->id;?>" >
            <input type="text" name="nome" placeholder="Nome" value="<?php echo $data->nome;?>" >
            <select name="vinculo">
              <option value="0" <?php if($data->vinculo == 0) echo "selected";?> >Vínculo</option>
              <option value="1" <?php if($data->vinculo == 1) echo "selected";?> >Pré-Incubada</option>
              <option value="2" <?php if($data->vinculo == 2) echo "selected";?> >Incubada</option>
              <option value="3" <?php if($data->vinculo == 3) echo "selected";?> >Parque</option>
            </select>
            <input type="text" name="site" placeholder="Site" value="<?php echo $data->site;?>" >
            <input type="text" name="cpfcnpj" placeholder="CPF / CNPJ" value="<?php echo $data->cpf_cnpj;?>" >
          </div>
          <div style="float:left; margin-left:40px; padding-bottom:3px;">
            <input type="text" name="fantasia" placeholder="Nome Fantasia" value="<?php echo $data->nome_fantasia;?>" >
            <input type="text" name="rs" placeholder="Razão social" value="<?php echo $data->razao_social;?>" >
            <input type="text" name="responsavel" placeholder="Nome responsável" value="<?php echo $data->responsavel;?>" >
            <input type="text" name="emailresponsavel" placeholder="e-mail responsável" value="<?php echo $data->responsavel_email;?>" >
          </div>
          <textarea name="descricao" placeholder="Descrição" style="clear:both; width:70%; height:150px;"><?php echo $data->descricao;?></textarea>
          <div style="clear:both; margin-left:15px; text-align:center;">
            <a target="_blank" href="<?php echo base_url();?>index.php/empreendimentos/download/<?php echo $data->id;?>/canvas">
              <button type="button" class="btn btn-default btn-lg">
                <span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span> Canvas
              </button>
            </a>
            <a target="_blank" href="<?php echo base_url();?>index.php/empreendimentos/download/<?php echo $data->id;?>/logo">
              <button type="button" class="btn btn-default btn-lg">
                <span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span> Logo
              </button>
            </a>
          </div>
          <input type="hidden" name="logo" value="<?php echo $data->logo; ?>">
          <input type="hidden" name="canvas" value="<?php echo $data->canvas; ?>">
          <!--<label for="logo" style="margin-left:5px; font-weight:normal;">Logo: </label><input type="file" name="logo" id="logo">
          <label for="canvas" style="margin-left:5px; font-weight:normal;">Canvas: </label><input type="file" name="canvas" id="canvas">-->

          <hr>
          <div id="produtos_container">
            <p class="subtitulo_empreendimentos">Produtos / Serviços</p>
            <button class="btn btn-default btn-lg" id="add_produto" style="float:right;" onClick="return false;">
              <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            </button>

            <?php foreach ($weak_data_ps as $row) { ?>
            <input type="text" name="nome_produto[]" placeholder="Nome" value="<?php echo $row->nome;?>" >
            <textarea name="descricao_produto[]" placeholder="Descrição" style="clear:both; width:70%; height:150px;"><?php echo $row->descricao;?></textarea><br>
            <?php }?>
          </div>

          <hr>
          <?php print_r($weak_data_ct);?>
          <div id="contrato_container">
            <p class="subtitulo_empreendimentos">Contrato</p>
            <button class="btn btn-default btn-lg" id="add_contrato" style="float:right;" onClick="return false;">
              <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            </button>
            <?php foreach ($weak_data_ct as $row) { ?>
            <input type="date" name="assinatura_contrato[]" value="<?php echo explode(' ',$row->data)[0];?>">
            <label for="contrato" style="margin-left:5px; font-weight:normal;">Contrato: </label><input type="file" name="contrato[]" id="contrato">
            <?php } ?>
          </div>

          <button type="submit" class="btn btn-default btn-lg">
            <span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Salvar
          </button>
      </form>
    </div>
  </div>
