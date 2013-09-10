<center>
    <table>
        <tr>
            <td><strong>Name</strong></td>
            <td><input type="text" name="name" id="name" /></td>
        </tr>
        <tr>
            <td><strong>Amount</strong></td>
            <td><input type="text" name="amount" id="amount" /></td>
        </tr>
        <tr>
            <td><strong>Brand</strong></td>
            <td>
            	<select name='brand' onchange='get_model(this.value);' id='brand'>
                	<option value=''>Select Brand</option>
                    <?php foreach($brand as $key=>$value) { ?>
						<option value='<?php echo $key; ?>'><?php echo $value; ?></option>
					<?php } ?>
               	</select>
            </td>
        </tr>
        <tr>
            <td><strong>Model</strong></td>
            <td class="model">
            	<select name='model' id='model'>
                	<option value=''>Select Model</option>
                </select>
            </td>
        </tr>
        <tr>
            <td><input type="hidden" id="action" value="0"></td>
            <td><button onClick="return item_val();">Add Item</button></td>
        </tr>
    </table>
</center>