<?php
    include("navbar.php");
    include("config.php");

    if(!isset($_SESSION['c_email']))
    {
        header("Location: customer-login.php");
    }
?>
<?php

    if(isset($_POST['submit']))
    {
        $customer_id = $_SESSION['c_id'];
        $food_name = $_POST['food_name'];
        $food_price = $_POST['food_price'];
        $food_qty = $_POST['food_qty'];

        $total = $food_price * $food_qty;

        $order_date = date("y-m-d h:i:sa");

        $status = "Ordered";
        $c_name = $_POST['full_name'];
        $c_contact = $_POST['mobile_no'];
        $c_email = $_POST['email'];
        $c_address = $_POST['address'];

        $sql2 = "INSERT INTO tbl_order SET
                customer_id = '$customer_id',
                food = '$food_name',
                price = $food_price,
                qty = $food_qty,
                total = $total,
                order_date = '$order_date',
                status = '$status',
                customer_name = '$c_name',
                customer_contact = '$c_contact',
                customer_email = '$c_email',
                customer_address = '$c_address'
            ";

        $result2 = mysqli_query($conn, $sql2);

        if($result2 == true)
        {
            header("Location: index.php");
        }
        else
        {
            echo "Failed to ordered food";
        }
    }

    $f_id = $_GET['id'];

    $sql1 = "SELECT * FROM food WHERE food_id = $f_id";
    $result1 = mysqli_query($conn, $sql1);

    $row1 = mysqli_fetch_assoc($result1);

?>

        <div class="container-xxl py-5 bg-dark hero-header mb-5">
            <div class="container text-center my-5 pt-5 pb-4">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Food</h1>
            </div>
        </div>

        <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6">
                        <img src="admin-pannel/upload/<?php echo $row1['image_name']; ?>" width="100%" alt="">
                    </div>
                    <div class="col-lg-6">
                            <h5 class="section-title ff-secondary text-start text-primary fw-normal">Your Favorite Item</h5>
                            <h1 class="mb-4 d-flex justify-content-between border-bottom pb-2">
                                <span><?php echo $row1['title']; ?></span>
                                <span class="text-primary">₹<?php echo $row1['price']; ?>.00</span>
                            </h1>
                            <p class="mb-4"><?php echo $row1['description']; ?></p>
                        

                        <!---- order form ---->

                        <div class="wow fadeInUp" data-wow-delay="0.2s">
                            <form action="set-order-food.php" method="POST">
                                <!---- hidden input filed  ---->
                                <input type="hidden" class="form-control" name="food_name" value="<?php echo $row1['title']; ?>">
                                <input type="hidden" class="form-control" name="food_price" value="<?php echo $row1['price']; ?>">
                            
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="name" name="full_name" value="<?php echo $_SESSION['c_name']; ?>" placeholder="Customer Name" required>
                                            <label for="name">Customer Name</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="email" class="form-control" id="email" name="email" value="<?php echo $_SESSION['c_email']; ?>" placeholder="Customer Email" required>
                                            <label for="email">Customer Email</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="number" class="form-control" id="foodQty" name="food_qty" value="1" placeholder="Food Qty" required>
                                            <label for="foodQty">Food Qty</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="subject" name="mobile_no" placeholder="Contact Number" required>
                                            <label for="subject">Contact Number</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <textarea class="form-control" placeholder="Leave a message here" name="address" id="message" style="height: 150px" required></textarea>
                                            <label for="message">Address</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" name="submit" class="btn btn-primary py-2 px-4 mt-2">Order</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<?php
    include("footer.php");
?>