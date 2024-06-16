<?php

include("config.php");

session_start();
if(!isset($_SESSION['username']))
{
    header("Location: login.php");
}


if(isset($_POST['submit']))
{
    $c_id = $_POST['c_id'];
    $category_name = $_POST['category_name'];
    $no_food = $_POST['no_of_food'];

    $sql1 = "UPDATE category SET 
                category_name = '$category_name',
                food = $no_food
                WHERE id = $c_id";

    if(mysqli_query($conn, $sql1))
    {
        header("Location: show-category.php");
    }
}

?>