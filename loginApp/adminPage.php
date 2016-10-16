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
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<style>
*{font-family: 'Play', sans-serif;}

.box {
	background-color: magenta;
	border: 1px solid;
}

.round {
	height: 200px;
	width: 170px;
}

.sign-in-facebook {
	background-position: -9px -7px;
	background-repeat: no-repeat;
	background-size: 39px 43px;
	padding-left: 25px;
	padding-right: 25px;
	color: #000;
}

.sign-in-facebook:hover {
	background-position: -9px -7px;
	background-repeat: no-repeat;
	background-size: 39px 43px;
	color: #000;
}

p {
	font-weight: bold;
}

.strong {
	font-weight: bold;
}

body {
	font-family: 'PT Sans', sans-serif;
	font-size: 13px;
	font-weight: 400;
	position: relative;
}

/*.body-wrap {
	min-height: 700px;
}
*/
.body-wrap {
	position: relative;
	z-index: 0;
}

nav {
	margin-top: 60px;
	box-shadow: 5px 4px 5px #000;
}

.top-cont {
	background-color: orange;
}
</style>




</head>
<body>
	<div class="body-wrap">
		<div class="navbar navbar-inverse">
			<!-- class container-fluid can be used for -->
			<div class="container">
				<!-- setting up navbar header -->
				<div class="navbar-header">
					<!-- Responsive Navbar-->
					<!-- targeting the class -->
					<button type="button" class="navbar-toggle" data-toggle="collapse"
						data-target=".navbar-collapse">
						<span class="sr-only">Toggle navigation</span> 
						<span class="icon-bar"></span>
						<span class="icon-bar"></span> 
						<span class="icon-bar"></span>
					</button>
					<!-- naming the header -->
					<a href="" class="navbar-brand">Log In App</a>
				</div>
				<div class="collapse navbar-collapse">
					<ul class="nav navbar-nav">
						<li class="#"><a class="strong" href="./productUpload.php">Upload Any Product</a></li>
						<li class="#"><a class="strong" href="./categorey.php">Make New Category</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li class="dropdown"><a href="" class="dropdown-toggle strong"
							data-toggle="dropdown"><b class="caret"></b></a>
							<ul class="dropdown-menu">
							<li class="#"><a class="strong" href="./productUpload.php">SETTING</a></li>
							<li class="#"><a class="strong" href="">LOG OUT</a></li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<?php 
	include 'footer.html';
	?>