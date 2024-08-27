<?php
    include "library/connection.php";

    if(isset($_POST['categoryname'])){

        $sqlU = "UPDATE `category` SET `cname` = '$_POST[categoryname]' , `parent_id` = '$_POST[category]' WHERE `cid`= '$_GET[edit_id]'";
        $db->query($sqlU);

        //print 'Updation successfull.';
        header('location:managecategory.php?msg=updation successfull.');

    }

    include "library/header.php";
?>

<div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">

                     <h2><B>ADD A CATEGORY :</B> </h2>
                       
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />
               <div class="row">
                <div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">

                        <!-- add product form. -->
                         <?php

                        if(isset($_GET['edit_id']))

                        {
                        
       
                           $sql = "SELECT * FROM `category` WHERE `cid`= '$_GET[edit_id]'";
                            $res = $db->query($sql);
                            $row = $res->fetch_object();

                            //print('SUCCESSFULLY INSERTED.');
                            //header("location:managecategory.php?1 category inserted successfully.");
                        }

                        ?>

                        <form method="POST" action="" enctype="multipart/form-data">

                                        <div class="form-group has-success">
                                            <label class="control-label" >CATEGORY NAME</label>
                                            <input type="text" class="form-control" name="categoryname" value="<?= $row->cname?>">
                                        </div>

                                        <div class="form-group has-success">
                                                <label class="control-label" > select category</label>
                                                    <select  class="form-control" name="category" >
                                                        <option value="0">Main Category</option>
                                                <?php

                                                    $sqlC = "SELECT * FROM `category` ";
                                                    $resC = $db->query($sqlC);
                                                    while($rowC= $resC->fetch_object())
                                                    {
                                                        if($row->parent_id == $rowC->cid)
                                                            print "<option value=".$rowC->cid." selected>".$rowC->cname."</option>";
                                                        else {
                                                            print "<option value=".$rowC->cid." >".$rowC->cname."</option>";
                                                        }
                                                    }

                                                ?>   </select>   </div>

                                        <center>
                                        <button type="submit" class="btn btn-danger" style="box-align: center; width: 100%; font-size: 20px;"> ADD</button>
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
