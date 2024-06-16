<?php
    session_start();
?>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Restorant - Welcome!</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.png" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&family=Pacifico&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Navbar & Hero Start -->
        <div class="container-xxl position-relative p-0">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 px-lg-5 py-3 py-lg-0">
                <a href="" class="navbar-brand p-0">
                    <h1 class="text-primary m-0"><i class="fa fa-utensils me-3"></i>Restorant</h1>
                    <!-- <img src="img/logo.png" alt="Logo"> -->
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto py-0 pe-4">
                        <a href="index.php" class="nav-item nav-link">Home</a>
                        <a href="about-us.php" class="nav-item nav-link">About</a>
                        <a href="service.php" class="nav-item nav-link">Service</a>
                        <a href="menu.php" class="nav-item nav-link">Menu</a>
                        <a href="contact-us.php" class="nav-item nav-link">Contact</a>
                        <?php
                        if(isset($_SESSION['c_id']))
                            {
                            ?>
                            <?php
                                include("config.php");
                                $c_id = $_SESSION['c_id'];
                                $sql = "SELECT * FROM tbl_order WHERE customer_id = $c_id";
                                $res = mysqli_query($conn, $sql);
                                $count = mysqli_num_rows($res);
                            ?>
                            <a class="nav-link nav-item" href="show-order.php">My Order<span style="color:#FEA116;"><b>(<?php echo $count; ?>)</b><span></a>
                            <?php
                            }
                            else
                            {
                                ?>
                                <a class="nav-link nav-item" href="show-order.php">My Order<span style="color:#FEA116;"><b>(0)</b><span></a>
                                <?php
                            }
                        ?>
                        
                        <?php
                            if(isset($_SESSION['c_email']))
                            {
                                ?>
                                    <a class="nav-link nav-item" href="customer-logout.php"><?php echo $_SESSION['c_name'].", Logout"; ?></a>                                    
                                <?php
                            }
                            else
                            {
                                ?>
                                    <a class="nav-link nav-item" href="customer-signup.php"><i class="fa-solid fa-right-to-bracket"></i> Sign Up</a>
                                    <a class="nav-link nav-item" href="customer-login.php">Login</a>
                        <?php
                            }
                        ?>
                    </div>
                </div>
            </nav>