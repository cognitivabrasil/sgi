<div id="container-central">
  <div id="topo_principal">
    <p style="float:right;">
      <a href="<?php echo base_url();?>index.php/reserva/verifica" class="button_action">
        <button type="button" class="btn btn-default btn-lg">
          <span class="glyphicon glyphicon-list" aria-hidden="true"></span> Reservas
        </button>
      </a>
    </p>
    <p>Reserva de Salas</p>
  </div>
  <div id="mapa_cei">
    <img src="<?php echo base_url();?>includes/img/mapa_novo.png" style="width:100%; margin:0 auto;" border="0" usemap="#map" />

    <map name="map">
      <area shape="rect" coords="3,1,55,79" href="#" onclick="carregaSala(101);" />
      <area shape="rect" coords="55,1,110,79" href="#" onclick="carregaSala(103);" />
      <area shape="poly" coords="110,1,151,1,150,76,192,76,192,131,110,131" href="#" onclick="carregaSala(105);" />
      <area shape="rect" coords="150,1,192,75" href="#" onclick="carregaSala(105b);" />
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
      <area shape="rect" coords="381,158,582,340" href="#" onclick="carregaSala(aud);" />
      <area shape="rect" coords="318,209,381,339" href="#" onclick="carregaSala(110);" />
      <area shape="rect" coords="255,209,318,339" href="#" onclick="carregaSala(108);" />
      <area shape="rect" coords="192,210,255,340" href="#" onclick="carregaSala(106);" />
      <area shape="rect" coords="135,209,193,339" href="#" onclick="carregaSala(104);" />
      <area shape="rect" coords="3,209,134,340" href="#" onclick="carregaSala(102);" />
    </map>

  </div>
  <div id="block_usuario">
    <div id="dados_sala">
      Selecione uma sala para efetuar reserva
    </div>
  </div>
</div>
<!--Fechando container geral-->
</div>
