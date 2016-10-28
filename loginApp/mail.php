<?php
include 'landingHeader.html';
$to = "dharkonaa@gmail.com";
$_POST['req-email'] = "From: adnann.rasheed@gmail.com";
$to = 'bob@example.com';
$subject = 'Website Change Reqest';
$headers = "From: " . strip_tags($_POST['req-email']) . "<br>";
$headers .= "Reply-To: ". strip_tags($_POST['req-email']) . "<br>";
$headers .= "CC: susan@example.com<br>";
$headers .= "Content-Type: text/html; charset=UTF-8<br>";

$message = '<p><strong>This is strong text</strong> while this is not.</p>';






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