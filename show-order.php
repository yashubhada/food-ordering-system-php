<?php
    include("navbar.php");
    include("config.php");

    if(!isset($_SESSION['c_id']))
    {
        header("Location: customer-login.php");
    }
?>
        <style>

            .lst-order{
                list-style-type: none;
                padding: 0;
            }
            .lst-order li{
                font-size: 18px;
                color: #555;
            }
            .lst-order .total{
                color: green;
            }
            .status{
                border-radius:5px;
            }


        </style>

        <div class="container-xxl py-5 bg-dark hero-header mb-5">
            <div class="container text-center my-5 pt-5 pb-4">
                <h1 class="display-3 text-white mb-3 animated slideInDown">My Orders</h1>
            </div>
        </div>

        <div class="container-xxl py-5">
            <div class="container">

                <?php

                    $c_id = $_SESSION['c_id'];

                    $sql1 = "SELECT * FROM tbl_order WHERE customer_id = $c_id";
                    $result1 = mysqli_query($conn, $sql1);

                    if(mysqli_num_rows($result1) > 0)
                    {
                        while ($row = mysqli_fetch_assoc($result1)) 
                        {
                ?>

                <div class="row g-4">
                    <?php
                        $f_img = $row['food'];
                        $sql2 = "SELECT * FROM food WHERE title = '$f_img'";
                        $result2 = mysqli_query($conn, $sql2);
                        
                        if(mysqli_num_rows($result2) > 0)
                        {
                            $row2 = mysqli_fetch_assoc($result2);
                        }
                    ?>
                    <div class="col-md-4" >
                        <div style="height:230px;">
                            <img src="admin-pannel/upload/<?php echo $row2['image_name']; ?>" alt="Food image" style="width:100%; height:100%; object-fit:cover;">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-4">
                            <h1 class="mb-1"><?php echo $row['food']; ?></h1>
                            <h5 style="color:#FEA116;">₹<?php echo $row['price']; ?>.00</h5>
                            <p>date : <?php echo $row['order_date']; ?></p>
                        </div>
                        <div class="d-flex align-items-center mb-4">
                            <h5>STATUS :</h5>
                            <?php
                                if($row['status'] == "Ordered")
                                {
                                    echo "<h6 class='status mx-1 p-1' style='color:#fff; background:#0077cc;'>Ordered</h6>";
                                }
                                elseif($row['status'] == "OnDelivaery")
                                {
                                    echo "<h6 class='status mx-1 bg-warning p-1'>On Delivaery</h6>";
                                }
                                elseif($row['status'] == "Delevered")
                                {
                                    echo "<h6 class='status mx-1 bg-success p-1' style='color:#fff;'>Delevered</h6>";
                                }
                                elseif($row['status'] == "Cancelled")
                                {
                                    echo "<h6 class='status mx-1 bg-danger p-1' style='color:#fff;'>Cancelled</h6>";
                                }
                            ?>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <ul class="lst-order">
                            <li>Price : ₹<?php echo $row['price']; ?>.00</li>
                            <li>Qty : <?php echo $row['qty']; ?></li>
                            <li>Shipping Charges : 0</li>
                            <li>Tax : 0</li>
                            <li class="my-2 total"><strong>Total Amount : <?php echo $row['total']; ?>/-</strong></li>
                        </ul>
                        <a href="delete-order.php?id=<?php echo $row['order_id']; ?>"><button class="btn btn-danger mt-4">cancel Order</button></a>
                    </div>
                </div>
                <hr class="my-5">

                <?php   
                        }
                    }
                    else
                    {
                        echo "<h2 class='text-center my-5 text-danger'>No Orders</h2>";
                    }
                ?>
            </div>
        </div>

<?php
    include("footer.php");
?>