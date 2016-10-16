 <?php
include 'adminHeader.html';
include 'functions.php';

function select_the_category_from_db()
{
	$category_name = $_POST['category_name'];
$dbConnection = get_db_connection();
$get_category_from_db = "select category_id from categories where category_name ='$category_name'";
$result_of_get_category = mysqli_query( $dbConnection, $get_category_from_db) ;
$array = mysqli_fetch_assoc($result_of_get_category);
$selected_category_num = $array['category_id'];
return $selected_category_num;
}

function upload_new_product()
{
	$selected_category = select_the_category_from_db();
	$dbConnection = get_db_connection();
	$product_name = $_POST['product_name'];
	$price = $_POST['price'];
	$stock = $_POST['stock'];
	$image = $_POST['image'];
	$upload_the_product = "insert into products(category_num,product_name,price,stock,image) values('$selected_category','$product_name','$price','$stock','$image')";
	$result_of_uploaded_product = mysqli_query($dbConnection, $upload_the_product);
	return true;
}

function update_the_product()
{
	$product_name = $_POST['product_name'];
	$new_stock = $_POST['stock'];
	
	$dbConnection = get_db_connection();
	$does_product_exist = "select product_num,stock from products where product_name='$product_name'";
	$result_of_product_exist = mysqli_query($dbConnection, $does_product_exist);
	$num_rows = mysqli_num_rows ( $result_of_product_exist );
	if ($num_rows==1)
	{
	$array = mysqli_fetch_assoc($result_of_product_exist);
	$product_num = $array['product_num'];
	$previous_stock = $array['stock'];
	$updated_stock = $previous_stock+$new_stock;
	$update_the_product = "update products set stock=$updated_stock where product_num=$product_num";
	$result_of_update = mysqli_query($dbConnection, $update_the_product);
	return true;
	}
	else return false;
}
function main_function()
{
	$selected_category_num = select_the_category_from_db();
	$result_of_update = update_the_product();
	if(!$result_of_update)
	{
		$result_of_new_upload = upload_new_product();
		return $result_of_new_upload;
	}
	else return false;
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
						<option value="grocery">grocery</option>
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
					$result_of_new_upload = main_function();
					if($result_of_new_upload)
					{
						echo 'new product has been inserted';
					}
					else echo 'prodct exists so stock has been updated';
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
