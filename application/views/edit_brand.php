<center>
    <table>
        <tr>
            <td><strong>Name</strong></td>
            <td><input type="text" value="<?php echo $brand ?>" name="name" id="name" /></td>
        </tr>
        <tr>
            <td><input type="hidden" id="action" value="<?php echo $id ?>"></td>
            <td><button onClick="return brand_val();">Edit Brand</button></td>
        </tr>
    </table>
</center>