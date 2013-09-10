<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>CI Test</title>

<link rel="stylesheet" href="<?php echo base_url() ?>css/screen.css" type="text/css" media="screen" title="default" />

<link rel="stylesheet" href="<?php echo base_url() ?>fancybox/jquery.fancybox.css" type="text/css" media="screen" title="default" />

<link rel="stylesheet" href="<?php echo base_url() ?>ui/css/ui-lightness/jquery-ui-1.9.2.custom.css" type="text/css" media="screen" title="default" />

<link rel="stylesheet" href="<?php echo base_url() ?>css/style.css" type="text/css">

<script src="<?php echo base_url() ?>js/jquery-1.8.2.min.js" type="text/javascript"></script>
<!--<script type="text/javascript" src="<?php echo base_url() ?>js/jquery-latest.js"></script>-->
<script src="<?php echo base_url() ?>js/__jquery.tablesorter.js" type="text/javascript"></script>
<!--<script src="<?php echo base_url() ?>js/jquery.tablesorter.pager.js" type="text/javascript"></script>-->
<script src="<?php echo base_url() ?>ui/js/jquery-ui-1.9.2.custom.js" type="text/javascript"></script> 
<script src="<?php echo base_url() ?>fancybox/jquery.fancybox.pack.js" type="text/javascript"></script> 
<script src="<?php echo base_url() ?>js/script.js" type="text/javascript"></script> 

<script type="text/javascript">
	$(document).ready(function(){
		//$(".tablesorter").tablesorter();
		$(".tablesorter").tablesorter({widthFixed: true, widgets: ['zebra']}) 
    	//.tablesorterPager({container: $("#pager")}); 
	});
</script>

<script type="application/javascript">
	
function get_model(id){
	jQuery.post("<?php echo site_url('models/select_models') ?>",{"id" : id},function(r){
		jQuery(".model").html(r);
	});
}
function item_val(){
	var name = jQuery("#name").val();
	var amount = jQuery("#amount").val();
	var brand = jQuery("#brand").val();
	var model = jQuery("#model").val();
	var action = jQuery("#action").val();
	var err = false;
	
	if(name.length==0){
		err = true;
		jQuery("#name").css("background","red");
	} else {
		jQuery("#name").css("background","white");
	}
	if(amount.length==0){
		err = true;
		jQuery("#amount").css("background","red");
	} else {
		if(isNaN(amount)==false){
			jQuery("#amount").css("background","white");
		} else {
			err = true;
			jQuery("#amount").css("background","red");
		}
	}
	if(brand.length==0){
		err = true;
		jQuery("#brand").css("background","red");
	} else {
		jQuery("#brand").css("background","white");
	}
	if(model.length==0){
		err = true;
		jQuery("#model").css("background","red");
	} else {
		jQuery("#model").css("background","white");
	}
	if(err==true){
		return false;
	} else {
		jQuery.post("<?php echo site_url('items/add') ?>",{"action":action,"submit":"submit","name":name,"amount":amount,"brand":brand,"model":model,"date_added":"<?php echo time() ?>"},function(r){
				if(action!=='0'){
					jQuery('.tr'+action).html(r);
				} else {
					jQuery("table tr:first").after(r);
				}
			jQuery('.fancybox-close').trigger('click');
			return true;
		});
	}
}

function model_val(){
	var name = jQuery("#name").val();
	var action = jQuery("#action").val();
	var brand = jQuery("#brand").val();
	var err = false;
	
	if(name.length==0){
		err = true;
		jQuery("#name").css("background","red");
	} else {
		jQuery("#name").css("background","white");
	}
	if(brand.length==0){
		err = true;
		jQuery("#brand").css("background","red");
	} else {
		jQuery("#brand").css("background","white");
	}
	if(err==true){
		return false;
	} else {
		jQuery.post("<?php echo site_url('models/add') ?>",{"action":action,"submit":"submit","name":name,"brand":brand},function(r){
			if(action!=='0'){
				jQuery('.tr'+action).html(r);
			} else {
				jQuery("table tr:first").after(r);
			}
			
			jQuery('.fancybox-close').trigger('click');
			
			return true;
		});
	}
}

function brand_val(){
	var name = jQuery("#name").val();
	var action = jQuery("#action").val();
	var err = false;
	
	if(name.length==0){
		err = true;
		jQuery("#name").css("background","red");
	} else {
		jQuery("#name").css("background","white");
	}
	if(err==true){
		return false;
	} else {
		jQuery.post("<?php echo site_url('brands/add') ?>",{"action":action,"submit":"submit","name":name},function(r){
				if(action!=='0'){
					jQuery('.tr'+action).html(r);
				} else {
					jQuery("table tr:first").after(r);
				}
			jQuery('.fancybox-close').trigger('click');
			return true;
		});
	}
}

function del_item(id){
	if(confirm("Are you sure, You want to delet this item ???")){
		jQuery.post("<?php echo site_url('items/delete') ?>/"+id,{"":""},function(r){
			jQuery(".tr"+id).remove();
		});
	}
}
function del_brand(id){
	if(confirm("Are you sure, You want to delet this brand ???")){
		jQuery.post("<?php echo site_url('brands/delete') ?>/"+id,{"":""},function(r){
			jQuery(".tr"+id).remove();
		});
	}
}
function del_model(id){
	if(confirm("Are you sure, You want to delet this model ???")){
		jQuery.post("<?php echo site_url('models/delete') ?>/"+id,{"":""},function(r){
			jQuery(".tr"+id).remove();
		});
	}
}
</script>
<style>
	td strong{
		font-size:15px;
	}
</style>
</head>
<body> 
<!-- Start: page-top-outer -->
<div id="page-top-outer">    

<!-- Start: page-top -->
<div id="page-top">

</div>
<!-- End: page-top -->

</div>
<!-- End: page-top-outer -->
	
<div class="clear">&nbsp;</div>
 
<!--  start nav-outer-repeat................................................................................................. START -->
<div class="nav-outer-repeat"> 
<!--  start nav-outer -->
<div class="nav-outer"> 

		

		<!--  start nav -->
		<div class="nav">
		<div class="table">
		<?php $class = $this->router->class ?>
		<ul class="<?php echo ($class=='items')?"current":"select";  ?>"><li><a href="<?php echo site_url('items') ?>"><b>Items</b></a></li></ul>
		
		<div class="nav-divider">&nbsp;</div>
		                    
		<ul class="<?php echo ($class=='brands')?"current":"select";  ?>"><li><a href="<?php echo site_url('brands') ?>"><b>Brands</b></a></li></ul>
		
		<div class="nav-divider">&nbsp;</div>
		
		<ul class="<?php echo ($class=='models')?"current":"select";  ?>"><li><a href="<?php echo site_url('models') ?>"><b>Models</b></a></li></ul>
		
		<div class="clear"></div>
		</div>
		<div class="clear"></div>
		</div>
		<!--  start nav -->

</div>
<div class="clear"></div>
<!--  start nav-outer -->
</div>
<!--  start nav-outer-repeat................................................... END -->

  <div class="clear"></div>
 
<!-- start content-outer ........................................................................................................................START -->
<div id="content-outer">
<!-- start content -->
<div id="content">