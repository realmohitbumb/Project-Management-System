<?php if($action != 0) { ?>
	<td class="td_padding"><?php echo $name; ?></td>
    <td class="td_padding"><?php echo $brand_name;?></td>
    <td class="td_padding"><?php echo $item_count; ?></td>
    <td class="td_padding">
    	<a class="various fancybox fancybox.ajax" href="<?php echo site_url('models/edit')."/".$id; ?>">Edit</a> 
		<a href="javascript:void(0);" onClick="del_model('<?php echo $id; ?>')">Delete</a>
	</td>
<?php } else { ?>
    <tr class="tr<?php echo $id; ?>">
        <td class="td_padding"><?php echo $name; ?></td>
        <td class="td_padding"><?php echo $brand_name;?></td>
        <td class="td_padding"><?php echo $item_count; ?></td>
        <td class="td_padding">
            <a class="various fancybox fancybox.ajax" href="<?php echo site_url('models/edit')."/".$id; ?>">Edit</a> 
            <a href="javascript:void(0);" onClick="del_model('<?php echo $id; ?>')">Delete</a>
        </td>
    </tr>
<?php } ?>    