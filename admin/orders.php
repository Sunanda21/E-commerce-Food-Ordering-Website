<?php

include "library/connection.php";
include "library/header.php"


?>
          
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>NEW ORDERS </h2>   
                       
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
                                            <th>order_id</th>
                                            <th>customer_id </th>
                                            <th>ship_fullname</th>
                                            <th>ship_phone</th>
                                            <th>ship_address</th>
                                            <th>payment_info</th>
                                            <th>timestamp</th>
                                            <th>status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="odd gradeX">

                                        	<?php 

                                        	$sql = "SELECT * FROM `orders` WHERE `status` = '$_GET[status]'";
                                        	$res = $db->query($sql);
                                        	while($row=$res->fetch_object())    
                                        	{
                                        		

                                        		print'	<tr>	
                                        				<td>'.$row->order_id.'</td>
                                        				<td class="center">'.$row->customer_id.'</td>
                                        				<td class="center">'.$row->ship_fullname.'</td>
                                        				<td class="center">'.$row->ship_phone.'</td>
                                                        <td>'.$row->ship_address.'</td>
                                                        <td class="center">'.$row->payment_info.'</td>
                                                        <td class="center">'.$row->timestamp.'</td>
                                                        <td class="center">'.$row->status.'</td>
                                        				
                                            			</tr>';

                                            		
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