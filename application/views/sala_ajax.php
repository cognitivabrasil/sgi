<p>Sala <?php echo $data->nr_sala; ?></p>
<p><?php echo $data->funcao; ?></p>
<p><?php echo $data->descricao; ?></p>
<?php
  if($data->disponivel=='1'){
?>
<form method="post" action="<?php echo base_url();?>index.php/reserva/efetua_reserva">
  <input type="hidden" value="<?php echo $data->id; ?>" name="id_sala">
  <div style="width:50%; float:right;">
    <input type="date" name="data"><br>
    <input type="text" name="titulo" placeholder="Título">
  </div>
  <select multiple size="4" style="height:140px;" name="horario[]">
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
  <button type="submit" class="btn btn-default btn-lg">
    Efetuar reserva
  </button>
</form>
<?php
  }
?>
