<center>
    <table>
        <tr>
            <td><strong>Name</strong></td>
            <td><input type="text" value="<?php echo $item->name ?>" name="name" id="name" /></td>
        </tr>
        <tr>
            <td><strong>Amount</strong></td>
            <td><input type="text" value="<?php echo $item->amount ?>" name="amount" id="amount" /></td>
        </tr>
        <tr>
            <td><strong>Brand</strong></td>
            <td>
            	<select onchange='get_model(this.value);' name='brand' id='brand'>
                	<option value=''>Select Brand</option>
                    <?php foreach($brand as $key=>$value) { ?>
					<option value='<?php echo $key; ?>' <?php if($item->brand_id == $key) { ?> selected="selected" <?php } ?>><?php echo $value; ?></option>
					<?php } ?>
                </select>    
            </td>
        </tr>
        <tr>
            <td><strong>Model</strong></td>
            <td class="model"><?php print_r($model); ?>
            	<select name='model' id='model'>
                	<option value='<?php echo $model->model_id; ?>'><?php echo $model->name; ?></option>
                </select>
            </td>
        </tr>
        <tr>
            <td><input type="hidden" id="action" value="<?php echo $item->item_id ?>"></td>
            <td><button onClick="return item_val();">Edit Item</button></td>
        </tr>
    </table>
</center>