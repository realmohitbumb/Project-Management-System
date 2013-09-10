<?php
	
	if($results){
		?>
		<table border="1" class="tablesorter">
        	<thead>
                <tr>
                    <th>Name</th>
                    <th>Items Count</th>
                    <th>Models Count</th>
                    <th>Action</th>
                </tr>
            </thead>  
            <tbody>  
		<?php
			
			$i = 1;
			foreach($results as $result){
				?>
				<tr class="tr<?php echo $result->brand_id ?>">
                    <td><?php echo $result->name ?></td>
                    <td><?php echo $this->items_model->item_count_by_brand($result->brand_id) ?></td>
                    <td><?php echo $this->model_model->model_counts($result->brand_id) ?></td>
                    <td><a class="various fancybox fancybox.ajax" href="<?php echo site_url('brands/edit')."/".$result->brand_id ?>">Edit</a> <a href="javascript:void(0);" onClick="del_brand('<?php echo $result->brand_id ?>')">Delete</a></td>
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
        	<a href="<?php echo site_url('brands/add'); ?>" class="various fancybox fancybox.ajax">Add Brand</a>
        </div>
	<?php
?>