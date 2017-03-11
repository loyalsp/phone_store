<?php 
include 'landingHeader.php';
include 'functions.php';

$username = $_SESSION['username'];
//=========== Functions Section==============//

// this function will be used to establish
// databse connection.it returns connection object.


// this is to close the b connection
function close_db_connection($connection)
{
    return mysqli_close($connection);
}

function get_all_products()
{
		// we make ann array product-list to hold all products
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
	}
	else
	{
		echo "could not connect";
	}
	// in the end we close the connection and return the priducts
	close_db_connection ($dbConnection);
	return $product_list;
}


function load_products()
{
	global $products;
    if (is_user_logged()) {
        // get al products if user is logged in
        $products = get_all_products();
        // you can do all watever you want for logged in user
    } else {
        
        header("Location: login.php");
    }
}

function is_user_logged()
{
	if (! empty($_SESSION['username']))
		return true;
	else 
		return false;
}

function print_login_info()
{
	if(is_user_logged())
	{
	/*echo "<p class="strong">Your Full name is' . $_SESSION['firstname']?> . <?=$_SESSION['lastname']?> .
			'and you are logged in as' . <?=$_SESSION['username']?> . '</p>";*/
	
	
	}
	
}

if (! empty($_SESSION['username']) && ! empty($_POST['logout']) && $_POST['logout'] == 'yes') {
	$username = $_SESSION['username'];
    session_unset();
    session_destroy();
    
    header("Location: login.php");
}

//=========TEST SECTION==========//
function test_product()
{
	$prods = get_all_products();
	
	foreach ($prods as $product)
	{
		echo $product['product_num'];
	}
}
// FOR Making an order
// USE GET
if (! empty($_GET)) {
     // p_num will be present if passed as query parameter
   $_GET['p_num']; 
    // p_num will be present if passed as query parameter
   
    
   header("Location: cart.php");
}

?>
<!-- HTML SECTION -->
<div class="container">
	<h1>Landing Page</h1>
	<div class="row">

		<!--Product-->
		<?php
		print_login_info ();
		load_products ();
		if (! empty ( $products ))
			foreach ( $products as $prod )
			{
				?>
		<div class="col-xs-6 col-md-4">
			<img src="<?=$prod['image']?>" class="img-responsivep p-img">
			<div class="btn-pos">
			<p><?=$prod['product_name']?></p>
			<p>Price: $ <?=$prod['price']?></p>
			</div>
<div class="btn-pos">
			<a href="cart.php?p_num=<?=$prod['product_num'] ?>"
				class="btn
				btn-success" role="button" style="width:auto;">Add to Cart</a>
				</div>
		</div>
		<?php
			}
		?>
		<!--Product-->
		
	</div>
</div>

<!------------------------------FOOTER----------------------------------->
<?php 
include 'footer.html';
?>