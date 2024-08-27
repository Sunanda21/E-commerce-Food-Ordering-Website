<?php
    include "library/connection.php";

                                     
    $sql = "SELECT * FROM `products` WHERE `id` = '$_GET[editid]' ";
    $res = $db->query($sql);
    $rowP= $res->fetch_object();

     include "library/header.php";
?>



<div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">

                     <h2><B>UPDATE A PRODUCT :</B> </h2>
                       
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />
               <div class="row">
                <div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">

                        <!-- add product form. -->



                        <form method="POST" action="updatequery.php" enctype="multipart/form-data">

                                        <div class="form-group has-success">

                                             
                                            <input type="hidden" name="id" value="<?= $_GET['editid']?>">

                                            <label class="control-label" >PRODUCT NAME</label>
                                            <input type="text" class="form-control" name="productname" value="<?= $rowP->name ?>">
                                        </div>

                                        <div class="form-group has-success">
                                            <label class="control-label" >PRODUCT PRICE</label>
                                            <input type="text" class="form-control" name="productprice" value="<?= $rowP->price ?>">
                                        </div>

                                        <div class="form-group has-success">
                                            <label class="control-label" >PRODUCT DETAILS</label>
                                            <textarea class="form-control" rows="3" name="productdetails" ><?= $rowP->details ?></textarea>
                                        </div>

                                        <div class="form-group has-success">
                                            <label class="control-label" >PRODUCT IMAGE</label>
                                            <img src="../<?= $rowP->image ?>" style="width:200px;"> <br>
                                            <input type="file" class="form-control" name="productimage"/>
                                        </div>

                                        <div class="form-group has-success">
                                                <label class="control-label" > select category</label>
                                                    <select  class="form-control" name="category">
                                                <?php

                                                    $sql = "SELECT * FROM `category` ";
                                                    $res = $db->query($sql);
                                                    while($row= $res->fetch_object())
                                                    {
                                                        print "<option value=".$row->cid.">".$row->cname."</option>";
                                                    }

                                                ?>
                                                    
                                                    </select>

                                        </div>

                                        <center>
                                        <button type="submit" class="btn btn-danger" style="box-align: center; width: 100%; font-size: 20px;"> UPDATE</button>
                                        </center>
                        </form>
                

                
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>




<?php

include "library/footer.php";

?>
