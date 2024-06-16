<?php

include("config.php");
session_start();

if($_SESSION['role'] == 1)
{

    $a_id = $_GET['id'];

    $sql = "DELETE FROM admin WHERE id = $a_id";

    if(mysqli_query($conn, $sql))
    {
        $_SESSION['alert'] = '<div class="alert alert-success alert-dismissible" role="alert">
                                Delete admin successfully!
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>';
        header("Location: show-admin.php");
    }
    else
    {
        $_SESSION['alert'] = '<div class="alert alert-danger alert-dismissible" role="alert">
                                Can not deleet admin
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>';
        header("Location: show-admin.php");
    }
}
else
{
    $_SESSION['alert'] = '<div class="alert alert-danger alert-dismissible" role="alert">
                            You are not authorized to delete admin
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
    header("Location: show-admin.php");
}

?>