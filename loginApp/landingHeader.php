<?php 
session_start();
if (! empty($_GET) && isset($_GET['logout']) && $_GET['logout'] == 'yes') {
	session_unset();
	session_destroy();
	header("Location:logIn.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<title>Log in App</title>

<!-- Bootstrap -->
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Play" rel="stylesheet">
<link href="./custom.css" rel="stylesheet">
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<style>
*{font-family: 'Play', sans-serif;}
</style>
</head>
<body>
	<div class="main-wrapper">
		<div class="navbar navbar-inverse">
			<!-- class container-fluid can be used for -->
			<div class="container">
				<!-- setting up navbar header -->
				<div class="navbar-header">
					<!-- Responsive Navbar-->
					<!-- targeting the class -->
					<button type="button" class="navbar-toggle" data-toggle="collapse"
						data-target=".navbar-collapse">
						<span class="sr-only">Toggle navigation</span> <span
							class="icon-bar"></span> <span class="icon-bar"></span> <span
							class="icon-bar"></span>
					</button>
					<!-- naming the header -->
					<a class="navbar-brand" href="./">
            <span><img class="img-rounded" src="images/logo.png" style="position: relative; top:-3px;"></span>
				</div>
				<div class="collapse navbar-collapse">
					<ul class="nav navbar-nav">
						<li class="dropdown"><a href="" class="dropdown-toggle strong"
							data-toggle="dropdown" style="font-size: 16.5px;">CATEGORIES</a>
							<ul class="dropdown-menu">
								<li class=""><a class="strong" href="select_category.php?category_name=Electronics">
										Electronics</a></li>
								<li class=""><a class="strong" href="select_category.php?category_name=Furniture">Furniture</a></li>
								<li class=""><a class="strong" href="select_category.php?category_name=Fasion">Fasion</a></li>
								
								
								
							</ul>
	
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li class="dropdown"><a href="" class="dropdown-toggle strong"
							data-toggle="dropdown"><?=ucfirst($_SESSION['username'])?></a>
							
							<ul class="dropdown-menu">
								<li class=""><a class="strong" href="">Setting</a></li>
								<li class=""><a class="strong" href="cart.php?view_cart=yes">View Your Cart</a></li>
								<hr>
								<li class=""><a class="strong" href="landingHeader.php?logout=yes">Log Out</a></li>
		
							</ul></li>
							<img src="<?=$_SESSION ['p_img']?>" class="img-rounded" style="height:30px;width:40px; position:relative; top:10px;">
					</ul>
											<form class="navbar-form navbar-right" role="search">
  <div class="form-group">
    <input type="text" class="form-control" placeholder="Search" name="search">
  </div>
  <button type="submit" class="btn btn-default">Search</button>
</form>
				</div>
			</div>
		</div>
	</div>