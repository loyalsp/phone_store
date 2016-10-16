<?php
include 'header.html';
?>
<?php 
session_start();
if (! empty($_SESSION['username']) && ! empty($_POST['logout']) && $_POST['logout'] == 'yes') {
    session_unset();
    session_destroy();
           echo '<div class="container">
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
		<div class="alert alert-danger" role="alert">You are logged out!
            </div>
		<div class="from-group">
			<input class="btn btn-default" type="Submit" value="Log in">
		</div>
		
	</form>
</div>';
            return include 'footer.html';

}
if(!isset($_SESSION['username'])){
    header("Location:logIn.php");
}
?>
<div class="container">
	<h1>Confirmation</h1>
	<h5>Click logout to log out</h5>
	<form class="form-horizontal" role="form" action="logOut.php"
		method="post">
	<input type="hidden" value="yes" name="logout">
		<br>
		<div class="from-group">
			<input class="btn btn-default" type="Submit" value="Logout">
		</div>
	
	</form>
</div>
<?php
include 'footer.html';
?>
