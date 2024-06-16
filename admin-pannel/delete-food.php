<?php

    include("config.php");
    session_start();

    $food_id = $_GET['id'];
    $cat_id = $_GET['catid'];

    $sql = "DELETE FROM food WHERE food_id = $food_id;";
    $sql .= "UPDATE category SET food = food-1 WHERE id = $cat_id";

    if(mysqli_multi_query($conn, $sql))
    {
        $_SESSION['alert'] = '<div class="alert alert-success alert-dismissible" role="alert">
                                    Food delete successfully!
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>';
        header("Location: show-food.php");
    }
    else
    {
        echo "Query faild to delete food";
    }
?>