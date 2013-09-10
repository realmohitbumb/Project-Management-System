<?php if($action != 0) { ?>
	<td class="td_padding"><?php echo $brand; ?></td>
    <td class="td_padding"><?php echo $item_count;?></td>
    <td class="td_padding"><?php echo $model_count; ?></td>
    <td class="td_padding">
    	<a class="various fancybox fancybox.ajax" href="<?php echo site_url('brands/edit')."/".$id; ?>">Edit</a> 
		<a href="javascript:void(0);" onClick="del_brand('<?php echo $id; ?>')">Delete</a>
	</td>
<?php } else { ?>
   <tr class="tr<?php echo $id; ?>">
        <td class="td_padding"><?php echo $brand; ?></td>
        <td class="td_padding"><?php echo $item_count; ?></td>
        <td class="td_padding"><?php echo $model_count; ?></td>
        <td class="td_padding">
        	<a class="various fancybox fancybox.ajax" href="<?php echo site_url('brands/edit')."/".$id; ?>">Edit</a> 
            <a href="javascript:void(0);" onClick="del_brand('<?php echo $id; ?>')">Delete</a>
        </td>
    </tr>
<?php } ?>    