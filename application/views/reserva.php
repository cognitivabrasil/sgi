<div id="container-central">
  <div id="topo_principal">
    <p>Reserva de Salas</p>
  </div>
  <div id="mapa_cei">
    <img src="<?php echo base_url();?>includes/img/mapa_cei.png" style="width:100%; margin:0 auto;" border="0" usemap="#map" />

    <map name="map">
      <area shape="rect" coords="14,10,92,131" href="101" />
      <area shape="rect" coords="94,10,175,133" href="103" />
      <area shape="rect" coords="177,11,322,198" href="105" />
      <area shape="rect" coords="323,10,412,199" href="107" />
      <area shape="rect" coords="411,10,530,199" href="109" />
      <area shape="poly" coords="533,10,663,9,663,95,613,143,534,142" href="111" />
      <area shape="poly" coords="828,11,961,10,961,198,920,200,920,144,873,143,826,86,827,11,962,11" href="113" />
      <area shape="rect" coords="964,11,1089,200" href="115" />
      <area shape="rect" coords="1091,10,1263,199" href="117" />
      <area shape="rect" coords="1265,10,1360,200" href="119" />
      <area shape="rect" coords="1362,10,1446,199" href="121" />
      <area shape="rect" coords="1359,288,1446,476" href="122" />
      <area shape="rect" coords="1193,288,1356,476" href="120" />
      <area shape="rect" coords="1026,288,1191,476" href="118" />
      <area shape="rect" coords="867,288,1025,476" href="116" />
      <area shape="rect" coords="596,227,868,475" href="114" />
      <area shape="rect" coords="498,288,594,476" href="110" />
      <area shape="rect" coords="403,287,497,476" href="108" />
      <area shape="rect" coords="308,287,406,476" href="106" />
      <area shape="rect" coords="212,288,307,476" href="104" />
      <area shape="rect" coords="12,287,211,476" href="102" />
    </map>
  </div>
  <div id="block_usuario">
    <p>Sala 111</p>
    <p>Sala de reuniões</p>
    <p>Sala com projetor, 1 computador e mesa de reuniões para 10 pessoas</p>
    <div style="width:50%; float:right;">
      <select>
        <option value="1">Tempo: 1h</option>
      </select>
      <select>
        <option value="1">Dia: 23/10</option>
      </select>
    </div>
    <select multiple size="4" style="height:70px;">
      <?php
      for($i=7,$j=1;$i<18;$j++){
        $min="00";
        if(($j % 2) == 0){
          $min = "30";
        }else{
          $i++;
        }
      ?>
      <option value="<?php echo $i."_".$min;?>"><?php echo $i.":".$min;?></option>
      <?php
      }
      ?>
    </select>
    <a href="#">Verificar reservas</a>
  </div>
</div>
<!--Fechando container geral-->
</div>
