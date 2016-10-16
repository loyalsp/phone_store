 <?php
 include 'adminHeader.html';
include 'functions.php';
if (! empty($_POST)) {
    
   
    $category_name = $_POST['category_name'];
    $product_name = $_POST['product_name'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];
    $image = $_POST['image'];
    $dbConnection = mysqli_connect($dbhost, $dbuser, $dbpass, $database);
    if (! $dbConnection) {
        die('Could not connect: ' . mysql_error());
    } else {
        
        mysqli_autocommit($dbConnection, FALSE);
        $sql_1 = "select category_id from categories where category_name ='$category_name'";
        $result_1 = mysqli_query($dbConnection, $sql_1);
        $array = mysqli_fetch_assoc($result_1);
        $category_id = $array['category_id'];
        $flag = true;
        if (! $result_1) {
            $flag = false;
            echo '$sql_1 in unsuccesfull ' . mysqli_error($dbConnection);
        }
        $sql_2 = "insert into products(category_num,product_name,price,stock,image) values('$category_id','$product_name','$price','$stock','$image')";
        $result_2 = mysqli_query($dbConnection, $sql_2);
        
        if (! $result_2) {
            $flag = false;
            echo '$sql_2 is unsuccesfull ' . mysqli_error($dbConnection);
        }
        if ($flag) {
            $success = mysqli_commit($dbConnection);
            
            if ($success) {
                echo '<script type="text/javascript">
                        alert("Congatulation product is uploaded!");
                        </script>';
            }
        } else {
            
            mysqli_rollback($dbConnection);
            echo ' $queries are rolledback ';
        }
        mysqli_close($dbConnection);
    }
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
				<div class="from-group">
					<input class="btn btn-default" type="Submit" value="Upload">
				</div>
			</form>
		</div>


<?php
include 'footer.php';
?>
