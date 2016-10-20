<?php
include 'landingHeader.html';
$to = "dharkonaa@gmail.com";
$subject = "test mail";
$headers = "From: adnann.rasheed@gmail.com";
$message = "this is the message";
$sent = mail($to, $subject, $message,$headers);
if($sent)

{echo "email successfully sent"; }

else

{echo "email is not sent, there is some error!"; }
?>

<div class="container">
	<h1>Registration</h1>
	<form class="form-horizontal" role="form" action="mail.php"
		method="post">

		<div class="from-group">
			<label for="first_name">Full Name</label> <input type="text"
				class="form-control input-size" name="first_name" style="width:250px;">
		</div>

		<div class="from-group">
			<label for="email">Email</label> <input type="email"
				class="form-control input-size" name="email">
		</div>

		<div class="from-group">
			<label for="web">WebSite</label> <input type="text"
				class="form-control input-size" name="web">
		</div>
		<br>
	<div class="from-group">	
<textarea name="text" id="textarea"  class="form-control" style="height: 180px; width:400px"></textarea>
		</div>
<br>
<input type="submit" class="btn btn-success" value="SEND EMAIL">
	</form>
		</div>
	
<?php 
include 'footer.html';
?>