<div id="container-central">
  <div id="topo_principal">
    <p>Reservas marcadas</p>
  </div>
  <div style="float:right; padding-right:20px;">
    <a href="<?php echo base_url();?>index.php/reserva/verifica/<?php echo $semana_anterior;?>" class="button_action">
      <button type="button" class="btn btn-default btn-xs">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      </button>
    </a>
    <?php echo $atual; ?>
    <a href="<?php echo base_url();?>index.php/reserva/verifica/<?php echo $proxima_semana;?>" class="button_action">
      <button type="button" class="btn btn-default btn-xs">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      </button>
    </a>
  </div><br><br>
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
                    $msg103 = "<td>".$reservas->usuario_data;
                    if($this->session->userdata('id_usuario') == $reservas->id_usuario){
                      $msg103 .= "&nbsp;&nbsp;&nbsp;<a href='".base_url()."index.php/reserva/remove/".$reservas->id."' class='deleta_agendamento'><button type='button' class='btn btn-default btn-xs'>
                                    <span class='glyphicon glyphicon-remove' aria-hidden='true'></span>
                                  </button></a>";
                    }
                    $msg103 .= "</td>";
                  }
                  if($reservas->dayweek == $j && $reservas->horario == $hora."_".$min && $reservas->id_sala == 6){
                    $msg111 = "<td>".$reservas->usuario_data;
                    if($this->session->userdata('id_usuario') == $reservas->id_usuario){
                      $msg111 .= "&nbsp;&nbsp;&nbsp;<a href='".base_url()."index.php/reserva/remove/".$reservas->id."' class='deleta_agendamento'><button type='button' class='btn btn-default btn-xs'>
                                    <span class='glyphicon glyphicon-remove' aria-hidden='true'></span>
                                  </button></a>";
                    }
                    $msg111 .= "</td>";
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
