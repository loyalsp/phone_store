<?php
include 'header.html';
session_start ();
function get_db_connection()
{
	// CONECTING TO DB
	$dbhost = 'localhost:3306/';
	$dbuser = 'root';
	$dbpass = '';
	$database = 'online_orders';
	$dbConnection = mysqli_connect($dbhost, $dbuser, $dbpass, $database);
	return $dbConnection;

}
// Get the products from db
function get_all_products()
{
	// we make an array product-list to hold all products
	$product_list = array ();

	// getting the data from Db
	$dbConnection = get_db_connection ();
	if ($dbConnection)
	{

		$sql_1 = "select * from products where stock>=1";
		$result = mysqli_query ( $dbConnection, $sql_1 );
		echo mysqli_error ( $dbConnection );
		// getting the total rows from the db
		$num_rows = mysqli_num_rows ( $result );

		if ($num_rows > 0)
		{
			$i = 0;
			while ( $num_rows > $i )
			{
				// fetching the arrays from the rest
				$array = mysqli_fetch_array ( $result );
				array_push ( $product_list, $array );
				$i ++;
			}
		}
	} else
	{
		echo "could not connect";
	}
	// in the end we close the connection and return the priducts
	close_db_connection ( $dbConnection );
	return $product_list;
}
function load_products()
{
	global $products;
		$products = get_all_products();
		// you can do all watever you want for logged in user
	
}
// this is to close the b connection
function close_db_connection($connection)
{
	return mysqli_close($connection);
}
?>
<div class="container">
	<h1>Landing Page</h1>
	<div class="row">

	<!--Product-->
		<?php
		
		load_products ();
		if (! empty ( $products ))
			foreach ( $products as $prod )
			{
				?>
		<div class="col-xs-6 col-md-4">
			<img src="<?=$prod['image']?>" class="img-responsivep p-img">
			<p><?=$prod['product_name']?></p>
			<p>Price <?=$prod['price']?>.Rs</p>
			<p>Stock <?=$prod['stock']?></p>
<div class="btn-pos">
			<a href="./logIn.php"
				class="btn btn-info" role="button">BUY</a>
				</div>
		</div>
		<?php
			}
	
		?>
		<!--Product-->
		
	</div>
</div>
</div>
</div>
<?php
include 'footer.html';
?>