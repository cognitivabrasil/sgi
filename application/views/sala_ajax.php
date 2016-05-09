<p>Sala <?php echo $data->nr_sala; ?></p>
<p><?php echo $data->funcao; ?></p>
<p><?php echo $data->descricao; ?></p>
<?php
  if($data->disponivel=='1'){
?>
<form method="post" action="<?php echo base_url();?>reserva/efetua_reserva">
  <input type="hidden" value="<?php echo $data->id; ?>" name="id_sala">
  <div style="width:50%; float:right;">
    <input type="date" name="data">
  </div>
  <select multiple size="4" style="height:70px;" name="horario[]">
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
  <input type="submit" value="Efetuar reserva">
</form>
<?php
  }
?>
