<?php
include 'landingHeader.php';
include 'functions.php';
$product_id = $_SESSION ['p_num'];
$username = $_SESSION ['username'];

function select_product_row($connection,$product_id)
{
	$select_product = "select * from products where product_num=$product_id";
	$result = mysqli_query ( $connection, $select_product );
	$obejct_products = mysqli_fetch_object($result);
	return $obejct_products;
}


$dbConnection = get_db_connection();
$quantity = 1;
$date = date("D/ M/ j --  G:i:sa");
//$order_q = "insert into cart values('$username',$product_id,$quantity,'$date')";
$order_q = "insert into cart(user_id,product_id,quantity,order_date) values('$username',$product_id,$quantity,'$date')";
$res = mysqli_query($dbConnection, $order_q);
if(!$res)
{
	echo mysqli_error($dbConnection);
}
 $select_cart = "select * from cart where user_id='$username'";
$selected = mysqli_query($dbConnection, $select_cart);
$rows = mysqli_num_rows($selected);
$i = 0;
?>
<div class="container">
<table class="table table-hover table-bordered">
	<tr>
		<th>Order Id</th>
		<th>Product Name</th>
		<th>Image</th>
		<th>Items</th>
		<th>Added to Cart at</th>
	</tr>
<?php
while ( $rows > $i )
{
	
	 $object = mysqli_fetch_object($selected);
	 $p_id = $object->product_id;
	$obejct_products = select_product_row($dbConnection,$p_id);
	 ?>
	<tr>
		<td>
	<?=$object->order_id?>
	</td>
		<td>
	<?=$obejct_products->product_name?>
	</td>
	<td>
	<img src="./<?=$obejct_products->image?>" class="img-responsive" style="height:30px;width:auto;">
	</td>
		<td>
	<?=$object->quantity?>
	</td>
		<td>
	<?=$object->order_date?>
	</td>
	</tr>
	<?php 
	$i++;
 } 

?>
</table>
</div>

<?php
include 'footer.html';
?>