<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Insert title here</title>
<script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<body>
<div class="container">
	<h1>Log In</h1>
	<form class="form-horizontal" role="form" action="testform.php"
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
		<div class="g-recaptcha" data-sitekey="6Lf3_AkUAAAAAHbN6j2UO8RrvraHZ7-VDkf-tFoI"></div>
				<div class="from-group">
			<input class="btn btn-default" type="Submit" value="Log in">
		</div>
		<br> <a href="./signUp.php" class="">Don't Have Account Register Here</a>
	</form>
</div>
</body>
</html>
<?php
        $email;$comment;$captcha;
        if(isset($_POST['email'])){
          $email=$_POST['email'];
        }if(isset($_POST['comment'])){
          $email=$_POST['comment'];
        }if(isset($_POST['g-recaptcha-response'])){
          $captcha=$_POST['g-recaptcha-response'];
        }
        if(!$captcha){
          echo '<h2>Please check the the captcha form.</h2>';
          exit;
        }
        $response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6Lf3_AkUAAAAAKm1QXMvkMJin3o8uczmsidRmrLN=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']);
        if($response.success==false)
        {
          echo '<h2>You are spammer ! Get the @$%K out</h2>';
        }else
        {
          echo '<h2>Thanks for posting comment.</h2>';
        }
       
?>
