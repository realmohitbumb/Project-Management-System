<select name='model' id='model'>
	<?php if($result) { foreach($result as $res) { ?>
		<option value='<?php echo $res->model_id; ?>'><?php echo $res->name; ?></option>
	<?php } } else { ?>
    	<option value=''>Select</option>
    <?php } ?>
</select>    
