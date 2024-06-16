<?php

    include("config.php");

    session_start();
    if(!isset($_SESSION['username']))
    {
        header("Location: login.php");
    }

    
    if(isset($_POST['submit']))
    {

        if(isset($_FILES['fileToUpload']))
        {
            $errors = array();

            $file_name = $_FILES['fileToUpload']['name'];
            $file_size = $_FILES['fileToUpload']['size'];
            $file_tmp = $_FILES['fileToUpload']['tmp_name'];
            $file_type = $_FILES['fileToUpload']['type'];
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

        $title = $_POST['food_name'];
        $description = $_POST['food_desc'];
        $price = $_POST['food_price'];
        $admin_nm = $_SESSION['username'];
        $food_category = $_POST['category'];

        $sql2 = "INSERT INTO food(title, description, price, admin_name, image_name, category_id)
                VALUES('$title', '$description', '$price', '$admin_nm', '$file_name', '$food_category');";
        $sql2 .= "UPDATE category SET food = food + 1 WHERE id = $food_category;";

        if(mysqli_multi_query($conn, $sql2))
        {
            $_SESSION['alert'] = '<div class="alert alert-success alert-dismissible" role="alert">
                                        Food add successfully!
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>';
            header("Location: show-food.php");
        }
    }

?>