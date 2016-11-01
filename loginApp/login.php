<?php
include 'header.html';
include 'functions.php';
session_start ();

/**
 * **************************************************************
 */
function get_user($connection)
{
	$username = $_POST ['user_name'];
	$pwd = $_POST ['password'];
	$user_select_query = "select * from userinfo where user_name = '$username' and password ='$pwd'";
	$user = mysqli_query ( $connection, $user_select_query );
	if (is_object ( $user ))
	{
		// making row to check is there a row
		$num_row = mysqli_num_rows ( $user );
		if ($num_row == 1)
		{
			return $user;
		}
	}
	return null;
}

/**
 * **************************************************************
 */
function set_login_session($array)
{
	$_SESSION ['username'] = $array ['user_name'];
	$_SESSION ['p_img'] = $array ['image'];
	// taking the user to the landingpage
	header ( "Location: landingPage.php" );
}
/**
 * **************************************************************
 */
function login_user()
{
	$dbConnection = get_db_connection ();
	$user = get_user ( $dbConnection );
	if ($user !== null)
	{
		$array = mysqli_fetch_assoc ( $user );
		set_login_session ( $array );
	} else
		return false;
}

?>
<div class="container">
	<h1>Log In</h1>
	<form class="form-horizontal" role="form" action="login.php"
		method="post">
		<div class="from-group">
			<label for="user_name">Username</label> <input type="text"
				class="form-control" name="user_name">
		</div>
		<div class="from-group">
			<label for="password">Password</label> <input type="Password"
				class="form-control" name="password">
		</div>
		<br>
		
		<?php
		if (! empty ( $_POST ))
		{
			$success = login_user ();
			if (! $success)
			{
				echo '<div class="alert alert-warning">Username and password is incorrect</div>';
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
include 'footer.html';
?>