<?php
	if($results){
		?>
		<table border="1" class="tablesorter">
        	<thead>
                <tr>
                    <th>Name</th>
                    <th>Brand</th>
                    <th>Model</th>
                    <th>Date Added</th>
                    <th>Action</th>
                </tr>
           </thead> 
           <tbody> 
		<?php
			$i = 1;
			foreach($results as $result){
				?>
				<tr class="tr<?php echo $result->item_id ?>">
                    <td><?php echo $result->name ?></td>
                    <td><?php echo $this->brand_model->get_brand($result->brand_id) ?></td>
                    <td><?php echo $this->model_model->get_model($result->model_id) ?></td>
                    <td><?php echo date("M d, Y",$result->date_added) ?></td>
                    <td><a class="various fancybox fancybox.ajax" href="<?php echo site_url('items/edit')."/".$result->item_id ?>">Edit</a> <a href="javascript:void(0);" onclick="del_item('<?php echo $result->item_id ?>')">Delete</a></td>
                </tr>
				<?php
			$i++;
			}
		?>
        </tbody>
		</table>
		<?php
	} else {
		echo "No Items Found.";
	}
	?>
		<div class="pagination">
        	<?php if($links) echo $links ?>
        </div>
        <div class="add_more">
        	<a href="<?php echo site_url('items/add'); ?>" class="various fancybox fancybox.ajax">Add Item</a>
        </div>
	<?php
	
?>