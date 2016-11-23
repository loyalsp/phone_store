<?php
include 'landingHeader.php';
include 'functions.php';
$username = $_SESSION ['username'];

if (! empty ( $_GET ) && isset ( $_GET ['delete'] ))
{
	$indexOfCart = $_GET ['delete'];
	delete_product ( $indexOfCart );
}
/*
***************************************************************************
				 			* FUNCTIONS SECTION
***************************************************************************
*/
// this function is called when the user delete any product from his cart
function delete_product($index)
{
	unset ( $_SESSION ['cart'] [$index] );
	array_values ( $_SESSION ['cart'] );
	if (empty ( $_SESSION ['cart'] ))
	{
		unset ( $_SESSION ['cart'] );
	}
	header ( "Refresh:0; url=cart.php?view_cart=yes" );
}

/*
 *********************************************************************
 */
function select_product($connection, $product_id)
{
	$select_product = "select * from products where product_num=$product_id";
	$selected = mysqli_query ( $connection, $select_product );
	$product = mysqli_fetch_array ( $selected );
	return $product;
}

/*
 **********************************************************************
 */
function add_to_cart()
{
	$_SESSION ['p_num'] = $_GET ['p_num']; // this holds product id
	$connection = get_db_connection ();
	// getting array to display info of an item
	$quantity = 1;
	$product = select_product ( $connection, $_SESSION ['p_num'] );
	if (! isset ( $_SESSION ['cart'] ))
	{
		$cart = array ();
		array_push ( $cart, $product );
		$_SESSION ['cart'] = $cart;
	} else
	{
		array_values ( $_SESSION ['cart'] );
		array_push ( $_SESSION ['cart'], $product );
	}
	// this page will show the one last product when the product successfully added to cart
	require_once ('show_product.php');
}

/*
 **************************************************************************
 */
function view_cart()
{
	if (isset ( $_SESSION ['cart'] ))
	{
		$price = 0;
		foreach ( $_SESSION ['cart'] as $key => $product )
		{
			?>
<td><?=$product['product_name']?></td>
<td><img src="./<?=$product['image']?>" class="img-responsive"
	style="height: 30px; width: auto;"></td>
<td><?=$product['price']?></td>
<td><div class="btn-pos">
		<a href="cart.php?delete=<?=$key?>" class="btn
				btn-success"
			role="button" style="width: auto;">Delete</a>
	</div></td>
</tr>

<?php
			$price = $price + $product ['price'];
		}
		echo '<td></td>
<td></td>
<td><strong>Total Price : '. $price .'</strong></td>
<td></td>';
	} else
		echo '<div class="alert alert-info">There is no item in your cart</div>';
}
?>






<!--------------------------HTML SECTION------------------------->
							
							
<div class="container">
	<a href="./">GO BACK TO SHOP</a> <br>
	<table class="table table-striped table-bordered">
		<tr>
			<th>Product Name</th>
			<th>Image</th>
			<th>Price</th>
			<th>Items</th>
		</tr>
		<tr>
<?php
if (! empty ( $_GET ) && isset ( $_GET ['p_num'] ))
{
	add_to_cart ();
}
if (! empty ( $_GET ) && isset ( $_GET ['view_cart'] ))
{
	view_cart ();
}
?>
	</table>
</div>
<?php
include 'footer.html';
?>