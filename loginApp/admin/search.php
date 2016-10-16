<?php
include 'functions.php';
function  search_for_products()
{
	$search = $_POST['search'];
	$dbConnection = get_db_connection();
	$search_query = "select * from products where product_name like '$search%'";
	$result_of_search_query = mysqli_query($dbConnection, $search_query);
	if(!$result_of_search_query)
	{
		$num_rows = mysqli_num_rows($result_of_search_query);
		if ($num_rows>0)
		{
			$product_list = array ();
			$i = 0;
			while($num_rows>$i){
		$array = mysqli_fetch_assoc($result_of_search_query);
		$product_list = array_push($product_list,$array);
			$i++;
			}
		}
		return $product_list;
	}
}
if(isset($_POST)){
$product_list = search_for_products();
foreach ($product_list as $product){
	echo $product['product_name'];
}
}
html
?>