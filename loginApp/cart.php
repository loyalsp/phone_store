<?php
ob_start();
include 'landingHeader.php';
include 'functions.php';
include 'checkout.php';
$username = $_SESSION['username'];

if (isset($_GET['delete']))
{
    $indexOfCart = $_GET['delete'];
    delete_product($indexOfCart);
}
/*****************************/
if ((isset($_GET['order'])) && (isset($_SESSION['cart'])))
{
 $placed = place_order();
if($placed)
    echo '<div class="container">
        <div class="alert alert-success" role="alert">
		Congratulatin Your Order has been Placed!</div></div>';
}
/*
 * **************************************************************************
 * FUNCTIONS SECTION
 * **************************************************************************
 */



// this function is called when the user delete any product from his cart
function delete_product($index)
{
    unset($_SESSION['cart'][$index]);
    array_values($_SESSION['cart']);
    if (empty($_SESSION['cart']))
    {
        unset($_SESSION['cart']);
    }
    header("Refresh:0; url=cart.php?view_cart=yes");
}

/* * *************************************************************************** */

function select_product($product_id)
{
    $connection = get_db_connection();
    $select_product = "select * from products where product_num=$product_id";
    $selected = mysqli_query($connection, $select_product);
    $product = mysqli_fetch_array($selected);
    return $product;
}

/* * *************************************************************************** */

function add_to_cart()
{
    if (!isset($_GET['p_num']))
        return;
// return early without doing anything since request is not made to add product
// adding products
    $_SESSION['p_num'] = $_GET['p_num']; // this holds product id
    // getting array to display info of an item
    $quantity = 1;
    $product = select_product($_SESSION['p_num']);
    if (!isset($_SESSION['cart']))
    {
        $cart = array(); // creating cart array for the first time
        array_push($cart, $product); // adding product to cart
        $_SESSION['cart'] = $cart; // placing cart in session to make available for next requests
    }
    else
    {
        array_values($_SESSION['cart']); // what is this for?
        array_push($_SESSION['cart'], $product); // adding product to cart
    }
    // this page will show the one last product when the product successfully added to cart
    //require_once ('show_product.php');
    header("Refresh:0; url=cart.php?view_cart=yes");
}

/* * ************************************************************************* */

function view_cart()
{
    if (!isset($_GET['view_cart']))
        return null; // returns early and does not process view cart

    if (isset($_SESSION['cart']))
    {
        // returns the cart from session
        // remember cart was designed as array so we essentially are retuning array
        return $_SESSION['cart'];
    }

    return null; // if none of above conditions is true then return null, meaning no cart to view.
}




?>






<!--------------------------HTML SECTION------------------------->


<div class="container">
    <a href="./">GO BACK TO SHOP</a> <br>
    <table class="table table-striped table-bordered">
        <tr>
            <th>Product Name</th>
            <th>Image</th>
            <th>Price</th>
            <th>Items</th>
        </tr>
        <tr>
<?php
add_to_cart();
$products = view_cart();
$_SESSION['price']= 0; // initialize from zero
//isset return false if variable is null
if ($products != null)
    foreach ($products as $key => $product)
    {
        $_SESSION['price'] = $_SESSION['price'] + $product['price'];
        ?>
                    <td><?= $product['product_name'] ?></td>
                    <td><img src="./<?= $product['image'] ?>" class="img-responsive"
                             style="height: 30px; width: auto;"></td>
                    <td>$ <?= $product['price'] ?></td>
                    <td><div class="btn-pos">
                            <a href="cart.php?delete=<?= $key ?>" class="btn btn-success"
                               role="button" style="width: auto;">Delete</a>
                        </div></td>
                </tr>

        <?php
    }
?>
        <td></td>
        <td></td>
        <td><strong>Total Price: $ <?= $_SESSION['price'] ?></strong></td>
        <td></td>
    </table>
    <div>
                            <?php if(isset($_SESSION['cart'])) require_once 'payment.php';?></a>
                        </div>
</div>

<?php
include 'footer.html';
?>