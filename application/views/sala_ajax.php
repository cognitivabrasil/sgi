<script>
  webshims.setOptions('waitReady', false);
  webshims.setOptions('forms-ext', {types: 'date'});
  webshims.polyfill('forms forms-ext');
</script>
<p>Sala <?php echo $data->nr_sala; ?></p>
<p><?php echo $data->funcao; ?></p>
<p><?php echo $data->descricao; ?></p>
<?php
  if(($data->disponivel=='1' && $data->travada_cei=='0')||($data->disponivel=='1' && $data->travada_cei=='1' && $this->session->userdata('id_acesso') == 1)){
?>
<form method="post" action="<?php echo base_url();?>index.php/reserva/efetua_reserva" id="form_reserva">
  <input type="hidden" value="<?php echo $data->id; ?>" name="id_sala">
  <div style="width:50%; float:right; position:relative;" class="data-titulo-reserva">
    <input type="date" name="data" data-date='{"startView": 2, "openOnMouseFocus": true}' placeholder="yyyy-mm-dd" id="data_reserva"><br>
    <input type="text" name="titulo" placeholder="Título" id="titulo_reserva">
  </div>
  <select multiple size="4" style="height:140px;" name="horario[]" id="horario_reserva">
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
  <button type="button" class="btn btn-default btn-lg" onclick="verificaPreenchimento()">
    Efetuar reserva
  </button>
</form>
<?php
  }
?>
