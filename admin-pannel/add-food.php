<?php
    include("config.php");

    session_start();
    if(!isset($_SESSION['username']))
    {
        header("Location: login.php");
    }
?>
<!DOCTYPE html>

<!-- =========================================================
* Sneat - Bootstrap 5 HTML Admin Template - Pro | v1.0.0
==============================================================

* Product Page: https://themeselection.com/products/sneat-bootstrap-html-admin-template/
* Created by: ThemeSelection
* License: You must have a valid license purchased in order to legally use the theme for your project.
* Copyright ThemeSelection (https://themeselection.com)

=========================================================
 -->
<!-- beautify ignore:start -->
<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Dashboard - Analytics | Restaurant</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="assets/img/favicon/favicon.png" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <link rel="stylesheet" href="assets/vendor/libs/apex-charts/apex-charts.css" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="assets/js/config.js"></script>
  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo">
            <a href="index.php" class="app-brand-link">
              <span class="app-brand-logo demo">
                <i class="fa-solid fa-utensils"></i>
              </span>
              <span class="app-brand-text demo menu-text fw-bolder ms-2">Restaurant</span>
            </a>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
              <i class="bx bx-chevron-left bx-sm align-middle"></i>
            </a>
          </div>

          <div class="menu-inner-shadow"></div>

          <ul class="menu-inner py-1">
            <!-- Dashboard -->
            <li class="menu-item">
              <a href="index.php" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
              </a>
            </li>

            <!-- Admin -->
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-user"></i>
                <div data-i18n="Layouts">Admin</div>
              </a>

              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="show-admin.php" class="menu-link">
                    <div data-i18n="Without menu">Show All Admin</div>
                  </a>
                </li>
                <?php
                  if($_SESSION['role'] == 1)
                  {
                    ?>
                      <li class="menu-item">
                        <a href="add-admin.php" class="menu-link">
                          <div data-i18n="Without navbar">Add Admin</div>
                        </a>
                      </li>
                    <?php
                  }
                  else
                  {
                    echo "";
                  }
                ?>
              </ul>
            </li>

            <!----- FOOD ---->
            <li class="menu-item active open">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-dock-top"></i>
                <div data-i18n="Account Settings">Food Section</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="show-food.php" class="menu-link">
                    <div data-i18n="Account">Show Food</div>
                  </a>
                </li>
                <li class="menu-item active">
                  <a href="add-food.php" class="menu-link">
                    <div data-i18n="Notifications">Add Food</div>
                  </a>
                </li>
              </ul>
            </li>
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-file"></i>
                <div data-i18n="Authentications">Category</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="show-category.php" class="menu-link">
                    <div data-i18n="Basic">Show Category</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="add-category.php" class="menu-link">
                    <div data-i18n="Basic">Add Category</div>
                  </a>
                </li>
              </ul>
            </li>
            <!-- Components -->
            <li class="menu-header small text-uppercase"><span class="menu-header-text">ORDERS</span></li>

            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-cube-alt"></i>
                <div data-i18n="Misc">Order</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="show-order.php" class="menu-link">
                    <div data-i18n="Error">Show All Orders</div>
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </aside>
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->

          <nav
            class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
            id="layout-navbar"
          >
            <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
              <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                <i class="bx bx-menu bx-sm"></i>
              </a>
            </div>

            <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
              <!-- Search -->
              <div class="navbar-nav align-items-center">
                <div class="nav-item d-flex align-items-center">
                  <span class="app-brand-text demo menu-text fw-bolder ms-2">Restaurant</span>
                </div>
              </div>
              <!-- /Search -->

              <ul class="navbar-nav flex-row align-items-center ms-auto">
                <!-- Place this tag where you want the button to render. -->
                <li class="nav-item lh-1 me-3">
                  <a
                    class="github-button"
                    href="#"
                    data-icon="octicon-star"
                    data-size="large"
                    data-show-count="true"
                    aria-label="Star themeselection/sneat-html-admin-template-free on GitHub"
                    >Star</a
                  >
                </li>

                <!-- User -->
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                  <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                      <img src="assets/img/avatars/user.png" alt class="w-px-40 h-auto rounded-circle" />
                    </div>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                      <a class="dropdown-item" href="javascript:void(0);">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar avatar-online">
                              <img src="assets/img/avatars/user.png" alt class="w-px-40 h-auto rounded-circle" />
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <span class="fw-semibold d-block"><?php echo $_SESSION['username']; ?></span>
                            <small class="text-muted">
                              <?php
                                if($_SESSION['role'] == 1)
                                {
                                  echo "Super Admin";
                                }
                                else
                                {
                                  echo "Normal Admin";
                                }
                              ?>
                            </small>
                          </div>
                        </div>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="logout.php">
                        <i class="bx bx-power-off me-2"></i>
                        <span class="align-middle">Log Out</span>
                      </a>
                    </li>
                  </ul>
                </li>
                <!--/ User -->
              </ul>
            </div>
          </nav>

          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">

              <?php
                if(isset($_SESSION['alert']))
                {
                  echo $_SESSION['alert'];
                  unset($_SESSION['alert']);
                }
              ?>

              <!-- Basic Layout & Basic with Icons -->
              <div class="row d-flex justify-content-center">
                <!-- Basic Layout -->
                <div class="col-md-6">
                  <form action="set-food.php" method="POST" enctype="multipart/form-data">
                    <div class="card mb-4">
                      <h5 class="card-header">Add Food Item</h5>
                      <div class="card-body demo-vertical-spacing demo-only-element">
                        <div class="input-group">
                          <span class="input-group-text" id="basic-addon11"><i class="fa-solid fa-bowl-rice"></i></span>
                          <input
                            type="text"
                            class="form-control"
                            name="food_name"
                            required
                            placeholder="Food Name"
                          />
                        </div>
                        <div class="input-group">
                          <label class="input-group-text" for="inputGroupSelect01">Select Category</label>
                          <select class="form-select" id="inputGroupSelect01" name="category">
                            <?php
                                $sql1 = "SELECT * FROM category";
                                $result1 = mysqli_query($conn, $sql1);

                                if(mysqli_num_rows($result1) > 0)
                                {
                                    while($row = mysqli_fetch_assoc($result1))
                                    {
                                        ?>
                                            <option value="<?php echo $row['id']; ?>"><?php echo $row['category_name']; ?></option>
                                        <?php
                                    }
                                }
                            ?>
                          </select>
                        </div>
                        <div class="form-password-toggle">
                          <label class="form-label" for="basic-default-password12">Food Description</label>
                          <div class="input-group">
                            <textarea class="form-control" rows="5" required name="food_desc" aria-label="With textarea"></textarea>
                          </div>
                        </div>
                        <div class="input-group">
                          <span class="input-group-text" id="basic-addon11">₹</span>
                          <input
                            type="text"
                            class="form-control"
                            name="food_price"
                            required
                            placeholder="Food Price"
                          />
                        </div>
                        <div class="form-password-toggle">
                          <label class="form-label" for="basic-default-password12">Upload Food Image</label>
                          <div class="input-group">
                            <input type="file" class="form-control" name="fileToUpload" required id="inputGroupFile02" />
                          </div>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary">Add</button>  
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <!-- / Content -->

            <!-- Footer -->
            <footer class="content-footer footer bg-footer-theme">
              <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                <div class="mb-2 mb-md-0">
                  ©
                  <script>
                    document.write(new Date().getFullYear());
                  </script>
                  , made with ❤️ by
                  <strong>yash patel</strong>
                </div>
              </div>
            </footer>
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="assets/vendor/libs/jquery/jquery.js"></script>
    <script src="assets/vendor/libs/popper/popper.js"></script>
    <script src="assets/vendor/js/bootstrap.js"></script>
    <script src="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="assets/vendor/libs/apex-charts/apexcharts.js"></script>

    <!-- Main JS -->
    <script src="assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="assets/js/dashboards-analytics.js"></script>

    <!-- fonatawesome -->
    <script src="https://kit.fontawesome.com/0bebf0b691.js" crossorigin="anonymous"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>