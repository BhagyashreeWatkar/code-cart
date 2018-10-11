<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

<!--<p><?php //echo $this->session->flashdata('statusMsg'); ?></p>-->
<ul>
	<li><a href="<?php echo base_url().'index.php/welcome/show_cart/';?>"><i class="fa fa-shopping-cart"></i>
	<?php
	if(isset($_COOKIE['cookie_product_id']))
	{
		$ans = explode(",",$_COOKIE['cookie_product_id']);
		$result = array_unique($ans);
		$cartcnt=count($result);
	}
	else
	{
		$cartcnt=0;
	}
?>Cart(<span><?php echo $cartcnt; ?></span>) </a></li>
</ul>

<form method="post" action="" enctype="multipart/form-data">
	    <label>Product name</label>
    	<input type="text" name="productname" value=""><br>
        <label>Choose Files</label>
        <input type="file" name="files[]" multiple/>
   		<input type="submit" name="fileSubmit" value="UPLOAD"/>

</form>



<div class="row">
    <?php foreach($files as $file){ ?>

    	
       <?php echo $file['product_name']; ?>
     <img style="width:70px;height:70px;" src="<?php echo base_url('uploads/files/'.$file['file_name']); ?>" >
     
     <input type="text" name="quantity" class="quantity" class="quantity" id="<?php echo $file['product_id']; ?>

     
     <a href="#" class="add-to-cart" data-id="<?=$file['product_id'] ?>" data-name="<? =$file['file_name']; ?>"><i>Add to cart</i>




            
     <?php }  ?>
    </div>

</div>
<script>
	var base_url="<?php echo base_url(); ?>";
</script>
<script src="<?php echo base_url().'assets/'?>js/jquery-3.3.1.min.js"></script>
<!--<script src="<?php //echo base_url().'assets/'?>js/product.js"></script>-->
<script type="text/javascript">
	$(".add_cart").click(function()
	{
		alert(1);
		var id= $(this).data('id');
		var name= $(this).data('name');
		var price= $(this).data('price');
		alert(id=name=price);
		$.ajax({
			url:'welcome/add_product',
			method: "POST",
			data:{'id':id,'name':name,'price':price},
			success:function(data)
			{
				console.log(data);
			}
		})
	})
</script>
</body>
</html>