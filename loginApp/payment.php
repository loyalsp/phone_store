<div class="container">
<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">

  <!-- Identify your business so that you can collect the payments. -->
  <input type="hidden" name="business" value="business@onlineorders.com">

  <!-- Specify a Buy Now button. -->
  <input type="hidden" name="cmd" value="_xclick">

  <!-- Specify details about the item that buyers will purchase. -->
 <?php print_prod_name();?>
  <input type="hidden" name="currency_code" value="USD">

  <!-- Display the payment button. -->
  <input type="image" name="submit" border="0"
  src="./images/paynow.png"
  alt="Buy Now">
  <img alt="" border="0" width="1" height="1"
  src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" >

</form>
</div>
<?php

function print_prod_name()
{
    if(!isset($_SESSION['cart']))
        return;
    $products = $_SESSION['cart'];
if ($products != null)
    foreach ($products as $key => $product)
    {
    ?>
<input type="hidden" name="item_name" value="<?=$product['product_name']?>">
<input type="hidden" name="amount" value="<?=$_SESSION['price']?>">
<?php
    }
}
?>