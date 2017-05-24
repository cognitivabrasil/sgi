<div id="container-central">
  <div>
    <p id="titulo_usuario">Cadastro de colaboradores</p>
    <div id="block_usuario">
      <form method="post" action="<?php echo base_url();?>index.php/colaboradores/insert">
          <input type="text" name="nome" placeholder="Nome">
          <div style="width:30%; float:right; margin-right:40%;"><input id="habilita_funcao" type="checkbox" name="sem_funcao" style="float:left; width:10px;" value="1" checked><span style="float:left;">Sem função designada</span></div>
          <input type="text" name="funcao" placeholder="Função" id="funcao_colaborador">
          <select name="vinculo">
            <option value="0">Vínculo UFRGS</option>
            <option value="1">Aluno</option>
            <option value="2">Ex Aluno</option>
            <option value="3">Sem Vínculo</option>
          </select>
          <input type="text" name="email" placeholder="E-mail">
          <input type="text" name="entrada" placeholder="Entrada" style="float:left; width:95px;">
          <input type="text" name="saida" placeholder="Saída" style="float:left; width:95px;">
          <input type="checkbox" name="em_atividade" style="float:left; width:10px;" value="1"><span style="float:left;">Ainda em atividade</span>
          <input type="checkbox" name="socio" style="float:left; width:10px; clear:both;" value="1"><span style="float:left;">Sócio</span>
          <input type="hidden" name="empresa" value="<?php if($this->session->userdata('id_empreendimento') == 1){echo 32; }else{ echo $this->session->userdata('id_empreendimento');}?>">
          <!--<select name="empresa" style="clear:both;">
            <option value="0">Empresa</option>
            <?php foreach($data as $row){ ?>
            <option value="<?php echo $row->id;?>"><?php echo $row->nome;?></option>
            <?php } ?>
          </select>--><br><br><br><br>
          <button type="submit" class="btn btn-default btn-lg">
            <span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Salvar
          </button>
      </form>
    </div>
  </div>
