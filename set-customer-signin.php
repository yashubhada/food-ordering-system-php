<?php

include("config.php");

if(isset($_POST['submit']))
{
    
    $full_name = $_POST['full_name'];
    $c_email = $_POST['email'];
    $password = $_POST['password'];
    $conf_password = $_POST['confirm_password'];

    if($conf_password == $password)
    {
        $sql1 = "SELECT c_email FROM customer WHERE c_email = '$c_email'";
        $result1 = mysqli_query($conn, $sql1) or die("Query failed");

        // CHECK EMAIL IS EXISTS OR NOT

        if(mysqli_num_rows($result1) > 0)
        {
            echo "Email already exists";
        }
        else
        {
            $sql2 = "INSERT INTO customer (customer_name, c_email, c_password)
                    VALUES ('$full_name', '$c_email', '$password')";
            
            if(mysqli_query($conn, $sql2))
            {
                header("Location: customer-login.php");
            }
        }
    }
    else
    {
        echo "Password is not same";
    }
}

?>