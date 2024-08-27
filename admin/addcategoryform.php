<?php
    include "library/connection.php";
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

                        <form method="POST" action="" enctype="multipart/form-data">
                                        <div class="form-group has-success">
                                            <label class="control-label" >CATEGORY NAME</label>
                                            <input type="text" class="form-control" name="categoryname">
                                        </div>

                                        <div class="form-group has-success">
                                                <label class="control-label" > select category</label>
                                                    <select  class="form-control" name="category">
                                                    	<option value="0">Main Category</option>
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
                                        <button type="submit" class="btn btn-danger" style="box-align: center; width: 100%; font-size: 20px;"> ADD</button>
                                        </center>
                        </form>

                        <?php
                        if(isset($_POST['categoryname']))

                   		{
                   			$categoryname = $_POST['categoryname'];
                           $category = $_POST['category'];
       
                           $sql = "INSERT INTO `category` (`cid` , `cname` , `parent_id`) VALUES (NULL , '$categoryname' ,'$category') ";
                          	$db->query($sql);

                          	print('SUCCESSFULLY INSERTED.');
                          	//header("location:managecategory.php?1 category inserted successfully.");
                   		}

                        ?>
                

                
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>




<?php

include "library/footer.php";

?>
