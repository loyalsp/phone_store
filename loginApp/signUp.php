<?php
include 'functions.php';
function does_user_exist()
{
	$dbConnection = get_db_connection ();
	$username = $_POST ['user_id'];
	$sql = "select * from users where user_id = '$username'";
	$check_user_id = mysqli_query ( $dbConnection, $sql );
	$rows = mysqli_num_rows ( $check_user_id );
	if ($rows == 1)
	{
		close_the_connection ( $dbConnection );
		return true;
	}
}
function insert_into_db()
{
	{
		$dbConnection = get_db_connection ();
		$username = $_POST ['user_id'];
		$firstname = $_POST ['first_name'];
		$lastname = $_POST ['last_name'];
		$dob = $_POST ['dob'];
		$pwd = $_POST ['pwd'];
		$address = $_POST ['address'];
		
		$email = $username.'@onlinestore.com';
		mysqli_autocommit ( $dbConnection, FALSE );
		$sql_1 = "INSERT INTO users(user_id,pwd,first_name,last_name,dob,email)
		VALUES ('$username','$pwd','$firstname','$lastname','$dob','$email')";
		
		$user_id = $username;
		$sql_2 = "insert into address(customer_id,address)
		VALUES ('$user_id', '$address')";
		$flag = true;
		$result_1 = mysqli_query ( $dbConnection, $sql_1 );
		if (! $result_1)
		{
			$flag = false;
		}
		$resutl_2 = mysqli_query ( $dbConnection, $sql_2 );
		if (! $resutl_2)
		{
			$flag = false;
		}
		if ($flag)
		{
			$success = mysqli_commit ( $dbConnection );
			if ($success)
			{
				$subject = 'Congrat! Email has been created';
				$from = "From: admin@gmail.com<br>";
				$message = 'This is message!';
				send_email ( $email, $subject, $from, $message );
				return $email;
			}
		} 

		else
		{
			mysqli_rollback ( $dbConnection );
			
			return false;
		}
	}
	close_the_connection ( $dbConnection );
}
function sign_up()
{
	$username = $_POST ['user_id'];
	$check_existance = does_user_exist ();
	if (! $check_existance)
	{
		$email = insert_into_db ();
		
		if (isset ( $email ))
		{
			return $email;
		} else
			return false;
	}
}
function send_email($mail, $subject, $headers, $message)
{
	$to = $mail;
	$sent = mail ( $to, $subject, $message, $headers );
	if ($sent)
	{
		return true;
	}
	else return false;
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

			<label for="user_id">Username</label> <input type="text"
				class="form-control" name="user_id">
		</div>

		<div class="from-group">
			<label for="pwd">Password</label> <input type="Password"
				class="form-control" name="pwd">
		</div>

		<div class="from-group">
			<label for="first_name">First Name</label> <input type="text"
				class="form-control" name="first_name">
		</div>

		<div class="from-group">
			<label for="last_name">Last Name</label> <input type="text"
				class="form-control" name="last_name">
		</div>

		<div class="from-group">
			<label for="dob">Date of Birth</label> <input type="date"
				class="form-control" name="dob">
		</div>

		<div class="from-group">
			<label for="address">Address</label> <input type="text"
				class="form-control" name="address">
		</div>
		<br>
		
		<?php
		if (! empty ( $_POST ))
		{
			$email = sign_up ();
			$username = $_POST ['user_id'];
			if (isset ( $email ))
			{
				echo '<div class="alert alert-success" role="alert">
			Congratulatin you have created an account. Your email is <strong>' . $email . '</strong> and other
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
			<input type="submit" value="Sign Up" class="btn btn-default" name="">
		</div>
		<br> <a href="./login.php" class="">Already Have Account Log In here</a>
	</form>
</div>

<?php
include 'footer.html';
?>
