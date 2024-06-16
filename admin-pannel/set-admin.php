<?php

    include("config.php");

    session_start();
    if(!isset($_SESSION['username']))
    {
        header("Location: login.php");
    }
            
    if(isset($_POST['submit']))
    {   
        $full_name = $_POST['full_name'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $conf_password = $_POST['confirm_password'];
        $admin_role = $_POST['role'];

        if($conf_password == $password)
        {
            $sql1 = "SELECT username FROM admin WHERE username = '$username'";
            $result1 = mysqli_query($conn, $sql1) or die("Query failed");

            // CHECK USERNAME IS EXISTS OR NOT

            if(mysqli_num_rows($result1) > 0)
            {
                echo 'Username already exists';
            }
            else
            {
                $sql2 = "INSERT INTO admin (full_name, username, admin_role, password)
                        VALUES ('$full_name', '$username', '$admin_role', '$password')";
                
                if(mysqli_query($conn, $sql2))
                {
                    $_SESSION['alert'] = '<div class="alert alert-success alert-dismissible" role="alert">
                                                Admin add successfully!
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                            </div>';
                    header("Location: show-admin.php");
                }
            }
        }
        else
        {
            $_SESSION['alert'] = '<div class="alert alert-danger alert-dismissible" role="alert">
                                    password not same
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>';
            header("Location: add-admin.php");                                
        }
    }
    
?>