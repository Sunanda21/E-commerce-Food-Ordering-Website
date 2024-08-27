<?php

    include "library/connection.php";
    include "library/header.php";


    // we have to take the cid first .
    //and use it to get the category name.

    if(isset($_GET['cid']))
    {
        $cid = $_GET['cid'];

        $sql = "SELECT * FROM `category` WHERE `cid` = '$cid'";
        $res = $db->query($sql);
        $row = $res->fetch_object();
    }

?>

        <!-- Products Start -->
    <div class="container-fluid pt-5 pb-3">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3"><?= $row->cname?></span></h2>
        <div class="row px-xl-5">



            <?php

                $sql = "SELECT * FROM `products` WHERE `cid` ='$cid' ";
                $res = $db->query($sql);
                while($row = $res->fetch_object())
                {
                    $double = $row->price*2;

                    print '  <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                <div class="product-item bg-light mb-4">
                    <div class="product-img position-relative overflow-hidden">
                        <img class="img-fluid w-100" src="'.$row->image.'" alt="" style="height:200px">
                        <div class="product-action">
                            
                        </div>
                    </div>
                    <div class="text-center py-4">
                        <a class="h6 text-decoration-none text-truncate" href="product_detail.php?pid='.$row->id.'">'.$row->name.'</a>
                        <div class="d-flex align-items-center justify-content-center mt-2">
                            <h5> &#8377 '.$row->price.'</h5><h6 class="text-muted ml-2"><del>&#8377 '.$double.'</del></h6>
                        </div>
                        <div class="d-flex align-items-center justify-content-center mb-1">
                            <a class="btn btn-outline-dark " href="product_detail.php?pid='.$row->id.'">DETAILS</i></a>
                        </div>
                    </div>
                </div>
            </div> ';
                }



            ?>

        </div>
    </div>



    <!--  Products End -->


     <!-- sub category Products Start -->

     <?php

      $sqlS = "SELECT * FROM `category` WHERE `parent_id` = '$cid'";
        $resS = $db->query($sqlS);
        while($rowS = $resS->fetch_object()){


     ?>

    <div class="container-fluid pt-5 pb-3">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3"><?= $rowS->cname?></span></h2>
        <div class="row px-xl-5">



            <?php

                $sql = "SELECT * FROM `products` WHERE `cid` ='$rowS->cid' ";
                $res = $db->query($sql);
                while($row = $res->fetch_object())
                {
                    $double = $row->price*2;

                    print '  <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                <div class="product-item bg-light mb-4">
                    <div class="product-img position-relative overflow-hidden">
                        <img class="img-fluid w-100" src="'.$row->image.'" alt="" style="height:200px">
                        <div class="product-action">
                            
                        </div>
                    </div>
                    <div class="text-center py-4">
                        <a class="h6 text-decoration-none text-truncate" href="product_detail.php?pid='.$row->id.'">'.$row->name.'</a>
                        <div class="d-flex align-items-center justify-content-center mt-2">
                            <h5> &#8377 '.$row->price.'</h5><h6 class="text-muted ml-2"><del>&#8377 '.$double.'</del></h6>
                        </div>
                        <div class="d-flex align-items-center justify-content-center mb-1">
                            <a class="btn btn-outline-dark " href="product_detail.php?pid='.$row->id.'">DETAILS</i></a>
                        </div>
                    </div>
                </div>
            </div> ';
                }



            ?>

        </div>
    </div>
    <!--sub category Products End -->
<?php


}

?>



      <?php

   include "library/footer.php";

    ?>