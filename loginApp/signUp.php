<?php
session_start();
if(!empty($_SESSION))
{
	header("location: landingPage.php");
}
include 'functions.php';
function get_username($connection, $username)
{
	$username = $_POST ['user_name'];
	// user_name field is unique
	$select_user_query = "select * from userinfo where user_name = '$username'";
	$user = mysqli_query ( $connection, $select_user_query );
	$row = mysqli_num_rows ( $user );
	if ($row == 1)
	{
		return true;
	}
	return false;
}

/********************************************************************
 *This function perfrom 2 insert quries if any of
 *one or both fails no data will be inserted and function return false
 *else return true 
 ********************************************************************/

function insert_newUser($connection, $user)
{
	
		$y = $_POST ['y'];
		$m = $_POST ['m'];
		$d = $_POST ['d'];
		$dob = $y . "-" . $m . "-" . $d;
		$gender = $_POST ['gen'];
		$full_name = $_POST ['full_name'];
		$profile_img = $_POST ['p_img'];
		$pwd = $_POST ['password'];
		$email = $user . '@onlinestore.com';
		$insert_user = "INSERT INTO userinfo(user_name,password,mobile,email,gender,hobbies,dob,image)
		VALUES ('$user','$pwd','','$email','$gender','','$dob','$profile_img')";
		$username_inserted = mysqli_query($connection, $insert_user);
		return $username_inserted;
		
	
}
function insert_userinfo($connection,$user)
{	

		$inserted = insert_newUser($connection, $user);
		if($inserted)
		{
		$customer_id = $user;
		$address = $_POST['address'];
		$userinfo_inserted = "insert into address(customer_id,address)
		VALUES ('$customer_id', '$address')";
		return true;
		}
		return false;
}

function send_email($connection, $to)
{
	$sub = ' Welcome message ';
	$msg = 'Congratulation ' . $to . 'You have created new account.';
	$from = "admin@onlineorders.com";
	$result = mysqli_query ( $connection, "INSERT INTO usermail values('','$to','$from','$sub','$msg','',sysdate())" );
	close_the_connection($connection);
	// Insert query returns boolean in both conditions.
}

/*
 * *******************************************************
 * This function can be used for delete the newly user
 * if mailsending fails we can run this to delete the user
 * ********************************************************
 
function delete_new_user($connection, $new_user)
{
	$delete_address_query = "delete from address where customer_id='$new_user'";
	$delete_user_query = "delete from userinfo where username='$new_user'";
	$address_deleted = mysqli_query ( $connection, $delete_address_query );
	if ($address_deleted)
	{
		$user_deleted = mysqli_query ( $connection, $delete_user_query );
	}
	return $user_deleted;
}
**************************************************************/
function sign_up($username)
{
	$dbConnection = get_db_connection ();
	$user = get_username($dbConnection,$username);
	if (!$user)
	{
		$inserted = insert_userinfo($dbConnection,$username);
		if ($inserted)
		{
			send_email ( $dbConnection, $username );
			return $inserted;
		}
	} 	
	else
	{
		close_the_connection($dbConnection);
		return false;
	}

}

?>
<?php

include 'header.html';
?>

<div class="container">
	<h1>Registration</h1>
	<form class="form-horizontal" role="form" action="signup.php"
		method="post">
		<div class="from-group">
			<label for="full_name">Full Name</label> <input type="text"
				class="form-control" name="full_name" style="width: 250px;">
		</div>
		<br>
		<div class="from-group">
			<label for="gen">Gender</label> Male<input type="radio" name="gen"
				value="m"> Female<input type="radio" name="gen" value="f">
		</div>

		<br>

		<div class="from-group">
			<label for="user_name">Username</label> <input type="text"
				class="form-control" name="user_name" style="width: 250px;">
		</div>

		<div class="from-group">
			<label for="password">Password</label> <input type="Password"
				class="form-control" name="password" style="width: 250px;">
		</div>



		<div class="from-group">
			<label>Date of Birth</label> <br> <select name="y">
				<option value="">Year</option>
			<?php
			for($i = 1900; $i <= 2013; $i ++)
			{
				echo "<option value='$i'>$i</option>";
			}
			?>
		</select> <select name="m">
				<option value="">Month</option>
			<?php
			for($i = 1; $i <= 12; $i ++)
			{
				echo "<option value='$i'>$i</option>";
			}
			?>
		</select> <select name="d">
				<option value="">Date</option>
			<?php
			for($i = 1; $i <= 31; $i ++)
			{
				echo "<option value='$i'>$i</option>";
			}
			?>
		</select>
		</div>

		<div class="from-group">
			<label for="address">Address</label> <input type="text"
				class="form-control" name="address" style="width: 250px;">
		</div>
		<div class="from-group">
			<label for="p_img">Profile image</label> <input type="text"
				class="form-control" name="p_img" style="width: 250px;">
		</div>
		<br>
		
		
		<?php
		if (! empty ( $_POST ))
		{
			$username = $_POST ['user_name'];
			$succes = sign_up ( $username );
			if ($succes)
			{
				echo '<div class="alert alert-success" role="alert">
			Congratulatin you have created an account. Your email is 
			<strong>' . $username . '@onlineorder.com</strong>' . ' and other
			information has been inserted!<br>
			<strong>An email has been sent to your account for confirmation.</strong>
            </div>';
			} 

			else
				echo '<div class="alert alert-danger" role="alert">
			The Username ' . $username . ' is already taken 
			try some other!
            </div>';
		}
		?>
			

		<!-- keep me log in input -->

		<div class="from-group">

			<input type="submit" value="Sign Up" class="btn btn-default"
				name="reg">
		</div>
		<br> <a href="./login.php" class="">Already Have Account Log In here</a>
	</form>
</div>

<?php
include 'footer.html';
?>