<?php

include "library/connection.php";
include "library/header.php"


?>
          
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>ALL PRODUCTS </h2>   
                       
                    </div>
                </div>              
                 <!-- /. ROW  -->
                  <hr />
               
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        
                        <div class="panel-body">
                            <div class="table-responsive">

                                <table class="table table-striped table-bordered table-hover" >
                                    <thead>
                                        <tr>
                                            <th>PRODUCT ID</th>
                                            <th>NAME</th>
                                            <th>PRICE</th>
                                            <th>DETAILS</th>
                                            <th>IMAGE</th>
                                            <th>CATEGORY</th>
                                            <th>EDIT/UPDATE</th>
                                            <th>DELETE</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="odd gradeX">

                                        	<?php 

                                        	$sql = "SELECT * FROM `products`";
                                        	$res = $db->query($sql);
                                        	while($row=$res->fetch_object())
                                        	{

                                                    $sql2 = "SELECT * FROM `category` WHERE `cid` = '$row->cid' ";
                                                    $res2 = $db->query($sql2);
                                                    $row2 = $res2->fetch_object();
                                                    $categoryname = $row2->cname;

                                        		if($row->is_this_deleted != 'Yes'){

                                                   
                                        		print'	<tr>	
                                        				<td>'.$row->id.'</td>
                                        				<td class="center">'.$row->name.'</td>
                                        				<td class="center">'.$row->price.'</td>
                                        				<td class="center">'.$row->details.'</td>
                                        				<td class="center"><img src="../'.$row->image.'" style="width:200px"></td>
                                                        <td class="center">'.$categoryname.'</td>
                                        				<td class="center"><a href="update.php?editid='.$row->id.'"><button class="btn btn-danger">EDIT </button></a></td>
                                            			<td class="center"><a href="delete.php?delid='.$row->id.'"><button class="btn btn-danger">DELETE </button></a></td>
                                            			</tr>';

                                            		}
                                        	}

                                        	?>

                                        </tr>
                                        
                                    </tbody>
                                </table>

                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
   				</div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
     <!-- /. WRAPPER  -->
    <?php

//include "library/connection.php";
include "library/footer.php"


?>