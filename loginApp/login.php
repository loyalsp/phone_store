<?php
include 'header.html';
include 'functions.php';
session_start ();
function sign_in()
{
	$username = $_POST ['user_id'];
	$pwd = $_POST ['pwd'];
	$dbConnection = get_db_connection ();
	$does_user_exist = "select * from users where user_id = '$username' and pwd ='$pwd'";
	$result_existance = mysqli_query ( $dbConnection, $does_user_exist );
	// $result = mysqli_fetch_array($result);
	$rows = mysqli_num_rows ( $result_existance );
	if ($rows == 1)
	{
		// set a session variable to know if user has logged in
		$_SESSION ['username'] = $username;
		$get_the_user_info = "select first_name,last_name from users where user_id = '$username'";
		$result_info = mysqli_query ( $dbConnection, $get_the_user_info );
		$array = mysqli_fetch_assoc ( $get_the_user_info );
		$_SESSION ['first_name'] = $array ['first_name'];
		$_SESSION ['last_name'] = $array ['last_name'];
		close_the_connection ( $dbConnection );
		// launch the landing page
		header ( "Location: landingPage.php" );
	} else
		close_the_connection ($dbConnection);
	return false;
}

?>
<div class="container">
	<h1>Log In</h1>
	<form class="form-horizontal" role="form" action="login.php"
		method="post">
		<div class="from-group">
			<label for="user_id">Username</label> <input type="text"
				class="form-control" name="user_id">
		</div>
		<div class="from-group">
			<label for="pwd">Password</label> <input type="Password"
				class="form-control" name="pwd">
		</div>
		<br>
		<?php
		if (! empty ( $_POST ))
		{
			$do_sign_in = sign_in ();
			if (! $do_sign_in)
			{
				echo '<div class="alert alert-danger" role="alert">
			Invalid id or password!
            </div>';
			}
		}
		?>
		
		
		<div class="from-group">
			<input class="btn btn-default" type="Submit" value="Log in">
		</div>
		<br> <a href="./signUp.php" class="">Don't Have Account Register Here</a>
	</form>
</div>

<?php
include 'footer.html';?>