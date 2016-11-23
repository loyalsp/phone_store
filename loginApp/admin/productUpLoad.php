 <?php
include 'adminHeader.html';
include 'functions.php';

function select_the_category_from_db($connection)
{
	
	$category_name = $_POST['category_name'];
	$get_category_from_db = "select category_id from categories where category_name ='$category_name'";
	$result_of_get_category = mysqli_query( $connection, $get_category_from_db) ;
	$array = mysqli_fetch_assoc($result_of_get_category);
	$selected_category_name = $array['category_id'];
	return $selected_category_name;
}

function upload_new_product($connection)
{
	$selected_category = select_the_category_from_db($connection);
	$product_name = $_POST['product_name'];
	$price = $_POST['price'];
	$stock = $_POST['stock'];
	$image = $_POST['image'];
	$upload_the_product = "insert into products(category_num,product_name,price,stock,image) values('$selected_category','$product_name','$price','$stock','$image')";
	$result_of_uploaded_product = mysqli_query($connection, $upload_the_product);
	return true;
}

function does_product_exist($connection)
{
	$product_name = $_POST['product_name'];
	$does_product_exist = "select product_num,stock from products where product_name='$product_name'";
	$result_of_product_exist = mysqli_query($connection, $does_product_exist);
	if(!$result_of_product_exist)
	{
	return false;	
	}
	else return $result_of_product_exist;
}
function update_the_product($connection)
{
	$result_of_product_exist = does_product_exist($connection);
	if(isset($result_of_product_exist))
	{
	$num_rows = mysqli_num_rows ( $result_of_product_exist );
	if ($num_rows==1)
	{
	$array = mysqli_fetch_assoc($result_of_product_exist);
	$product_num = $array['product_num'];
	$previous_stock = $array['stock'];
	$new_stock = $_POST['stock'];
	$updated_stock = $previous_stock+$new_stock;
	$update_the_product = "update products set stock=$updated_stock where product_num=$product_num";
	$result_of_update = mysqli_query($connection, $update_the_product);
	if(!$result_of_update)
	{
		return false;
	}
	else return true;
	}
	}
}

function main_function()
{
	$dbConnection = get_db_connection();
	$result_of_update = update_the_product($dbConnection);
	if(!$result_of_update)
	{
		$result_of_new_upload = upload_new_product($dbConnection);
		return false;
	}
	else return true;

}

?>
	<div class="container">
			<h1>Upload a Product</h1>
			<form class="form-horizontal" role="form" action="productUpload.php"
				method="post">


				<div class="from-group">
					<label for="category_name">Select a Categorey</label> <select
						class="form-control" name="category_name" required>
						<option></option>
						<option value="electronics">Electronics</option>
						<option value="Fasion">Fasion</option>
						<option value="furniture">furniture</option>
					</select>
				</div>
				<div class="from-group">

					<label for="product_name">Product Name</label> <input type="text"
						class="form-control" name="product_name">
				</div>

				<div class="from-group">

					<label for="price">Price</label> <input type="number"
						class="form-control" name="price">

				</div>
				<div class="from-group">

					<label for="stock">Stock</label> <input type="number"
						class="form-control" name="stock">
				</div>
				<div class="from-group">

					<label for="image">File Path</label> <input 
						class="form-control" name="image">
				</div>
				<br>
				<?php 
				if(!empty($_POST)){
					$product_name = $_POST['product_name'];
					$result_of_new_upload = main_function();
					if($result_of_new_upload)
					{
						echo $product_name.' exists! so product`s stock has been update';
					}
					else echo 'New product '.$product_name.' has been inserted';
					
				}
				?>
				
				
				<div class="from-group">
					<input class="btn btn-default" type="Submit" value="Upload">
				</div>
			</form>
		</div>


<?php
include 'footer.html';
?>
