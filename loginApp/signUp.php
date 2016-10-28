<?php
include 'functions.php';
function does_user_exist()
{
	$dbConnection = get_db_connection ();
	$username = $_POST ['user_name'];
	$sql = "select * from userinfo where user_name = '$username'";
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
		$y=$_POST['y'];
		$m=$_POST['m'];
		$d=$_POST['d'];
		$dob=$y."-".$m."-".$d;
		$gender = $_POST['gen'];
		$username = $_POST ['user_name'];
		$full_name = $_POST ['full_name'];
		
	
		$pwd = $_POST ['password'];
		$address = $_POST ['address'];
		
		$email = $username.'@onlinestore.com';
		mysqli_autocommit ( $dbConnection, FALSE );
		$sql_1 = "INSERT INTO userinfo(user_name,password,mobile,email,gender,hobbies,dob,image)
		VALUES ('$username','$pwd','','$email','$gender','','$dob','')";
		
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
				$to= $username;
				$sub=' Welcome message ';
				$msg='Congratulation '.$username. 'You have created new account.';
				$from= "admin@onlineorders.com";
				$d=mysqli_query($dbConnection,"SELECT * FROM userinfo where user_name='$to'");
				$row=mysqli_num_rows($d);
				if($row==1)
				{
				mysqli_query($dbConnection ,"INSERT INTO usermail values('','$to','$from','$sub','$msg','',sysdate())");		
				}
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
	$username = $_POST ['user_name'];
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
				class="form-control" name="full_name" style="width:250px;">
		</div>
		<br>
<div class="from-group">
<label for="gen">Gender</label>
			Male<input type="radio" name="gen" value="m">
		Female<input type="radio" name="gen" value="f">
		</div>
		
		<br>
		
		<div class="from-group">
			<label for="user_name">Username</label> <input type="text"
				class="form-control" name="user_name" style="width:250px;">
		</div>

		<div class="from-group">
			<label for="password">Password</label> <input type="Password"
				class="form-control" name="password" style="width:250px;">
		</div>

	

		<div class="from-group">
			<label>Date of Birth</label> 
			<br>
			<select name="y">
			<option value="">Year</option>
			<?php
			for($i=1900;$i<=2013;$i++)
			{
			echo "<option value='$i'>$i</option>";
			}
			?>
		</select>
		<select name="m">
			<option value="">Month</option>
			<?php
			for($i=1;$i<=12;$i++)
			{
			echo "<option value='$i'>$i</option>";
			}
			?>
		</select>
		<select name="d">
			<option value="">Date</option>
			<?php
			for($i=1;$i<=31;$i++)
			{
			echo "<option value='$i'>$i</option>";
			}
			?>
		</select>
		</div>

		<div class="from-group">
			<label for="address">Address</label> <input type="text"
				class="form-control" name="address" style="width:250px;">
		</div>
		<br>
		
		
		<?php
		if (! empty ( $_POST ))
		{
			$email = sign_up ();
			$username = $_POST ['user_name'];
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
		
			<input type="submit" value="Sign Up" class="btn btn-default" name="reg">
		</div>
		<br> <a href="./login.php" class="">Already Have Account Log In here</a>
	</form>
</div>

<?php
include 'footer.html';
?>
