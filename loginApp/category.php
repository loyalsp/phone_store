<?php
session_start ();
include 'header.html';
include 'functions.php';
// Get the products from db
function get_all_products()
{
	// we make an array product-list to hold all products
	$product_list = array ();

	// getting the data from Db
	$dbConnection = get_db_connection ();
	if ($dbConnection)
	{
		$cat_name = $_GET['category_name'];
		$select_cat = "select category_id from categories where category_name='$cat_name'";
		$result_of_select_cat = mysqli_query ( $dbConnection, $select_cat );
		$array_1 = mysqli_fetch_array ( $result_of_select_cat );
		$category_num = $array_1['category_id'];
		
		$sql_1 = "select * from products where category_num=$category_num";
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
				$array_2 = mysqli_fetch_array ( $result );
				array_push ( $product_list, $array_2 );
				$i ++;
			}
		}
	} else
	{
		echo "could not connect";
	}
	// in the end we close the connection and return the priducts
	close_the_connection($dbConnection);
	return $product_list;
}
function load_products()
{
	global $products;
		$products = get_all_products();
		// you can do all watever you want for logged in user
	
}


?>
<div class="container">
	<h1>Landing Page</h1>
	<div class="row">

	<!--Product-->
		<?php
		if(!empty($_GET))
		{
		load_products ();
		if (! empty ( $products ))
			foreach ( $products as $prod )
			{
				?>
		<div class="col-xs-6 col-md-4">
			<img src="<?=$prod['image']?>" class="img-responsivep p-img">
			<div class="btn-pos">
			<p><?=$prod['product_name']?></p>
			<p>Price <?=$prod['price']?>.Rs</p>
			</div>
<div class="btn-pos">
			<a href="./logIn.php"
				class="btn btn-success" role="button" style="width:85px;">BUY</a>
				</div>
		</div>
		<?php
			}
		}
		else header("location : index.php")
		?>
		<!--Product-->
		
	</div>
</div>
</div>
</div>
<?php
include 'footer.html';
?>