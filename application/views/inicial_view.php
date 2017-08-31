<div id="container-central">
  <div id="topo_principal">
    <p style="float:right;">
      <a href="<?php echo base_url();?>index.php/reserva/verifica" class="button_action">
        <button type="button" class="btn btn-default btn-lg">
          <span class="glyphicon glyphicon-list" aria-hidden="true"></span> Reservas
        </button>
      </a>
    </p>
    <p class="titulo_principal">Seja bem vindo(a) <strong><?php echo $data;?></strong></p>
    <p>Veja abaixo o mapa do CEI e clique em cada sala para visualizar informações detalhadas</p>
  </div>
  <div id="mapa_cei">
    <img src="<?php echo base_url();?>includes/img/mapa_novo.png" style="width:100%; margin:0 auto;" border="0" usemap="#map" />

    <map name="map">
      <area shape="rect" coords="3,1,55,79" href="#" onclick="carregaSala(101);" />
      <area shape="rect" coords="55,1,110,79" href="#" onclick="carregaSala(103);" />
      <area shape="poly" coords="110,1,151,1,150,76,192,76,192,131,110,131" href="#" onclick="carregaSala(105);" />
      <area shape="rect" coords="150,1,192,75" href="#" onclick="carregaSala('105b');" />
      <area shape="rect" coords="192,1,255,131" href="#" onclick="carregaSala(107);" />
      <area shape="rect" coords="255,1,336,131" href="#" onclick="carregaSala(109);" />
      <area shape="poly" coords="336,1,408,1,408,42,372,79,337,79" href="#" onclick="carregaSala(111);" />
      <area shape="poly" coords="550,1,641,2,641,132,614,131,614,96,595,97,550,50" href="#" onclick="carregaSala(113);" />
      <area shape="rect" coords="641,1,713,131" href="#" onclick="carregaSala(115);" />
      <area shape="rect" coords="714,1,822,131" href="#" onclick="carregaSala(117);" />
      <area shape="rect" coords="822,1,885,132" href="#" onclick="carregaSala(119);" />
      <area shape="rect" coords="885,1,948,82" href="#" onclick="carregaSala(121);" />
      <area shape="rect" coords="879,210,947,339" href="#" onclick="carregaSala(122);" />
      <area shape="rect" coords="783,209,879,340" href="#" onclick="carregaSala(120);" />
      <area shape="rect" coords="683,210,782,340" href="#" onclick="carregaSala(118);" />
      <area shape="rect" coords="582,209,684,340" href="#" onclick="carregaSala(116);" />
      <area shape="rect" coords="381,158,582,340" href="#" onclick="carregaSala('aud');" />
      <area shape="rect" coords="318,209,381,339" href="#" onclick="carregaSala(110);" />
      <area shape="rect" coords="255,209,318,339" href="#" onclick="carregaSala(108);" />
      <area shape="rect" coords="192,210,255,340" href="#" onclick="carregaSala(106);" />
      <area shape="rect" coords="135,209,193,339" href="#" onclick="carregaSala(104);" />
      <area shape="rect" coords="3,209,134,340" href="#" onclick="carregaSala(102);" />
    </map>
  </div>
  <div id="block_usuario">
    <div id="dados_sala">
      Para verificar informações das salas selecione no mapa acima
    </div>
  </div>
</div>
<div id="timeline">
  <h1>Novidades do sistema</h1>
  <div>
    <h3><span class="data-nov">22/05/2017</span> - Segurança HTTPS</h3>
    Tendo em vista o tráfego de dados sigilosos dentro do sistema de gestão do CEI, foi implementado pelo departamento de redes do instituto de informática o certificado https que transita os dados por meio de uma conexão criptografada entre cliente e servidor verificando a autenticidade dos mesmos.
  </div>
  <div>
    <h3><span class="data-nov">19/05/2017</span> - Usuários com tempo determinado no sistema</h3>
    Com o intuito de deixarmos o sistema de gestão do CEI mais robusto, agora os usuários terão um tempo de duração determinado dentro do sistema que será relativo ao tempo do contrato da empresa com o CEI. Após o vencimento do tempo do usuário, o mesmo continuará no sistema com todos os dados, apenas impossibilitado de acessar.
  </div>
  <div>
    <h3><span class="data-nov">05/05/2017</span> - Mais segurança nas senhas</h3>
    Para aumentar a segurança dentro do sistema, foram implementadas novas regras para as senhas dos usuários. A partir de segunda-feira dia 08/05, se tornará obrigatório o uso de senhas com mínimo 8 caracteres contendo pelo menos uma letra maiúscula, uma letra minúscula, um numeral e um caractere especial.
  </div>
  <div>
    <h3><span class="data-nov">27/04/2017</span> - Upload de Notas Fiscais</h3>
    O administrador da empresa agora tem a possibilidade de fazer o upload de uma ou mais notas fiscais via xml dentro do sistema do CEI. Para isso, é necessário criar um arquivo do tipo .zip contendo a nota ou as várias notas que deseja enviar para o sistema e logo após fazer o upload do mesmo no menu faturamento.
  </div>
  <div>
    <h3><span class="data-nov">31/03/2017</span> - Timeline de novidades</h3>
    Você poderá ver neste espaço à partir do dia 31/03 todas as novidades que o sistema de gestão está disponibilizando para você.
  </div>
  <div>
    <h3><span class="data-nov">31/03/2017</span> - Reserva de salas</h3>
    Agora é possível reservar salas clicando no menu de verificar reservas e após, clicando na célula correspondente ao horário que deseja reservar. Ao clicar na célula disponível, o sistema irá apresentar uma tela para o usuário escrever o título da reserva e, escolher mais horários além do que foi selecionado.
  </div>
  <div>
    <h3><span class="data-nov">20/03/2017</span> - Novo tipo de usuário</h3>
    Foi criado um novo tipo de usuário no sistem de gestão focado nos funcionários das empresas. Mais informações podem ser obtidas no e-mail enviado para os diretores das empresas ou diretamente na administração do CEI.
  </div>
</div>
<!--Fechando container geral-->
</div>
