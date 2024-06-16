<?php

include("config.php");

session_start();
if(!isset($_SESSION['username']))
{
    header("Location: login.php");
}

if(isset($_POST['submit']))
{
    $a_id = $_POST['a_id'];
    $full_name = $_POST['full_name'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $conf_password = $_POST['confirm_password'];
    $admin_role = $_POST['role'];

    if($conf_password == $password)
    {
        $sql1 = "UPDATE admin SET full_name = '$full_name', username = '$username',
        admin_role = '$admin_role', password = '$password' WHERE id = $a_id";

        $result1 = mysqli_query($conn, $sql1) or die("Update failed");

        $_SESSION['alert'] = '<div class="alert alert-success alert-dismissible" role="alert">
                                Update admin successfully!
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>';

        header("Location: show-admin.php");
    }
    else
    {
        $_SESSION['alert'] = '<div class="alert alert-danger alert-dismissible" role="alert">
                                Password are not same
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>';

        header("Location: show-admin.php");
    }
}

?>