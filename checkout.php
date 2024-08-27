<?php

    include "library/connection.php";

    include "logincheck.php";


    //for fetching the values and show in fields.
    $sql = "SELECT * FROM `customers` WHERE `customer_id`='$_SESSION[userid]'";
    $res = $db->query($sql);
    $row=$res->fetch_object();


    include "library/header.php";

?>

 <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="#">Home</a>
                    <a class="breadcrumb-item text-dark" href="#">Shop</a>
                    <span class="breadcrumb-item active">Checkout</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

   


    <!-- Checkout Start -->
    <form method="post" action="order.php" name ="myform" >

    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-lg-8">
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Billing Address</span></h5>
                <div class="bg-light p-30 mb-5">
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label>First Name</label>
                            <input class="form-control" type="text"  name="name" value="<?= $row->name ?>" disabled>
                        </div>
                        
                        <div class="col-md-6 form-group">
                            <label>E-mail</label>
                            <input class="form-control" type="text"  name="email" value="<?= $row->email ?>" disabled >
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Mobile No</label>
                            <input class="form-control" type="text"  name="phone" value="<?= $row->phone ?>" disabled>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Address / Location</label>
                            <textarea class="form-control" type="text"  name="address" disabled><?= $row->address ?></textarea>
                        </div>
                        
                        <!-- <div class="col-md-6 form-group">
                            <label>Country</label>
                            <select class="custom-select">
                                <option selected>INDIA</option>
                                <option>BANGLADESH</option>
                                <option>CHINA</option>
                                <option>USA</option>
                            </select>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>City</label>
                            <input class="form-control" type="text" placeholder="New York" value="<?= $row->address ?>">
                        </div>
                         -->
                        <div class="col-md-12">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" onclick="copy()" id="shipto">
                                <label class="custom-control-label" for="shipto"  data-toggle="collapse" data-target="#shipping-address">Ship to different address</label>
                            </div>
                        </div>
                    </div>
                </div>

                <script>
                    
                    function copy()
                    {
                        var check = document.getElementById('shipto').checked;

                        if(check)
                        {
                            document.myform.ship_name.value = document.myform.name.value;
                            document.myform.ship_phone.value = document.myform.phone.value;
                            document.myform.ship_address.value = document.myform.address.value;
                        }
                        else
                            {
                            document.myform.ship_name.value = " ";
                            document.myform.ship_phone.value = " ";
                            document.myform.ship_address.value = " ";
                        }
                    }
                </script>



            
                <div class="mb-5" id="shipping-address">
                    <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Shipping Address</span></h5>
                    <div class="bg-light p-30">
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label>First Name</label>
                                <input class="form-control" type="text" name="ship_name">
                            </div>
                           
                            <div class="col-md-6 form-group">
                                <label>Mobile No</label>
                                <input class="form-control" type="text" name="ship_phone">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Address Line 1</label>
                                <input class="form-control" type="text" name="ship_address">
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>




            <div class="col-lg-4">
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Order Total</span></h5>
                <div class="bg-light p-30 mb-5">
                    <div class="border-bottom">
                        <h6 class="mb-3">Products</h6>


                        <?php

                            $total =0;

                            foreach ($_SESSION['mycart'] as $pid => $quantity) {
                                $sql = "SELECT * FROM `products` WHERE `id` = '$pid'";
                                $res = $db->query($sql);
                                $row = $res->fetch_object();

                                $subtotal = $row->price * $quantity ;
                                $total += $subtotal;

                                print' <div class="d-flex justify-content-between">
                                        <p>'.$row->name.'</p>
                                        <p>'.$subtotal.'</p>
                                    </div>';
                            }

                            $stotal = $total + 10 ;

                        ?>


                       
                        
                       
                    </div>
                    <div class="border-bottom pt-3 pb-2">
                        <div class="d-flex justify-content-between mb-3">
                            <h6>Subtotal</h6>
                            <h6><?= $total ?></h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Shipping</h6>
                            <h6 class="font-weight-medium">$10</h6>
                        </div>
                    </div>
                    <div class="pt-2">
                        <div class="d-flex justify-content-between mt-2">
                            <h5>Total</h5>
                            <h5><?= $stotal ?></h5>
                        </div>
                    </div>
                </div>




                <div class="mb-5">
                    <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Payment</span></h5>
                    <div class="bg-light p-30">
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment" id="paypal" value="paypal">
                                <label class="custom-control-label" for="paypal">Paypal</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment" id="directcheck" value="cod">
                                <label class="custom-control-label" for="directcheck">Cash On Delivery</label>
                            </div>
                        </div>
                       
                        <button class="btn btn-block btn-primary font-weight-bold py-3">Place Order</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Checkout End -->
     </form>



<?php

   include "library/footer.php";

    ?>