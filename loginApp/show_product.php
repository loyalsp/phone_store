-=<div id="wrapper" style="text-align: center">
	<div id="yourdiv" style="display: inline-block; padding: 10px;">
		<img src="./<?=$product['image']?>" class="img-rounded"
			style="width: 300px; height: 330px;">
		<p>Price :<?=$product['price']?> <strong>Rs</strong>
		</p>
		<p><?=$product['product_name']?></p>
		<a href="cart.php?view_cart=yes">VIEW CART</a>
		<div class="alert alert-success">This item has been added to your cart</div>
	</div>
</div>


