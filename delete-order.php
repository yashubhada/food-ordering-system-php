<?php

    include("config.php");

    $o_id = $_GET['id'];

    $sql = "DELETE FROM tbl_order WHERE order_id = $o_id";

    if(mysqli_query($conn, $sql))
    {
        header("Location: show-order.php");
    }
    else
    {
        echo "<p class='text-danger'>Can't delete Order</p>";
    }

?>