<?php
include 'adminHeader.html';
include 'functions.php';
session_start ();
function get_new_category()
{
	$new_category = $_POST ['category_name'];
	return $new_category;
}
function does_categorey_exist()
{
	$dbConnection = get_db_connection ();
	$new_category = get_new_category ();
	$does_categorey_exist = "select category_name from categories";
	$does_categorey_exist_result = mysqli_query ( $dbConnection, $does_categorey_exist );
	$num_rows = mysqli_num_rows ( $does_categorey_exist_result );
	if ($num_rows > 0)
	{
		$i = 0;
		while ( $num_rows > $i )
		{
			$array = mysqli_fetch_array ( $does_categorey_exist_result );
			$categories_in_db = $array ['category_name'];
			
			if ($new_category == $categories_in_db)
			{
				
				return true;
			}
			$i ++;
		}
	} 

	else
	{
		return false;
	}
}
function insert_new_category()
{
	$new_category = does_categorey_exist ();
	if ($new_category == false)
	{
		$new_category = get_new_category ();
		$dbConnection = get_db_connection ();
		$insert_new_category = "insert into categories (category_name) values('$new_category')";
		$insert_new_category_result = mysqli_query ( $dbConnection, $insert_new_category );
		return true;
	}
}

?>
<div class="container">
	<h1>Creat New Catagorey</h1>
	<form class="form-horizontal" role="form" action="categorey.php"
		method="post">
		<div class="from-group">

			<label for="category_name">Categorey Name</label> <input type="text"
				class="form-control" name="category_name">
		</div>
		<?php
		if (! empty ( $_POST ))
		{
			$make_new_category = insert_new_category ();
			$new_category = get_new_category ();
			if ($make_new_category == true)
			{
				echo 'Congrats a New Category ' . $new_category . ' Has Been Created!';
			} else
				echo 'The Category ' . $new_category . ' you are trying to make is already there ';
		}
		?>
		
		
		<div class="from-group">
			<br> <input type="submit" value="Create" class="btn btn-default"
				name="">
		</div>
	</form>
</div>

<?php
include 'footer.html';
?>