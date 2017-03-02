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
  <div id="block_usuario" class="table-responsive">
    <table class="table table-bordered table-hover">
    <?php
    $hora = 8;
    $dias_semana = array('Segunda-feira','Terça-feira','Quarta-feira','Quinta-feira','Sexta-feira');
    for($i=0;$i<20;$i++){
      $min="30";
      $prox_hr = ($hora+1).":30";
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
                  $min = "30";
                  $prox_hr = ($hora+1).":00";
                }else{
                  $min = "00";
                  $hora++;
                  $prox_hr = $hora.":30";
                }
                $msg = "<td>".$hora.":".$min." - ".$prox_hr."</td>";
              }else{
                $msg103 = "<td data-toggle='modal' data-target='#myModal' data-sala='2' data-hora='".$hora."_".$min."' data-dia='".$semana_full[$j-1]."'>&nbsp</td>";
                $msg111 = "<td data-toggle='modal' data-target='#myModal' data-sala='6' data-hora='".$hora."_".$min."' data-dia='".$semana_full[$j-1]."'>&nbsp;</td>";
                foreach($data as $reservas){
                  if($reservas->dayweek == $j && $reservas->horario == $hora."_".$min && $reservas->id_sala == 2){
                    $msg103 = "<td><span data-toggle='tooltip' data-placement='top' title='Reservado por: ".$reservas->usuario_data."'>".$reservas->titulo;
                    if($this->session->userdata('id_usuario') == $reservas->id_usuario){
                      $msg103 .= "&nbsp;&nbsp;&nbsp;<a href='".base_url()."index.php/reserva/remove/".$reservas->id."' class='deleta_agendamento'><button type='button' class='btn btn-default btn-xs'>
                                    <span class='glyphicon glyphicon-remove' aria-hidden='true'></span>
                                  </button></a>";
                    }
                    $msg103 .= "</span></td>";
                  }
                  if($reservas->dayweek == $j && $reservas->horario == $hora."_".$min && $reservas->id_sala == 6){
                    $msg111 = "<td><span data-toggle='tooltip' data-placement='top' title='Reservado por: ".$reservas->usuario_data."'>".$reservas->titulo;
                    if($this->session->userdata('id_usuario') == $reservas->id_usuario){
                      $msg111 .= "&nbsp;&nbsp;&nbsp;<a href='".base_url()."index.php/reserva/remove/".$reservas->id."' class='deleta_agendamento'><button type='button' class='btn btn-default btn-xs'>
                                    <span class='glyphicon glyphicon-remove' aria-hidden='true'></span>
                                  </button></a>";
                    }
                    $msg111 .= "</span></td>";
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

<!-- modal para reserva de salas -->
<div class="modal fade" tabindex="-1" role="dialog" id="myModal" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">

    <div class="modal-content">
      <form method="post" action="<?php echo base_url();?>index.php/reserva/efetua_reserva_semana">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Reservar Sala</h4>
        </div>
        <div class="modal-body">
            <input type="hidden" value="<?php echo $proxima_semana-1;?>" name="semana">
            <input type="hidden" value="" name="id_sala" class="id-sala">
            <div style="width:50%; float:right; position:relative;" class="data-titulo-reserva">
              <input type="date" name="data" data-date='{"startView": 2, "openOnMouseFocus": true}' placeholder="yyyy-mm-dd" class="id-data"><br><br>
              <input type="text" name="titulo" placeholder="Título">
            </div>
            <select multiple size="4" style="height:140px;" name="horario[]" class="id-horario">
              <?php
              for($i=8,$j=1;$i<17;$j++){
                $min="30";
                $prox_hr = ($i+1).":00";
                if(($j % 2) == 0){
                  if($i==17){
                    break;
                  }
                  $min = "00";
                  $i++;
                  $prox_hr = $i.":30";
                }
              ?>
              <option value="<?php echo $i."_".$min;?>"><?php echo $i.":".$min." - ".$prox_hr;?></option>
              <?php
              }
              ?>
            </select>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Reservar</button>
        </div>
      </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- fechando modal de reserva de salas -->

<!--Fechando container geral-->
</div>
