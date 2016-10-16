<?php
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
.top-cont{
background-color:orange;
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
					<span class="sr-only">Toggle navigation</span> <span
						class="icon-bar"></span> <span class="icon-bar"></span> <span
						class="icon-bar"></span>
				</button>
				<!-- naming the header -->
			<a href="" class="navbar-brand pull">Log In App</a>
			</div>
			<div class="collapse navbar-collapse">
				<ul class="nav navbar-nav navbar-right">
					<li class="#"><a class="strong" href="./signUp.php">Sign Up</a></li>

					<li class="#"><a class="strong" href="./login.php">Log In</a></li>

				</ul>
			</div>
		</div>
	</div>
	</div>
	</div>

<div class="container">
	<h1>Landing Page</h1>
<div class="row">
<?php

session_start();
if (! empty($_SESSION['username']) && ! empty($_POST['logout']) && $_POST['logout'] == 'yes') {
    session_unset();
    session_destroy();
    
    header("Location: login.php");
}
if (! empty($_SESSION['username'])) {
    
    $username = $_SESSION['username'];
    $firstname = $_SESSION['first_name'];
    $lastname = $_SESSION['last_name'];
    
    // HTML PART
    echo '<p class="strong">Your Full name is'."$firstname "."$lastname ".'and
          you are logged in as'." $username".'</p>';
    
   
    
    // CONECTING TO DB
    $dbhost = 'localhost:3306/onlineorder';
    $dbuser = 'root';
    $dbpass = 'root';
    $database = 'onlineorder';
    
    $dbConnection = mysqli_connect($dbhost, $dbuser, $dbpass, $database);
    
    if (! $dbConnection) {
        echo 'could not connect ' . mysql_error();
    } else {
        // getting the data from Db
        $sql_1 = "select product_num,product_name,price,stock,image from products where stock>=1";
        $result = mysqli_query($dbConnection, $sql_1);
        echo mysqli_error($dbConnection);
        // getting the total rows from the db
        $num_rows = mysqli_num_rows($result);
        
        if ($num_rows > 0) {
            $i = 0;
            while ($num_rows > $i) {
                // fetching the arrays from the result
                
                $array = mysqli_fetch_array($result);
                
               
                $product_num = $array['product_num'];
                $product_name = $array['product_name'];
                $price = $array['price'];
                $stock = $array['stock'];
                $image = $array['image'];
                
                echo "<div class=\"row\">
			    <div class=\"col-xs-6 col-md-4\">
				<img src=\"$image\" class=\"img-responsive\">
				<p>$product_name</p>
				<p>Price$price .Rs</p>
				<p>Stock $stock</p>
			
				<a href=\"landingPage.php?p_num=$product_num\" class=\"btn btn-info\" role=\"button\" >BUY</a>
				
                </div>";
                
                $i ++;
                
            }
        }
        
        mysqli_close($dbConnection);
        
    }
    // you can do all watever you want for logged in user
} else {
    header("Location: login.php");
}

// FOR Making an order
//USE GET 
if(!empty($_GET)){
    // CONECTING TO DB
    $dbhost = 'localhost:3306/onlineorder';
    $dbuser = 'root';
    $dbpass = 'root';
    $database = 'onlineorder';
    
    $product_num = $_GET['p_num']; //p_num will be present if passed as query parameter  
     
    $dbConnection = mysqli_connect($dbhost, $dbuser, $dbpass, $database);

    if (! $dbConnection) {
        echo 'could not connect ' . mysql_error();
    } else {
        $sql_order = "insert into orders(customerId,product_number) values('$username',$product_num)";
        $result_order = mysqli_query($dbConnection, $sql_order);
        if (!$result_order){
            echo mysqli_error($dbConnection);
        }
        else echo 'You just have buy ';
    }

}
?>


</div>

	<script
		src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
<script type="text/javascript">

$('ul.nav li.dropdown').hover(function() {
	  $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
	}, function() {
	  $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
	});

</script>
<script type="text/javascript"> 
function submitform(el) 

</script> 
</body>
</html>