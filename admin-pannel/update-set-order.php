<?php

include("config.php");

session_start();
if(!isset($_SESSION['username']))
{
    header("Location: login.php");
}

if(isset($_POST['submit']))
{
    
    $o_id = $_POST['o_id'];
    $status = $_POST['status'];

    $food = $_POST['food_name'];
    $price = $_POST['food_price'];
    $qty = $_POST['food_qty'];
    $total = $price*$qty;
    $order_date = $_POST['order_date'];
    $cus_name = $_POST['customer_name'];
    $cus_contact = $_POST['customer_contact'];
    $cus_email = $_POST['customer_email'];
    $cus_adrs = $_POST['customer_address'];

    $sql1 = "UPDATE tbl_order SET 
            food = '$food',
            price = $price,
            qty = $qty,
            total = $total,
            order_date = '$order_date',
            status = '$status',
            customer_name = '$cus_name',
            customer_contact = '$cus_contact',
            customer_email = '$cus_email',
            customer_address = '$cus_adrs'
            WHERE order_id = $o_id";

    if(mysqli_query($conn, $sql1))
    {
        header("Location: show-order.php");
    }

}

?>