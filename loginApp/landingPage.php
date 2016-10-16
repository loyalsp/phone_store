<?php 
include 'landingHeader.html';
include 'functions.php';
session_start();
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
    
    $product_num = $_GET['p_num']; // p_num will be present if passed as query parameter
    
    $dbConnection = get_db_connection();
    
    if (! $dbConnection) {
        echo 'could not connect ' . mysql_error();
    } else {
        $sql_order = "insert into orders(customerId,product_number) values('$username',$product_num)";
        $result_order = mysqli_query($dbConnection, $sql_order);
        $sql_p_name = "select product_name from products where product_num=$product_num";
        $sql_p_name_result = mysqli_query($dbConnection, $sql_p_name);
        $array = mysqli_fetch_array($sql_p_name_result);
        $product_name = $array['product_name'];
        if (! $result_order) {
            echo mysqli_error($dbConnection);
        } else
            echo 'You just have buy ' . $product_name;
    }
   close_db_connection($dbConnection);
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
			<p><?=$prod['product_name']?></p>
			<p>Price: <?=$prod['price']?>.Rs</p>
			<p>Stock left: <?=$prod['stock']?></p>
<div class="btn-pos">
			<a href="landingPage.php?p_num=<?=$prod['product_num'] ?>"
				class="btn
				btn-info" role="button">BUY</a>
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