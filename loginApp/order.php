<?php
session_start ();
include 'landingHeader.html';
include 'functions.php';

function update_the_product()
{
	$product_id = $_SESSION ['p_num'];
	$new_stock = $_POST['quantity'];

	$dbConnection = get_db_connection();
	$does_product_exist = "select product_num,stock from products where product_num=$product_id";
	$result_of_product_exist = mysqli_query($dbConnection, $does_product_exist);
	$num_rows = mysqli_num_rows ( $result_of_product_exist );
	if ($num_rows==1)
	{
		$array = mysqli_fetch_assoc($result_of_product_exist);
		$product_num = $array['product_num'];
		$previous_stock = $array['stock'];
		$updated_stock = $previous_stock-$new_stock;
		$update_the_product = "update products set stock=$updated_stock where product_num=$product_num";
		$result_of_update = mysqli_query($dbConnection, $update_the_product);
		return true;
	}
	else return false;
}



function make_an_order()
{
	$dbConnection = get_db_connection ();
	$username = $_SESSION ['username'];
	$product_id = $_SESSION ['p_num'];
	$sql_order = "insert into orders(customerId,product_number) values('$username',$product_id)";
	$result_order = mysqli_query ( $dbConnection, $sql_order );
	$sql_p_name = "select product_name from products where product_num=$product_id";
	$sql_p_name_result = mysqli_query ( $dbConnection, $sql_p_name );
	$array = mysqli_fetch_array ( $sql_p_name_result );
	$product_name = $array ['product_name'];
	if (! $result_order)
	{
		echo mysqli_error ( $dbConnection );
	} else
		echo 'You just have buy ' . $product_name;
}

if (! empty ( $_POST ))
{
	make_an_order ();
	update_the_product();
}
?>
<div class="container">
	<h1>Order Confirmation</h1>
	<form class="form-horizontal" role="form" action="order.php"
		method="post">
		<div class="from-group">
			<label for="quantity">How many items you want to buy?</label> <input
				type="number" class="form-control" name="quantity">
		</div>


		<br>

		<div class="from-group">
			<input class="btn btn-default" type="Submit" value="Order">
		</div>
		<br> <a href="./signUp.php" class="">Don't Have Account Register Here</a>
	</form>
</div>
<?php
include 'footer.html';
?>