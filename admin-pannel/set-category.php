<?php

    include("config.php");

    session_start();
    if(!isset($_SESSION['username']))
    {
        header("Location: login.php");
    }
            
    if(isset($_POST['submit']))
    {   
        $category_nm = $_POST['category_name'];

        $sql1 = "INSERT INTO category (category_name)
                VALUES ('$category_nm')";

        if(mysqli_query($conn, $sql1))
        {
            header("Location: show-category.php");
        }
    }
    
?>