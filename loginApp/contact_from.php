<?php
include 'landingHeader.html';
if (!empty($_POST))
{
	$name = $_POST['name'];
	$headers = $_POST['email'];
	$headers = "From: $name <".strip_tags($headers).">";
	$message = $_POST['text'];
	$to_admin = "dharkonaa@gmail.com";
	$subject = 'This is Subject';
$sent = mail($to_admin, $subject, $message,$headers);
if($sent)

{
echo 'email has been sent'; 
}
}
?>

<div class="container">
	<h1>Registration</h1>
	<form class="form-horizontal" role="form" action="contact_from.php"
		method="post">

		<div class="from-group">
			<label for="name">Full Name</label> <input type="text"
				class="form-control input-size" name="name" style="width:250px;">
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