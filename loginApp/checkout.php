<?php
/*************************************************
         *CHECK OUT FUNCTIONALITY*
 *************************************************/



function get_orderId($connection, $customer_id, $total_price)
{
    $order_date = date('Y-m-d H:i:s');
    $insert_order = "insert into orders(customerId,order_date_time,total_price) "
            . "values('$customer_id','$order_date',$total_price)";
    $inserted = mysqli_query($connection, $insert_order);
    if (!$inserted)
    {
        printf("order insertion failed: %s\n", mysqli_errno($connection));
        return null;
    }   
    $order_id = select_orderId($connection, $order_date, $customer_id);
        return $order_id;
}

/****************************************************************************/

function insert_details($connection,$order_id)
{
    $quantity = 1;
    foreach ($_SESSION['cart'] as $product)
    {
        $product_id = $product['product_num'];
        $unit_price = $product['price'];
        $order_detalis = "insert into order_details
            (orderid,product_no,quantity,unit_price)
             values($order_id,$product_id,$quantity,$unit_price)";
        $inserted = mysqli_query($connection, $order_detalis);
        if (!$inserted)
        {
            printf("order DETAILS insertion"
                    . " failed: %s\n", mysqli_errno($connection));;
        break;
    }
    }
    return $inserted;
}

/****************************************************************************/

function select_orderId($connection, $order_date, $user)
{
    $select_order = "select order_id from orders where "
            . "customerId='$user' and order_date_time='$order_date'";
    $selected = mysqli_query($connection, $select_order);
    $orders_obj = mysqli_fetch_object($selected);
    $order_id = $orders_obj->order_id;
    return $order_id;
}

/***************************************************************************/

function place_order()
{
    $dbConnection = get_db_connection();
    $customer_id = $_SESSION['username'];
    $total_price = $_SESSION['price'];
    $order_id = get_orderId($dbConnection, $customer_id, $total_price);
    if($order_id !== null)
    {
       
       $inserted = insert_details($dbConnection,$order_id);
       if($inserted)
       {
           unset($_SESSION['cart']);
           return true;
       }
    }
    return false;
}