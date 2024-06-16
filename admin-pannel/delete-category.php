<?php

    include("config.php");

    $c_id = $_GET['id'];

    $sql = "DELETE FROM category WHERE id = $c_id";

    if(mysqli_query($conn, $sql))
    {
        header("Location: show-category.php");
    }
    else
    {
        echo "<p class='text-danger'>Can't delete Category</p>";
    }

?>