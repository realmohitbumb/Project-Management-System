<center>
    <table>
        <tr>
            <td><strong>Name</strong></td>
            <td><input type="text" name="name" id="name" /></td>
        </tr>
        <tr>
            <td><strong>Brand</strong></td>
            <td>
            	<select name='brand' id='brand'>
            		<option value=''>Select Brand</option>
					<?php foreach($brand as $key=>$value) { ?>
						<option value='<?php echo $key; ?>'><?php echo $value; ?></option>
					<?php } ?>
				</select>
			</td>	
        </tr>
        <tr>
            <td><input type="hidden" id="action" value="0"></td>
            <td><button onClick="return model_val();">Add Model</button></td>
        </tr>
    </table>
</center>

