<?php

include "library/connection.php";
include "library/header.php"


?>
          
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>ALL CATEGORY </h2>   
                       
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
                                            <th>CATEGORY ID</th>
                                            <th>CATEGORY NAME</th>
                                            <th>PARENT ID</th>
                                            <th>is_this_deleted</th>
                                            <th>EDIT/UPDATE</th>
                                            <th>DELETE</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="odd gradeX">

                                        	<?php 

                                        	$sql = "SELECT * FROM `category` WHERE `parent_id` = '0'";
                                        	$res = $db->query($sql);
                                        	while($row=$res->fetch_object())
                                        	{
                                        		
                                        		print'	<tr>	
                                        				<td>'.$row->cid.'</td>
                                        				<td class="center"><b>'.ucfirst($row->cname).'</b></td>
                                        				<td class="center">Parent Category</td>
                                        				<td class="center">'.$row->is_this_deleted.'</td>
                                        				<td class="center"><a href="editcategoryform.php?edit_id='.$row->cid.'"><button class="btn btn-danger">EDIT </button></a></td>
                                            			<td class="center"><a href="isdeletecategory.php?del_id='.$rowss->cid.'"><button class="btn btn-danger">DELETE </button></a></td>
                                            			</tr>';

                                                 $sqlS = "SELECT * FROM `category` WHERE `parent_id` = '$row->cid'";
                                                $resS = $db->query($sqlS);
                                                while($rowS = $resS->fetch_object())
                                                {
                                                    print'  <tr>    
                                                        <td>'.$rowS->cid.'</td>
                                                        <td class="center">&nbsp;&nbsp;>>'.ucfirst($rowS->cname).'</td>
                                                        <td class="center">'.$row->cname.'</td>
                                                        <td class="center">'.$rowS->is_this_deleted.'</td>
                                                        <td class="center"><a href="editcategoryform.php?edit_id='.$rowS->cid.'"><button class="btn btn-danger">EDIT </button></a></td>
                                                        <td class="center"><a href="isdeletecategory.php?del_id='.$rowS->cid.'"><button class="btn btn-danger">DELETE </button></a></td>
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