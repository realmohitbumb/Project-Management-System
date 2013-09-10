<?php if($action != 0) { ?>
	 <td class="td_padding"><?php echo $item_name; ?></td>
        <td class="td_padding"><?php echo $brand_name; ?></td>
        <td class="td_padding"><?php echo $model_name; ?></td>
        <td class="td_padding"><?php echo date("M d, Y",$date_added); ?></td>
        <td class="td_padding">
        	<a class="various fancybox fancybox.ajax" href="<?php echo site_url('items/edit')."/".$id; ?>">Edit</a> 
            <a href="javascript:void(0);" onclick="del_item('<?php echo $id; ?>')">Delete</a>
        </td>ref="javascript:void(0);" onClick="del_model('<?php echo $id; ?>')">Delete</a>
	</td>
<?php } else { ?>
    <tr class="tr<?php echo $id; ?>">
        <td class="td_padding"><?php echo $item_name; ?></td>
        <td class="td_padding"><?php echo $brand_name; ?></td>
        <td class="td_padding"><?php echo $model_name; ?></td>
        <td class="td_padding"><?php echo date("M d, Y",$date_added); ?></td>
        <td class="td_padding">
        	<a class="various fancybox fancybox.ajax" href="<?php echo site_url('items/edit')."/".$id; ?>">Edit</a> 
            <a href="javascript:void(0);" onclick="del_item('<?php echo $id; ?>')">Delete</a>
        </td>
    </tr>
<?php } ?>    