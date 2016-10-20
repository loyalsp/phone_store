<?php
include 'header.html';
?>
<?php 
session_start();
if(empty($_SESSION)){
	header("Location:logIn.php");
}
if (! empty($_SESSION['username']) && ! empty($_POST['logout']) && $_POST['logout'] == 'yes') {
    session_unset();
    session_destroy();
           

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
