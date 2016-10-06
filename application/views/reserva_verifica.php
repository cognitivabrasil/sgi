<div id="container-central">
  <div id="topo_principal">
    <p>Reservas marcadas</p>
  </div>
  <div id="block_usuario">
    <table class="table table-bordered table-hover">
    <?php
    $hora = 8;
    $dias_semana = array('Segunda-feira','Terça-feira','Quarta-feira','Quinta-feira','Sexta-feira');
    for($i=0;$i<21;$i++){
      $min="30";
      echo "<tr>";
      for($j=0;$j<6;$j++){
        if($i==0 && $j==0){
          $msg = "<td>Horário\Dia</td>";
        }else{
          if($i==1){
            if($j==0){
              $msg = "<td>&nbsp;</td>";
            }else{
              $msg = "<td style='text-align:center;'>103</td><td style='text-align:center;'>111</td>";
            }
          }else{
            if($i==0){
              $msg = "<td colspan='2' style='text-align:center;'>".$dias_semana[$j-1]."</td>";
            }else{
              if($j==0){
                if(($i % 2) == 0){
                  $min = "00";
                  $hora++;
                }
                $msg = "<td>".$hora.":".$min."</td>";
              }else{
                $msg103 = "<td>&nbsp;</td>";
                $msg111 = "<td>&nbsp;</td>";
                foreach($data as $reservas){
                  if($reservas->dayweek == $j && $reservas->horario == $hora."_".$min && $reservas->id_sala == 2){
                    $msg103 = "<td>Reservado <br>para ".$reservas->usuario_data."</td>";
                  }
                  if($reservas->dayweek == $j && $reservas->horario == $hora."_".$min && $reservas->id_sala == 6){
                    $msg111 = "<td>Reservado <br>para ".$reservas->usuario_data."</td>";
                  }
                }
                $msg = $msg103.$msg111;
              }
            }
          }
        }
        echo $msg;
      }
      echo "</tr>";
    }
    ?>
    </table>
  </div>
</div>
<!--Fechando container geral-->
</div>
