<?php

include("config.php");

session_start();
if(!isset($_SESSION['username']))
{
    header("Location: login.php");
}

if(isset($_POST['submit']))
{

    if(empty($_FILES['new-image']['name']))
    {
        $file_name = $_POST['old-image'];
    }
    else
    {
        $errors = array();

        $file_name = $_FILES['new-image']['name'];
        $file_size = $_FILES['new-image']['size'];
        $file_tmp = $_FILES['new-image']['tmp_name'];
        $file_type = $_FILES['new-image']['type'];
        $file_ext = strtolower(end(explode('.',$file_name)));
        $extention = array("jpeg","jpg","png");

        if(in_array($file_ext,$extention) == false)
        {
            $errors[] = "This extention file not allowed, Please choose a JPEG, JPG or PNG";
        }

        if($file_size > 2097152)
        {
            $errors[] = "File size must 2MB or Lower";
        }

        if(empty($errors) == true)
        {
            move_uploaded_file($file_tmp, "upload/".$file_name);
        }
        else
        {
            print_r($errors);
            die();
        }
    }

    $foodInput_id = $_POST['food_id'];
    $food_name = $_POST['food_name'];
    $food_desc = $_POST['food_desc'];
    $food_price = $_POST['food_price'];
    $food_category = $_POST['category'];

    $sql3 = "UPDATE food SET title='$food_name', description='$food_desc', price=$food_price,
            image_name='$file_name', category_id=$food_category WHERE food_id = $foodInput_id";

    if(mysqli_query($conn, $sql3))
    {
        $_SESSION['alert'] = '<div class="alert alert-success alert-dismissible" role="alert">
                                    Update food successfully!
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>';
        header("Location: show-food.php");
    }
    else
    {
        echo 'Failed to update Food';
    }
}

?>