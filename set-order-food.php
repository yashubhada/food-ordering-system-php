<?php

include("config.php");
session_start();

if(isset($_POST['submit']))
{
    $customer_id = $_SESSION['c_id'];
    $food_name = $_POST['food_name'];
    $food_price = $_POST['food_price'];
    $food_qty = $_POST['food_qty'];

    $total = $food_price * $food_qty;

    $order_date = date("y-m-d h:i:sa");

    $status = "Ordered";
    $c_name = $_POST['full_name'];
    $c_contact = $_POST['mobile_no'];
    $c_email = $_POST['email'];
    $c_address = $_POST['address'];

    $sql2 = "INSERT INTO tbl_order SET
            customer_id = '$customer_id',
            food = '$food_name',
            price = $food_price,
            qty = $food_qty,
            total = $total,
            order_date = '$order_date',
            status = '$status',
            customer_name = '$c_name',
            customer_contact = '$c_contact',
            customer_email = '$c_email',
            customer_address = '$c_address'
        ";

    $result2 = mysqli_query($conn, $sql2) or die("faild");

    if($result2 == true)
    {
        header("Location: index.php");
    }
    else
    {
        echo "Failed to ordered food";
    }
}

?>