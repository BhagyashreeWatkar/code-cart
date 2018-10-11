<!DOCTYPE html>
<html>
<head>
	<script type="text/javascript">jquery link googleapi</script>
</head>
<body>
<?php
foreach($product as $row)
{
	echo '
	<div>
	<img src="'.base_url().'images/'.$row->product_image.'">
	<h4>'.$row->product_name.'</h4>
	<h3>price</h3>
	<input type="text" name="quantity" class="quantity" id="'.$row->product_id.'"/>
	<button type="button" class="add_cart" data-productname="'.$row->product_price.'" data-price="'.$row->productid.'" />Add to cart</button>
	</div>

	';
}

?>

<div>
	<div id="cart_details">
		<h3>cart empty</h3>
	</div>
	</div>
</body>
</html>

<script type="text/javascript">
	$('.add_cart').click(function(){
		var product_id=$(this).data("productid");
		var product_name=$(this).data("productid");
		var product_price=$(this).data("productid");
		$.ajax({
			url:"<?php echo base_url(); ?>shopping_cart/add",
			method:"post",
			data:{product_id:product_id,name,price},
			success:function(data)
			{
				alert(added);
				$('#cart_details').html(data);
				$('#'+product_id).val('');
			}
		})
	})
</script>