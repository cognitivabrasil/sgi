Sala:
<select name="sala">
  <?php foreach ($salas as $sala){ ?>
    <option value="<?php echo $sala->id; ?>"><?php echo $sala->nr_sala; ?></option>
  <?php } ?>
</select>
