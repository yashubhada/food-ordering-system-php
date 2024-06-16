<?php

include("config.php");

if(isset($_POST['submit']))
{
    $c_email = $_POST['email'];
    $password = $_POST['password'];

    $sql1 = "SELECT * FROM customer WHERE c_email = '$c_email' AND c_password = '$password'";
    $result1 = mysqli_query($conn, $sql1) or die("Query Failed to login");

    if(mysqli_num_rows($result1) > 0)
    {
        while($row = mysqli_fetch_assoc($result1))
        {
            session_start();

            $_SESSION['c_name'] = $row['customer_name'];
            $_SESSION['c_email'] = $row['c_email'];
            $_SESSION['c_id'] = $row['customer_id'];

            header("Location: index.php");
        }
    }
    else
    {
        ?>
            <p style="color:red; font-size:20px; text-align:center;">Email and Password are not matched.</p>
        <?php
    }
}

?>