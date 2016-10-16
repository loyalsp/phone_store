<?php
include 'header.php';
?>
<div class="container">
<form>
	<h1>Test</h1>
	<?php
	$data = '+11234567890';

if(  preg_match( '/^\+\d(\d{3})(\d{3})(\d{4})$/', $data,  $matches ) )
{
    $result = $matches[1] . '-' .$matches[2] . '-' . $matches[3];
    echo $result;
}
?>
<div class="from-group">
						<input class="btn btn-default" type="Submit" value="Log in">
				</div>
	
	
		

	
	</form>
	</div>

	<?php 
include 'footer.php'
?>