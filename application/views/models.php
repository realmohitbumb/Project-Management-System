<?php
	if($results){
		?>
		<table border="1" class="tablesorter">
        	<thead> 
            <tr>
                <th>Name</th>
                <th>Brand</th>
                <th>Item Count</th>
                <th>Action</th>
            </tr>
            </thead> 
		<?php
			$i = 1;
			foreach($results as $result){
				?>
				<tr class="tr<?php echo $result->model_id; ?>">
                    <td><?php echo $result->name ?></td>
                    <td><?php echo $this->brand_model->get_brand($result->brand_id) ?></td>
                    <td><?php echo $this->items_model->item_count_by_model($result->model_id) ?></td>
                    <td><a class="various fancybox fancybox.ajax" href="<?php echo site_url('models/edit')."/".$result->model_id ?>">Edit</a> <a href="javascript:void(0);" onClick="del_model('<?php echo $result->model_id ?>')">Delete</a></td>
                </tr>
				<?php
			$i++;
			}
		?>
		</table>
		<?php
	} else {
		echo "No Items Found.";
	}
	?>
		<div class="pagination">
        	<?php if($links) echo $links ?>
            <!--<div id="pager" class="pager">
                <form>
                    <img src="<?php echo base_url(); ?>images/first.png" class="first"/>
                    <img src="<?php echo base_url(); ?>images/prev.png" class="prev"/>
                    <input type="text" class="pagedisplay"/>
                    <img src="<?php echo base_url(); ?>images/next.png" class="next"/>
                    <img src="<?php echo base_url(); ?>images/last.png" class="last"/>
                    <select class="pagesize">
                        <option selected="selected"  value="10">10</option>
                        <option value="20">20</option>
                        <option value="30">30</option>
                        <option  value="40">40</option>
                    </select>
                </form>
            </div>-->
        </div>
        
        <div class="add_more">
        	<a href="<?php echo site_url('models/add'); ?>" class="various fancybox fancybox.ajax">Add Model</a>
        </div>
	<?php
	
?>