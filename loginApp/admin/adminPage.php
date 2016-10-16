<?php 
include 'adminHeader.html';

include 'functions.php';
function  search_for_products()
{
	$search = $_POST['search'];
	$product_list = array ();
	$dbConnection = get_db_connection();
	$search_query = "select * from products where product_name like '$search%'";
	$result_of_search_query = mysqli_query($dbConnection, $search_query);
	
		$num_rows = mysqli_num_rows($result_of_search_query);
		if ($num_rows > 0)
		{
			$i = 0;
			while ( $num_rows > $i )
			{
				// fetching the arrays from the rest
				$array = mysqli_fetch_array ( $result_of_search_query );
				array_push ( $product_list, $array );
				$i ++;
				echo $i;
			}
		}
		
		return $product_list;
	}

if(!empty($_POST)){
	$product_list = search_for_products();
	
}

include 'footer.html';
?>
