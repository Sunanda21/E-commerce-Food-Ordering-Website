<?php

include "library/connection.php";
include "library/header.php"


?>
          
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>ALL CUSTOMERS </h2>   
                       
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
                                            <th>CUSTOMER ID</th>
                                            <th>NAME</th>
                                            <th>EMAIL</th>
                                            <th>PASSWORD</th>
                                            <th>PHONE</th>
                                            <th>ADDRESS</th>
                                            <th>TIME</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="odd gradeX">

                                        	<?php 

                                        	$sql = "SELECT * FROM `customers`";
                                        	$res = $db->query($sql);
                                        	while($row=$res->fetch_object())
                                        	{
                                        		
                                        		print'	<tr>	
                                        				<td>'.$row->customer_id.'</td>
                                        				<td class="center">'.$row->name.'</td>
                                        				<td class="center">'.$row->email.'</td>
                                        				<td class="center">'.$row->password.'</td>
                                                        <td class="center">'.$row->phone.'</td>
                                                        <td class="center">'.$row->address.'</td>
                                                        <td class="center">'.$row->timestamp.'</td>
                                        				
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