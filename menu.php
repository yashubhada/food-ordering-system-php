<?php
    include("navbar.php");
?>

            <style>

                .order-icon{
                    font-size:23px;
                    cursor: pointer;
                    color: #d98200;
                }

            </style>

            <div class="container-xxl py-5 bg-dark hero-header mb-5">
                <div class="container text-center my-5 pt-5 pb-4">
                    <h1 class="display-3 text-white mb-3 animated slideInDown">Food Menu</h1>
                </div>
            </div>


            <!-- Menu Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h5 class="section-title ff-secondary text-center text-primary fw-normal">Food Menu</h5>
                    <h1 class="mb-5">Most Popular Items</h1>
                </div>
                <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.1s">
                    <div class="tab-content">
                        <div id="tab-1" class="tab-pane fade show p-0 active">
                            <div class="row g-4">
                                <?php

                                    $sql1 = "SELECT * FROM food";

                                    $result1 = mysqli_query($conn, $sql1);
                    
                                    if(mysqli_num_rows($result1) > 0)
                                    {
                                        while($row1 = mysqli_fetch_assoc($result1))
                                        {
                                ?>
                                <div class="col-lg-6">
                                    <div class="d-flex align-items-center">
                                        <a href="order-food.php?id=<?php echo $row1['food_id']; ?>"><img class="flex-shrink-0 img-fluid rounded" src="admin-pannel/upload/<?php echo $row1['image_name']; ?>" alt="" style="width: 80px;"></a>
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <span><?php echo $row1['title']; ?></span>
                                                <span class="text-primary">Rs. <?php echo $row1['price']; ?></span>
                                            </h5>
                                            <div class="d-flex justify-content-between">
                                                <small class="fst-italic"><?php echo substr($row1['description'], 0, 50) . "..."; ?></small>
                                                <a href="order-food.php?id=<?php echo $row1['food_id']; ?>"><i class="fa-solid fa-circle-arrow-right order-icon"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                        }
                                    }

                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Menu End -->

<?php
    include("footer.php");
?>